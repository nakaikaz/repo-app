<?php
$container = $app->getContainer();

// ------------------------------------
// Service provider
// ------------------------------------

$container['session'] = function($c){
	return new App\Lib\Session;
};

// ------------------------------------
// Service factories
// ------------------------------------

$container['monolog'] = function($c){
	$monolog = new Monolog\Logger('repo-app');
	$monolog->pushProcessor(new Monolog\Processor\UidProcessor());
	$path = dirname(__FILE__).'/../log/app.log';
	$monolog->pushHandler(new Monolog\Handler\StreamHandler(dirname(__FILE__).'/../log/app.log', Monolog\Logger::DEBUG));
	$monolog->pushHandler(new Monolog\Handler\FirePHPHandler());
	return $monolog;
};
$container['medoo'] = function($c){
	$db = $c->get('settings')['db'];
	return new medoo(array(
		'database_type' => 'pgsql',
		'database_name' => $db['dbname'],
		'server'		=> $db['host'],
		'username'		=> $db['user'],
		'password'		=> $db['pass'],
		'port'			=> $db['port'],
		'charset'		=> 'utf8'
	));
};
$container['app.conf'] = function($c){
	return $c->get('settings')['app.conf'];
};
$container['smtp.conf'] = function($c){
	return $c->get('settings')['smtp.conf'];
};
$container['errorHandler'] = function($c){
	return function($request, $response, $exception) use($c){
		$data = array(
			'code' => $exception->getCode(),
			'message' => $exception->getMessage(),
			'file' => $exception->getFile(),
			'line' => $exception->getLine(),
			'trace' => explode('\n', $exception->getTraceAsString()),
		);

		$c['monolog']->addDebug('error', $data);

		return $c['response']->withStatus(500)->withHeader('Content-Type', 'application/json')->withJson($data);
	};
};

// ------------------------------------
// Action factories
// ------------------------------------

$container[App\Action\HomeAction::class] = function($c){
	return new App\Action\HomeAction($c);
};
$container[App\Action\SessionAction::class] = function($c){
	return new App\Action\SessionAction($c);
};
$container[App\Action\PreSignUpAction::class] = function($c){
	return new App\Action\PreSignUpAction($c);
};
