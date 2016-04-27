<?php

$app->get('/', 'App\Controller\Home\HomeController:defaultAction');
$app->group('/account', function(){
    $this->get('/pre_signup', 'App\Controller\Account\PreSignUpController:defaultAction');
    $this->post('/pre_signup', 'App\Controller\Account\PreSignUpController:presignupAction');
    $this->get('/signup', 'App\Controller\Account\SignUpController:defaultAction');
    $this->post('/signup', 'App\Controller\Account\SignUpController:signupAction');
    $this->get('/login', 'App\Controller\Account\LoginController:defaultAction');
    $this->post('/login', 'App\Controller\Account\LoginController:loginAction');
    $this->get('/logout', 'App\Controller\Account\LogoutController:defaultAction');
});

$app->group('/report', function(){
    $this->get('/list', 'App\Controller\ReportController:getReportsAction');
    $this->post('/image', 'App\Controller\ReportController:uploadImageAction');
    $this->delete('/image[/{email}[/{hash}[/{name}]]]', 'App\Controller\ReportController:deleteImageAction');
    $this->get('/new', 'App\Controller\ReportController:renderNewHTMLAction');
    $this->post('', 'App\Controller\ReportController:postReportAction');
});