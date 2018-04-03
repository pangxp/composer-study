<?php

require_once BASE_DIR . '/vendor/autoload.php';
// require BASE_DIR . '/app/Helper/helpers.php';

use \NoahBuscher\Macaw\Macaw;
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// try {
	$dotenv = new Dotenv\Dotenv(BASE_DIR.'/config/', '.config');
	$dotenv->load();
// } catch (Exception $e) {
	
// }
// echo env('DB_HOST1', 'TEST');
// exit();
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => env('DB_HOST', 'localhost'),
    'database'  => env('DB_DATABASE'),
    'username'  => env('DB_USERNAME'),
    'password'  => env('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->bootEloquent();

require BASE_DIR.'/app/Http/routes.php';