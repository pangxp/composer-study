<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'test';
	
	// public static function getOne($id)
	// {
	// 	$test = Test::where('id', '>=', 1)->first()->toArray(); // 取结果的第一个
	// 	// $test = Test::where('id', '>', 1)->get()->toArray(); // 取结果的所有
	// 	return $test;
	// }
}


/*class Test1
{
	
    public static function getOne()
    {
        $conn = mysqli_connect("localhost", 'root', 'root');
		if (!$conn){
		    die("can not connect mysql: ".mysqli_error());
		}
		mysqli_query($conn, "set names utf8");
		mysqli_select_db($conn, "composer");
		$res = mysqli_query($conn, "select * from `test` where 1 limit 1");
		if ($row = mysqli_fetch_array($res)){
		    return $row;
		}
    }
}*/