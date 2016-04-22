<?php
namespace App\Controller\Home;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeController {
    
    //private $logger;
    private $session;

    public function __construct($c){
        //$this->logger = $c->get('monolog');
        $this->session = $c->get('session');
    }

    public function defaultAction(Request $request, Response $response, $args){
        $user = $this->session->get('user');
        if($user){
            return $response->withHeader('Location', '/report/list');
        }
        return $response->withHeader('Location', '/account/pre_signup');
    }
    
}