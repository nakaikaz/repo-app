<?php

$app->get('/', App\Action\Home\HomeAction::class)->setName('homepage');
$app->get('/session', 'App\Controller\SessionController:dispatch')->setName('session');
$app->get('/account/pre_signup', App\Action\Account\PreSignUpAction::class)->setName('presignup');
$app->post('/account/pre_signup', App\Action\Account\PreSignUpAction::class)->setName('post_presignup');
$app->get('/account/signup', App\Action\Account\SignUpAction::class)->setName('signup');
$app->post('/account/signup', App\Action\Account\SignUpAction::class)->setName('post_signup');
$app->get('/account/login', App\Action\Account\LoginAction::class)->setName('login');
$app->post('/account/login', App\Action\Account\LoginAction::class)->setName('post_login');
$app->get('/account/logout', App\Action\Account\LogoutAction::class)->setName('logout');
$app->get('/report/list', App\Action\Report\ListAction::class)->setName('list');
