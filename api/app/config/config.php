<?php
$smtp = require 'smtp.config.php';
$dbopts = parse_url(getenv('DATABASE_URL'));
return array(
	'settings' => array(
		'displayErrorDetails' => true,
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
		'app.conf' => array(
			'name' => 'repo-app',
			'url' => array(
				'official' => 'aaaa',
				'blog' => 'bbbb',
				'facebook' => 'fffff',
				'company' => 'ccccc'
			),
		),
		'smtp.conf' => array(
			'host' => $smtp['host'],
			'user' => $smtp['user'],
			'pass' => $smtp['pass'],
			'port' => $smtp['port'],
			'sender' => array(
				'email' => $smtp['sender']['email'],
				'name' => $smtp['sender']['name']
			),
		),
	),
);
