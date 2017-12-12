<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 引入系统类

use think\Route;

// 资源路由

Route::resource('users','index/Users');

//定义路由规则

//静态路由
Route::rule('/','index/index/index');
Route::rule('test','index/index/test');

//带参数路由

Route::rule('shijian/[:year]/[:month]','index/index/shijian');
//全动态路由
//route::rule(':a/:b','index/index/dongtai');

//完全匹配路由
Route::rule('test1$','Index/index/test1');

//设置默认请求类型

//Route::rule('type','Index/index/type','get');
Route::get('type','Index/index/type');
//Route::rule('type','Index/index/type','post');
Route::post('type','Index/index/type');


//同时支持get和post
//Route::rule('type','Index/index/type','get|post');

//支持put请求

Route::rule('type','Index/index/type','put');

//批量注册路由

//Route::rule([
	//"test"=>"index/index/test",
	//"course/:id"=>"index/index/course",
	//],'','get');

//Route::get([
	//"test"=>"index/index/test",
	//"course/:id"=>"index/index/course",
	//],'','');


//使用配置文件批量注册

	//return [
		//"test"=>"index/index/test",
		//"course/:id"=>"index/index/course",
	//];


// 变量规则

	//Route::rule('course/:id/[:name]','index/index/course','get','',['id'=>'\d{1,3}','name'=>'\w+']);

// 路由参数
	// 路由参数method 请求方式必须是get
	// 路由参数ext 后缀名必须是HTML
	//Route::rule('course/:id/[:name]','index/index/course','get',['method'=>'get','ext'=>'html'],['id'=>'\d{1,3}','name'=>'\w+']);

// 资源路由自动注册七个路由
	// get     blog      			index  后台展示
	// get     blog/create 			create 添加页面
	// post    blog     			save   增加操作
	// get     blog/:id     		read   阅读
	// get     blog/:id/:edit       edit   修改页面
	// put     blog/:id  			update 更新操作
	// delete  blog/:id 			delete 删除
	//Route::resource('blog','index/blog');

// 设置快捷路由
	Route::Controller('blog','Index/blog');

//支持delete请求
//Route::rule('type','Index/index/type','delete');

//支持所有类型请求
//Route::rule('type','Index/index/type','*');

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/
