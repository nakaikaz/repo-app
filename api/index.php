<?php
require '../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$timezone = date_default_timezone_get();
if('Asia/Tokyo' != $timezone){
	date_default_timezone_set('Asia/Tokyo');
}

$settings = require 'settings.php';
$app = new \Slim\App($settings);

require 'dependencies.php';
require 'auth.php';
require 'routes.php';

$app->run();
