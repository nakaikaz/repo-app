<?php
namespace App\Action\Account;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LogoutAction {

	private $logger;
	private $view;

	public function __construct($c){
		$this->logger = $c->get('monolog');
	}

	public function __invoke(Request $request, Response $response, $args){
        $this->logger->addInfo('logout action dispatched.');
        $session = new Session();
        $session->clear();
        return $response->withJson(array(
            'status' => true,
            'message' => 'Log out successfully!'
        ));
	}

}
