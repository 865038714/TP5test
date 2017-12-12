<?php 
//声明命名空间
namespace app\index\controller;

use think\View;
// 继承系统控制器
use think\Controller;
class User extends Controller
{
	// 可以用来提取控制器下公共的代码
	// 后台把控
	public function _initialize()
	{
		echo "我是一个初始化方法";
	}


	public function index()
	{
		return "我是前台User控制器中的index方法";
	}

	public function jiazhai()
	{
		// 实例化系统view类
		//$view = new \think\View;

		//return $view->fetch();

		//$view = new View();


		// 继承系统Controller类
		return $this->fetch();

		// 使用系统函数
		//return view();
	}

	// 数据输出
	public function shuchu()
	{
		// 输出字符串
		//return "夏溢阳";

		// 输出数组
		$arr=array(
			'name'=>'夏溢阳',
			'age'=>18,
			);

		return $arr;
	}
}

?>