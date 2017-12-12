<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    // 使用数组配置链接数据库
	/*protected $connection=[
			// 数据库类型
            'type'            => 'mysql',
            // 服务器地址
            'hostname'        => '127.0.0.1',
            // 数据库名
            'database'        => 'test',
            // 用户名
            'username'        => 'root',
            // 密码
            'password'        => NULL,
            // 端口
            'hostport'        => '',
	];*/

	// 使用字符串链接数据库
	protected $connection ="mysql://root:@127.0.0.1:3306/test#utf8";
}
