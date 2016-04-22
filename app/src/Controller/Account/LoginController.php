<?php
namespace App\Controller\Account;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LoginController {

    private $logger;
    private $medoo;
    private $view;
    private $session;

    public function __construct($c){
        $this->logger = $c->get('monolog');
        $this->medoo = $c->get('medoo');
        $this->view = $c->get('view');
        $this->session = $c->get('session');
    }

    public function defaultAction($request, $response, $args){
        $this->view->render($response, 'login.html', array());
        return $response;
    }

    public function loginAction($request, $response, $args){
        $this->logger->addInfo('post login action dispached.');
        $r = $request->getParsedBody();
        $user = $this->medoo->get('users', '*', array('email' => $r['email']));
        if(empty($user)){
            return $response->withJson(array(
                'status' => false,
                'message' => 'The user with provided email dosen\'t exist!'
            ));
        }
        if(!password_verify($r['password'], $user['password'])){
            return $response->withJson(array(
                'status' => false,
                'message' => 'Login failed. Incorrect credentials.'
            ));
        }
        $this->session->set('user', $user);
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
    }

}
