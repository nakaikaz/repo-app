<?php

$app->add(function($request, $response, $next){
	$uri = $request->getUri();
	$appUrl = $uri->getScheme() . '://' . $uri->getHost();
	$env = $this->get('view')->getEnvironment();
	$env->addGlobal('appUrl', $appUrl);
	$path = $uri->getPath();
	$path = ltrim($path, '/');
	$env->addGlobal('script', $path);
	return $next($request, $response);
});
