<?php
namespace App\Controller\Report;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ImageController {

    private $logger;
    private $view;
    private $uploadedDir;
    private $medoo;
    private $session;

    public function __construct($c){
        $this->logger = $c->get('monolog');
        $this->view = $c->get('view');
        $this->uploadedDir  = $c->get('dirs')['uploadedDir'];
        $this->medoo = $c->get('medoo');
        $this->session = $c->get('session');
    }

    /*
     * php_value post_max_size 16M
     * php_value upload_max_filesize 6M
     * かをチェックしておく
     */
    public function uploadImageAction(Request $request, Response $response, $args){
        $user = $this->session->get('user');
        $authenticated = $user ? true : false;
        $email = $user['email'];
        $memo = $request->getParam('memo');
        $files = $request->getUploadedFiles();
        if(!isset($files)){
            return $response->withJson(array(
               'status' => false,
               'message' =>  'an image file doesn\'t exist.'
            ), 500);
        }
        $uploaded = $files['image'];
        if($uploaded->getError() !== UPLOAD_ERR_OK){
            if($uploaded->getError() === UPLOAD_ERR_NO_FILE){
                return $response->withJson(array(
                    'status' => false,
                    'message' => 'an image file must be uploaded.'
                ), 500);
            }
            if($uploaded->getError() === UPLOAD_ERR_FORM_SIZE){
                return $response->withJson(array(
                    'status' => false,
                    'message' => 'size of the image file is too large'
                ), 500);
            }
        }

        // 出力先のパスを作成
        $outDir = $this->uploadedDir . '/' . $email . '/';
        if(!is_dir($outDir)){
            mkdir($outDir, 0755, true);
            chgrp($outDir, '_www');
        }
        $hash = sha1($email . date('Ymd'));
        $outDir .= $hash . '/';
        if(!is_dir($outDir)){
            mkdir($outDir, 0755, true);
            chgrp($outDir, '_www');
        }
        $name = $uploaded->getClientFileName();
        $type = $uploaded->getClientMediaType();
        $src = $outDir . $name . '.org';
        $uploaded->moveTo($src);
        
        $pathInfo = pathinfo($name);
        $ext = strtolower($pathInfo['extension']);
        $nameOnly = strtolower($pathInfo['filename']);
        $dst = $outDir . $nameOnly . '.' . $ext;
        
        list($srcW, $srcH) = getimagesize($src);
        
        if(!$this->resizeImage($src, $dst, $srcW, $srcH, $srcW * 1, $srcH * 1, $type)){
            return $response->withJson(array(
                'status' => false,
                'message' => 'failed to create an image'
            ), 500);
        }
        
        return $response->withJson(array(
            'status' => true,
            'uploaded' => array(
                'name' => $email . '/' . $hash . '/' . $nameOnly . '.' .$ext,
                'path' => $outDir . $email . '/' . $hash . '/' . $nameOnly . '.' . $ext,
                'memo' => $memo
            )
        ));
    }
    
    /**
     *  必要に応じて画像をリサイズして保存
     *
     */
    private function resizeImage($src, $dst, $srcW, $srcH, $dstW, $dstH, $type){
        $ret = false;
        $srcRes = null;
        // 画像リソースを取得
        switch($type){
            case 'image/png':
                $srcRes = imagecreatefrompng($src);
                break;
            case 'image/gif':
                $srcRes = imagecreatefromgif($src);
                break;
            case 'image/jpeg':
            case 'image/pjpeg':
                $srcRes = imagecreatefromjpeg($src);
                break;
        }
        // TlueColorイメージを新規作成
        $dstRes = imagecreatetruecolor($dstW, $dstH);
        // 新規作成したイメージキャンパスに元イメージをコピー
        imagecopyresampled($dstRes, $srcRes, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);
        // 画像の保存
        switch($type){
            case 'image/png':
                $ret = imagepng($dstRes, $dst);
                break;
            case 'image/gif':
                $ret = imagegif($dstRes, $dst);
                break;
            case 'image/jpeg':
            case 'image/pjpeg':
                $ret = imagejpeg($dstRes, $dst);
                break;
        }
        
        if($ret){
            unlink($src);
        }
        
        imagedestroy($dstRes);
        imagedestroy($srcRes);
        
        return $ret;
    }

}
