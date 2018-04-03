<?php
namespace App\Controllers;

use App\Services\View;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
* 
*/
class BaseController
{
	
	function __construct($view = null)
	{
		/*   默认view层文件名即为类名去掉后面的Controller 比如DemoControllers  view层app/Views/Demo.php   */
		if (!$view) {
			$view = basename(get_class($this));
			$view = substr($view, 0, strlen($view) - 10);
		}
		$this->view = View::make($view);

	   // create a log channel
	    $log = new Logger('operation_log');
	    $log->pushHandler(new StreamHandler('operation.log', Logger::INFO));

	    // add records to the log
	    $log->addInfo('BaseController', array($view, $_REQUEST));
	    // $log->addWarning('Foo', array('cc', 'aa'));
	    // $log->addError('Bar');
	}

	function __destruct()
	{
		if ($this->view instanceof View && !empty($this->view->data)) {
			extract($this->view->data);
			require $this->view->view;
		}
	}
}