<?php

$app->get('/', App\Action\HomeAction::class)->setName('homepage');
$app->get('/session', App\Action\SessionAction::class)->setName('session');
