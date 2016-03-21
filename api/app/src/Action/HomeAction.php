<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeAction {

	private $logger;

	public function __construct($container){
		$this->logger = $container->get('monolog');
	}

	public function __invoke(Request $request, Response $response, $args){
		$this->logger->addInfo('root action dispatched.');
		$data = array('name' => '中村', 'age' => 21);
		$response->withJson($data);
	}

}
