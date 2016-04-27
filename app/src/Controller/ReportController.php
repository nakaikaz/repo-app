<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ReportController {

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

    public function getReportsAction(Request $request, Response $response, $args){
        $user = $this->session->get('user');
        $authenticated = $user ? true : false;
        $this->view->render($response, 'list.html', array(
            'authenticated' => $authenticated,
            'user' => $user
        ));
        return $response;
    }
    
    /*
     * php_value post_max_size 16M
     * php_value upload_max_filesize 6M
     * かをチェックしておく
     */
    public function uploadImageAction(Request $request, Response $response, $args){
        $user = $this->session->get('user');
        //$authenticated = $user ? true : false;
        $email = $user['email'];
        //$memo = $request->getParam('memo');
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
                //'path' => $outDir . $email . '/' . $hash . '/' . $nameOnly . '.' . $ext,
                //'memo' => $memo
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
    
    public function deleteImageAction(Request $request, Response $response, $args){
        $email = $args['email'];
        $hash = $args['hash'];
        $name = $args['name'];
        if(empty($email) || empty($hash) || empty($name)){
            return $response->withJson(array(
                'status' => false,
                'message' => 'the mail or the hash or the name of image isn\'t set.'
            ), 500);
        }
        
        // 削除対象ファイルのパスを作成
        $path = $this->uploadedDir . '/' . $email . '/' . $hash . '/' . $name;
        // 対象ファイルが存在するか確認して削除
        if(!is_file($path)){
            return $response->withJson(array(
                'status' => false,
                'the image dosen\'t exist.'
            ), 500);
        }
        if(!unlink($path)){
            return $response->withJson(array(
                'status' => false,
                'the image couldn\'t removed.'
            ), 500);
        }
        return $response->withJson(array(
            'status' => true,
            'message' => 'successfully removed.'
        ));
    }
    
    public function renderNewHTMLAction(Request $request, Response $response, $args){
        $user = $this->session->get('user');
        $authenticated = $user ? true : false;
        $this->view->render($response, 'new.html', array(
            'authenticated' => $authenticated,
            'user' => $user
        ));
        return $response;
    }
    
    public function postReportAction(Request $request, Response $response, $args){
        $r = $request->getParsedBody();
        // 画像ファイル情報が配列で送信されていたら、「;」でつなぎ合わせた文字列としてDBへ挿入する
        if(count($r['images']) > 0){
            $thumbnail = $r['images'][0];
            $r['images'] = serialize($r['images']);
            // 配列の一つ目の画像は、縮小してサムネイルとして保存する
            $srcPath = $thumbnail['name'];
            $pos = strrpos($srcPath, '/');
            $hash = substr($srcPath, 0, $pos);
            $pathinfo = pathinfo($srcPath);
            $filename = $pathinfo['filename'];
            $extension = $pathinfo['extension'];
            $thumbnailName = $filename . '.thumb.' . $extension;
            $dstPath = $this->uploadedDir.'/'.$hash.'/'.$thumbnailName;
            $srcPath = $this->uploadedDir . '/' . $srcPath;
            $this->copyImage($srcPath, $dstPath, array('width' => 100, 'height' => 100));
            $thumbnailPath = $hash . '/' . $thumbnailName;
        }else{
            $r['images'] = null;
            $thumbnailName = null;
            $thumbnailPath = null;
        }
        
        $this->medoo->insert('reports', array(
            $r['user']['id'],
            $r['title'],
            $r['content'],
            $r['images'],
            $thumbnailPath
        ));
        $lastId = $this->medoo->pdo->lastInsertId('reports_id_seq');
        if(!$lastId){
            return $response->withJson(array(
                'status' => false,
                'message' => $this->medoo->error() 
            ), 500);
        }
        return $response->withJson(array(
            'status' => true,
            'report' => array(
                'id' => $lastId,
                'title' => $r['title'],
                'content' => $r['content'],
                'images' => $r['images'],
                'thumbnail' => $thunbnailName
            )
        ));
    }
    
    private function copyImage($srcPath, $dstPath, $size){
        if(empty($srcPath) || empty($dstPath)){
            throw new Exception('args must be fullfiled.');
        }
        
        if(is_array($size)){
            $dstW = $size['width'];
            $dstH = $size['height'];
        }
        
        list($srcW, $srcH) = getimagesize($srcPath);
        $type = getimagesize($srcPath)['mime'];
        
        switch($type){
            case 'image/png':
                $srcRes = imagecreatefrompng($srcPath);
                break;
            case 'image/gif':
                $srcRes = imagecreatefromgif($srcRes);
                break;
            case 'image/jpeg':
            case 'image/pjpeg':
                $srcRes = imagecreatefromjpeg($srcRes);
                break;
            default:
                throw new Exception('image type is not supported.');
                break;
        }
        
        $dstRes = imagecreatetruecolor($dstW, $dstH);
        $srcX = $srcY = 0;
        if($srcW > $srcH){
            $srcX = ($srcW - $srcH) / 2;
            $srcW = $srcH;
        }
        if($srcH > $srcW){
            $srcY = ($srcH - $srcW) / 2;
            $srcH = $srcW;
        }
        
        imagecopyresampled($dstRes, $srcRes, 0, 0, $srcX, $srcY, $dstW, $dstH, $srcW, $srcH);
        
        switch($type){
            case 'image/png':
                $ret = imagepng($dstRes, $dstPath);
                break;
            case 'image/gif':
                $ret = imagegif($dstRes, $dstPath);
                break;
            case 'image/jpeg':
            case 'image/pjpeg':
                $ret = imagejpeg($dstRes, $dstPath);
                break;
            default:
                throw new Exception('image type is not supported.');
                break;
        }
        
        imagedestroy($srcRes);
        imagedestroy($dstRes);
        
        return $ret;
    }

}
