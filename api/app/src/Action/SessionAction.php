<?php
namespace App\Action;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SessionAction {

	private $logger;

	public function __construct($container){
		$this->logger = $container->get('monolog');
	}

	public function __invoke(Request $request, Response $response, $args){
		$session = new Session();
		$this->logger->addInfo('session action dispatched.');
		$r = array();
		$r['id'] = $session->get('id');
		$r['name'] = $session->get('name');
		$r['email'] = $session->get('email');
		$response->withJson($r);
	}
}
