<?php
require '../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$timezone = date_default_timezone_get();
if('Asia/Tokyo' != $timezone){
	date_default_timezone_set('Asia/Tokyo');
}

// トークンディレクトリを作成
$tokenDir = dirname(__FILE__) . '/../token';
if(!is_dir($tokenDir)){
	mkdir($tokenDir);
	chmod($tokenDir, 0775);
}

$dbopts = parse_url(getenv('DATABASE_URL'));
$config = array(
	'displayErrorDetails' => true,
	'db' => array(
		'host' => $dbopts['host'],
		'dbname' => ltrim($dbopts['path'], '/'),
		'user' => $dbopts['user'],
		'pass' => $dbopts['pass'],
		'port' => $dbopts['port']
	)
);

$settings = require 'app/config/config.php';
$app = new \Slim\App($settings);

require 'app/dependencies.php';
require 'app/routes.php';

$app->run();
