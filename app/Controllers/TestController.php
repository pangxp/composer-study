<?php
namespace App\Controllers;
use App\Models\Test;
/**
* 
*/
class TestController extends BaseController
{

	public function test()
	{
		$this->view->with('test', array('a', 'b', 'c'))->withTitle('composer test！');
	}

	public function view($id)
	{
		// Test::getOne();
		// $this->view->with('test', Test::getOne($id))->withTitle('composer test test！');
		$this->view->with('test', Test::where('id', '>=', $id)->first()->toArray())->withTitle('composer test test！');
	}


}