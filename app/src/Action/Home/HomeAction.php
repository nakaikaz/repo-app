<?php
namespace App\Action\Home;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeAction {
    
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
        $session = new Session();
        $user = $session->get('user');
        if($user){
            return $response->withHeader('Location', '/report/list');
        }
        return $response->withHeader('Location', '/account/pre_signup');
    }
    
}