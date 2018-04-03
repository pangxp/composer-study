<?php
namespace App\Controllers;
/**
* 
*/
class DemoController extends BaseController
{

	public function index()
	{
		// echo("index");
		$this->view->with('demo', 'Hello World!')->withTitle('Composer Demo！');
	}

	public function page()
	{
		echo("page");
	}

	public function view($id)
	{
		echo $id;
	}


}