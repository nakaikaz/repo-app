<?php
require 'vendor/autoload.php';

$timezone = date_default_timezone_get();
if('Asia/Tokyo' != $timezone){
	date_default_timezone_set('Asia/Tokyo');
}

// トークンディレクトリを作成
$tokenDir = 'token';
if(!is_dir($tokenDir)){
	mkdir($tokenDir, 0755, true);
}
$uploadedDir = 'uploadedDir';
if(!is_dir($uploadedDir)){
	mkdir($uploadedDir, 0755, true);
}

$settings = require 'app/config/config.php';
$app = new \Slim\App($settings);

require 'app/dependencies.php';
require 'app/middleware.php';
require 'app/routes.php';

$app->run();
