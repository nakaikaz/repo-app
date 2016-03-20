<?php
namespace App\Action;

use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SessionAction {

	private $logger;
	private $session;

	public function __construct($session, LoggerInterface $logger){
		$this->session = $session;
		$this->logger = $logger;
	}

	public function __invoke(Request $request, Response $response, $args){
		$this->logger->addDebug('session action dispatched.');
		$r = array();
		$r['id'] = $this->session->get('id');
		$r['name'] = $this->session->get('name');
		$r['email'] = $this->session->get('email');
		$response->withStatus(200);
		$response->withHeader('Content-Type', 'application/json');
		echo json_encode($r);
	}
}
