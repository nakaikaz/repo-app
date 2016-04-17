<?php
namespace App\Controller;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SessionController {

	private $logger;

	public function __construct($c){
		$this->logger = $c->get('monolog');
	}

	public function dispatch(Request $request, Response $response, $args){
		$session = new Session();
		$this->logger->addInfo('session action dispatched.');
		$r = array();
		$r['id'] = $session->get('id');
		$r['name'] = $session->get('name');
		$r['email'] = $session->get('email');
		$response->withJson($r);
	}
}
