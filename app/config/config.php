<?php
// 環境変数から開発版か判定
defined('APP_ENV') || define('APP_ENV', (getenv('APP_ENV') ? getenv('APP_ENV') : 'production'));
$smtp = require 'smtp.config.php';
$dbopts = parse_url(getenv('DATABASE_URL'));
return array(
	'settings' => array(
		'debug' => 'development' === APP_ENV ? true : false,
		'displayErrorDetails' => true,
		'app' => array(
			'name' => 'repo-app',
			'url' => array(
				'official' => 'aaaa',
				'blog' => 'bbbb',
				'facebook' => 'fffff',
				'company' => 'ccccc'
			),
		),
		'monolog' => array(
			'name' => 'repo-app',
			'path' => '../../log/app.log'
		),
		'db' => array(
			'host' => $dbopts['host'],
			'dbname' => ltrim($dbopts['path'], '/'),
			'user' => $dbopts['user'],
			'pass' => $dbopts['pass'],
			'port' => $dbopts['port']
		),
		'smtp' => array(
			'host' => $smtp['host'],
			'user' => $smtp['user'],
			'pass' => $smtp['pass'],
			'port' => $smtp['port'],
			'sender' => array(
				'email' => $smtp['sender']['email'],
				'name' => $smtp['sender']['name']
			),
		),
		'token' => array(
			'dir' => __DIR__ . '/../../token/'
		),
		'view' => array(
			'template_path' => array(
				__DIR__ . '/../templates',
				__DIR__ . '/../templates/account',
				__DIR__ . '/../templates/report'
			),
			'twig' => array(
				'cache' => __DIR__ . '/../cache/twig',
				'debug' => true,
				'auto_releoad' => true
			),
		),
	),
);
