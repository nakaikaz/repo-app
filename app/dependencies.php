<?php
$container = $app->getContainer();

// ------------------------------------
// Service providers
// ------------------------------------

$container['session'] = function($c){
	return new App\Lib\Session;
};

$container['view'] = function($c){
	$settings = $c->get('settings');
	$view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
	$basePath = rtrim(str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
	//$view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $basePath));
	$view->addExtension(new Twig_Extension_Debug());
	return $view;
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
$container['app'] = function($c){
	return $c->get('settings')['app'];
};
$container['smtp'] = function($c){
	return $c->get('settings')['smtp'];
};
/*$container['token'] = function($c){
	return $c->get('settings')['token'];
};*/
$container['dirs'] = function($c){
	return $c->get('settings')['dirs'];
};
$container['view'] = function($c){
	$settings = $c->get('settings');
	$view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
	$view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
	$view->addExtension(new Twig_Extension_Debug());
	return $view;
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

/*$container[App\Action\Home\HomeAction::class] = function($c){
	return new App\Action\Home\HomeAction($c);	
};
$container[App\Action\Account\PreSignUpAction::class] = function($c){
	return new App\Action\Account\PreSignUpAction($c);
};
$container[App\Action\Account\SignUpAction::class] = function($c){
    return new  App\Action\Account\SignUpAction($c);
};
$container[App\Action\Account\LoginAction::class] = function($c){
	return new App\Action\Account\LoginAction($c);
};
$container[App\Action\Account\LogoutAction::class] = function($c){
	return new App\Action\Account\LogoutAction($c);
};
$container[App\Action\Report\ListAction::class] = function($c){
	return new App\Action\Report\ListAction($c);
};*/
