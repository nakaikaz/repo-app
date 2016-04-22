<?php
namespace App\Controller\Account;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LogoutController {

    //private $logger;
    private $view;
    private $session;

    public function __construct($c){
        //$this->logger = $c->get('monolog');
        $this->session = $c->get('session');
    }

    public function defaultAction(Request $request, Response $response, $args){
        //$this->logger->addInfo('logout action dispatched.');
        $this->session->clear();
        return $response->withHeader('Location', '/account/login');
    }

}
