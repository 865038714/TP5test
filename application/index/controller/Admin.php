<?php 
namespace app\index\controller;
// 导入控制器类
use think\Controller;
// 导入数据库类
use think\Db;
/**
* 
*/
class Admin extends Controller
{
	public function index()
	{
		// table方法查询数据
		// 查询数据

		// table
		// 查询所有数据
		$data=Db::table("user")->select();
		echo Db::getLastSql();
		dump($data);
		// 查询一条数据
		$data=Db::table("user")->find();
		echo Db::getLastSql();
		dump($data);

		// name方法查询数据
		// name会自动添加配置文件中的表前缀
		// 查询所有数据
		$data=Db::name("user")->select();
		echo Db::getLastSql();
		dump($data);
		// 查询一条数据
		$data=Db::name("user")->find();
		echo Db::getLastSql();
		dump($data);


		// 助手函数 db()
		// 查询所有数据
		$data=db("user")->select();
		echo Db::getLastSql();
		dump($data);
		// 查询一条数据
		$data=db("user")->find();
		echo Db::getLastSql();
		dump($data);

		// 如何进行条件匹配
		// SELECT * FROM `user` WHERE `id` > 2
		$data=Db::table("user")->where("id",">",2)->select();

		// SELECT * FROM `user` WHERE (`id` > 1 and `id` <3)
		$data=Db::table("user")->where("id",">",1)->where("id","<",3)->select();

		// SELECT * FROM `user` WHERE `name` LIKE '%user%'
		$data=Db::table("user")->where("name","like","%user%")->select();

		// SELECT * FROM `user` WHERE `name` = 'user5' AND `pass` = '123'
		$data=Db::table("user")->where("name","user5")->where("pass",'123')->select();

		// whereOr
		$data=Db::table("user")->where("id","<=",3)->whereOr("id",">=",1)->select();

		// SELECT * FROM `user` WHERE `name` LIKE '%user%' OR `name` LIKE '%2%'
		$data=Db::table("user")->where("name","like","%user%")->whereOr("name","like","%2%")->select();

		// limit 截取数据
		//SELECT * FROM `user` LIMIT 2
		$data=Db::table("user")->limit(1,2)->select();

		// order实现排序
		// SELECT * FROM `user` ORDER BY `id`
		$data=Db::table("user")->order("id")->select();

		// SELECT * FROM `user` ORDER BY `id` desc
		$data=Db::table("user")->order("id","desc")->select();

		// 设置查询字段
		// SELECT `id`,`name` FROM `user`
		$data=Db::table("user")->field("id,name")->select();
		$data=Db::table("user")->field(['id','name'])->select();

		// SELECT `id`,name uname FROM `user`
		$data=Db::table("user")->field("id,name uname")->select();
		$data=Db::table("user")->field(['id','name'=>"uname"])->select();

		// sql的系统函数
		// SELECT count(*) as tot FROM `user`
		$data=Db::table("user")->field("count(*) as tot")->select();
		$data=Db::table("user")->field(['count(*)'=>"tot"])->select();

		// 排除字段
		$data=Db::table("user")->field("id,name",true)->select();
		$data=Db::table("user")->field(['id','name'],true)->select();

		// SELECT * FROM `user` WHERE ( id > 1 and id <3 )
		$data=Db::table("user")->where("id > 1 and id <3")->select();

		// SELECT * FROM `user` WHERE `id` > 1 AND `name` = 'user5'
		$data=Db::table("user")->where(["id"=>[">",1],"name"=>'user5'])->select();
		// SELECT * FROM `user` WHERE ( `id` > 1 AND `id` < 3 )
		$data=Db::table("user")->where(["id"=>[">",1]])->where(["id"=>["<",3]])->select();

		// page方法实现分页
		// SELECT * FROM `user` LIMIT 0,5
		$data=Db::table("user")->page("1,5")->select();

		// group分组聚合
		 SELECT `pass`,count(*) tot FROM `user` GROUP BY `pass`
		//$data=Db::table("user")->field("pass,count(*) tot")->group("pass")->select();

		// having过滤
		// SELECT `pass`,count(*) tot FROM `user` GROUP BY `pass` HAVING tot >=2
		$data=Db::table("user")->field("pass,count(*) tot")->group("pass")->having("tot >=2")->select();
		echo Db::getLastSql();
		dump($data);

		// 多表查询
		$data
	}
}


?>