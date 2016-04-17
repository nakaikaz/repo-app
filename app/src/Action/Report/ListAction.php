<?php
namespace App\Action\Report;

use App\Lib\Session;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ListAction {

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
        $session = new Session();
        $user = $session->get('user');
        $authenticated = $user ? true : false;
        $this->view->render($response, 'list.html', array(
            'authenticated' => $authenticated,
            'user' => $user
        ));
        return $response;
    }

}
