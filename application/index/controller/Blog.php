<?php
namespace app\index\controller;

use think\Url;
/**
* 
*/
class Blog
{
	
	public function getindex()
	{
		// 生成URL地址

		// 普通URL地址
		// 系统类
		dump(Url::build('index/index/index'));
		// 系统方法
		dump(Url('index/index/index'));

		// 带参数URL地址
		dump(Url('index/index/abc',['id'=>10,'name'=>"张三"]));
		dump(Url('index/index/abc','id=10&name=100'));

		// 带锚点
		dump(Url('index/index/abc#name',['id'=>10,'name'=>"100"]));

		// 带域名
		dump(Url('index/index/abc@blog',['id'=>10,'name'=>"100"]));

		// 加入口文件
		Url::root('/index.php');
		dump(Url('index/index/abc@blog',['id'=>10,'name'=>"100"]));

		// 隐藏入口文件
		Url::root('/');
	}

	public function geta()
	{
		echo "aaaaaa";
	}
}


?>