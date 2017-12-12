<?php
// 声明命名空间
namespace app\index\controller;

// 引入系统控制器类
use think\Controller;

// 引入系统类
use think\Db;
/**
* 
*/
class User1 extends Controller
{
	// 查
	public function select()
	{
		// 查询数据
		$data=Db::query("select * from user"); 
		dump($data);

		$data=Db::query("select * from user where id>=? and id<=?",[2,4]);
		dump($data);

		// 获取执行的SQL语句
		echo Db::getLastSql();
	}

	public function insert()
	{
		// 执行查询语句
		// 返回值 影响行数
		$data=Db::execute("insert into user value(NULL,'user5','123')");
		dump($data);
		$data=Db::execute("insert into user value(NULL,?,?)",['user1','123']);
		dump($data);
		$data=Db::execute("insert into user value(NULL,:name,:pass)",['name'=>"user3",'pass'=>"123"]);
		dump($data);
	}

	public function delete()
		{
			// 执行删除语句
			$data=Db::execute("delete from user where id=5");
			dump($data);

			$data=Db::execute("delete from user where id>?",[5]);
			dump($data);

			$data=Db::execute("delete from user where id>:id",["id"=>5]);
			dump($data);
		}

		public function update()
		{
			// 执行修改语句
			$data=Db::execute("update user set name='user' where id=1 ");
			dump($data);
		}
}


?>