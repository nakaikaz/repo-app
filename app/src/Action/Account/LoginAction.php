<?php
namespace App\Action\Account;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LoginAction {

	private $logger;
	private $medoo;
	private $errorInfo;
	private $app;
	private $token;
	private $view;

	public function __construct($c){
		$this->logger = $c->get('monolog');
		$this->medoo = $c->get('medoo');
		$this->app = $c->get('app');
		$this->token = $c->get('token');
		$this->view = $c->get('view');
	}

	public function __invoke(Request $request, Response $response, $args){
		if($request->isGet()){
			$this->getHandler($request, $response, $args);
		}elseif($request->isPost()){
			$this->postHandler($request, $response, $args);
		}
	}

	private function getHandler($request, $response, $args){
		$this->logger->addInfo('login action dispatched.');
		$this->view->render($response, 'login.html', array());
		return $response;
	}

	private function postHandler($request, $response, $args){
		$this->logger->addInfo('post login action dispached.');
		$r = $request->getParsedBody();
		$medoo = $this->medoo;
		$user = $medoo->get('users', '*', array('email' => $r['email']));
		if(empty($user)){
            return $response->withJson(array(
                'status' => false,
				'message' => 'The user with provided email dosen\'t exist!'
			));
		}
		if(password_verify($r['password'], $user['password'])){
			$session = new Session();
			$session->set('user', $user);
			/*$session->set('id', $user['id']);
			$session->set('email', $user['email']);
			$session->set('name', $user['name']);*/
			return $response->withJson(array(
				'status' => true,
				'message' => 'Logged in successfully!',
				'user' => array(
					'id' => $user['id'],
					'name' => $user['name'],
					'email' => $user['email'],
					'created_at' => $user['created_at']
				)
			));
		}else{
			return $response->withJson(array(
				'status' => false,
				'message' => 'Login failed. Incorrect credentials.'
			));
		}
	}

}
