<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['db'] = function ($container)
{
	$settings = $container->get('settings')['db'];
	$capsule = new \Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($settings);
	$capsule->setAsGlobal();
	$capsule->bootEloquent();
	return $capsule;
};

$container['db2'] = function ($container)
{
	$settings = $container->get('settings')['db2'];
	$capsule = new \Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($settings);
	$capsule->setAsGlobal();
	$capsule->bootEloquent();
	return $capsule;
};

