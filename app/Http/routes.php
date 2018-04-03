<?php

use \NoahBuscher\Macaw\Macaw;

// Macaw::get('/', function() {
// 	echo 'Hello world!';
// });

Macaw::get('/', 'App\Controllers\DemoController@index');
Macaw::get('page', 'App\Controllers\DemoController@page');
Macaw::get('view/(:num)', 'App\Controllers\DemoController@view');
Macaw::get('test', 'App\Controllers\TestController@test');
Macaw::get('testview/(:num)', 'App\Controllers\TestController@view');

Macaw::error(function(){
	throw new Exception("404 Not Found", 404);
});

Macaw::dispatch();