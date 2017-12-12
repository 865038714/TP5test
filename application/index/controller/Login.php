<?php
namespace app\index\controller;

use think\Controller;

/**
* 
*/
class Login extends Controller
{
	
	public function index()
	{
		// 加载登录页面
		return view();
	}

	// 处理登录的提交页面

	public function check()
	{
		// 接受数据

		$username=$_POST['username'];
		$password=$_POST['password'];

		if ($username == 'admin' && $password == '123') {
			// $this->success(提示信息,跳转地址, 用户自定义数据,跳转跳转,header信息);

			$this->success('登录成功',url('/'));
		}else{
			
			$this->error('登陆失败');
		}
	}

	// 重定向
	public function cdx()
	{
		//redirect('跳转地址','其他参数',code,'隐士参数');
		$this->redirect('/');
	}

	// 空操作

	public function _empty(){
		$this->redirect('/');
	}
}

