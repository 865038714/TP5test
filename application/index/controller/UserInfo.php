<?php
namespace app\index\controller;

use think\Controller;
/**
* 
*/
class UserInfo extends Controller
{
	protected $beforeActionList=[
		'one',
		// 不想让index使用前置方法
		'two'=>['except'=>'index'],
		// 仅仅可以让index使用前置方法
		'three'=>['only'=>'index'],
	];

	public function one()
	{
		echo 'one<hr>';
	}

	public function two()
	{
		echo 'two<hr>';
	}

	public function three()
	{
		echo 'three<hr>';
	}
	
	function index()
	{
		return "我是UserInfo控制器下的index方法";
	}

	function index1()
	{
		return "我是UserInfo控制器下的index1方法";
	}
}

?>