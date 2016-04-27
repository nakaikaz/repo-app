<?php
namespace App\Controller\Report;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class NewController {

    private $logger;
    private $view;
    private $token;
    private $medoo;
    private $session;

    public function __construct($c){
        $this->logger = $c->get('monolog');
        $this->view = $c->get('view');
        $this->token = $c->get('dirs')['token'];
        $this->medoo = $c->get('medoo');
        $this->session = $c->get('session');
    }

    public function getAction(Request $request, Response $response, $args){
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
        $o = new stdClass();
        // 画像ファイル情報が配列で送信されていたら、「;」でつなぎ合わせた文字列としてDBへ挿入する
        if(count($r['images']) > 0){
            $thumbnail = $r['images'][0];
            $o->images = serialize($r['images']);
            // 配列の一つ目の画像は、縮小してサムネイルとして保存する
            $srcPath = $thumbnail['name'];
        }
    }

}
