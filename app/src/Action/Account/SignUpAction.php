<?php
namespace App\Action\Account;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SignUpAction {

	private $logger;
	private $view;
    private $token;
    private $medoo;

	public function __construct($c){
		$this->logger = $c->get('monolog');
		$this->view = $c->get('view');
        $this->token = $c->get('token');
        $this->medoo = $c->get('medoo');
	}

    public function __invoke(Request $request, Response $response, $args){
        if($request->isPost()){
            $this->postHandler($request, $response, $args);
        }elseif($request->isGet()){
            $this->getHandler($request, $response, $args);
        }
    }

    private function postHandler($request, $response, $args){
        $r = $request->getParsedBody();
        $medoo = $this->medoo;
        $user = $medoo->get('users', '*', array('email' => $r['email']));
        if(!empty($user)){
            return $response->withJson(array(
                'status' => false,
                'message' => 'The user with provided email exists!'
            ));
        }
        $hasedPassword = password_hash($r['password'], PASSWORD_DEFAULT, array('const' => 10));
        $medoo->insert('users', array(
            'name' => $r['name'],
            'email' => $r['email'],
            'password' => $hasedPassword
        ));
        $lastId = $medoo->pdo->lastInsertId('users_id_seq');
        if(!$lastId){
            return $respnse->withJson(array(
                'status' => false,
                'message' => 'Failed to create a user...'
            ));
        }
        // セッションにユーザー情報を格納
        $session = new Session();
        $user = array(
            'id' => $lastId,
            'name' => $r['name'],
            'email' => $r['email']
        );
        /*$session->set('id', $lastId);
        $session->set('name', $r['name']);
        $session->set('email', $r['email']);*/
        $session->set('user', $user);
        // ユーザー登録が完了したら、トークンファイルを削除
        $tokenFile = $this->token['dir'].$r['token'];
        unlink($tokenFile);

        return $response->withJson(array(
            'status' => true,
            'message' => 'User account created successfully!',
            'user' => array(
                'id' => $lastId,
                'name' => $r['name'],
                'email' => $r['email']
            )
        ));
    }

	private function getHandler($request, $response, $args){
		$this->logger->addInfo('signup action dispatched.');

		// パラメータからトークンを取得
		$token = $request->getQueryParam('t');
        // トークンディレクトリから同名ファイルを開く
        $tokenFile = $this->token['dir'] . $token;
        if(!is_file($tokenFile)){
            $vars = array(
                'status' => false,
                'canSignup' => false,
                'message' => 'The token file is not found'
            );
            $this->view->render($response, 'signup.html', $vars);
            return $response;
        }
        //$fileContent = file_get_contents($tokenFile);
        $r = json_decode(file_get_contents($tokenFile));
        // ファイル作成日＋期限と現在時刻の比較。期限内なら登録フォームを表示する。
        if(time() > $r->limit){
            $vars = array(
                'status' => false,
                'canSignup' => false,
                'message' => 'The duration for registration has been expired.'
            );
            $this->view->render($response, 'signup.html', $vars);
            return $response;
        }
        // ユーザー登録が完了した時点でトークンファイルを削除する
        //unlink($tokenFile);

        $vars = array(
            'status' => true,
            'canSignup' => true,
            'email' => $r->email,
            'token' => $token,
            'message' => 'You can register now!'
        );

		$this->view->render($response, 'signup.html', $vars);
		return $response;
	}
}
