<?php
namespace app\index\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;
// 引入系统配置文件
use think\Config;

use app\index\controller\User;

use \think\ENV;

use app\admin\controller\Index as AdminIndex;

use think\Request;

class Index extends Controller
{
    public function index()
    {


        //$data=Db::table('user')->select();

        //$this->assign('data',$data);

        //return view();

        //$request = request();

    	$request = Request::instance();
        dump($request);
    }

    // 获取URL请求

    public function getUrl(Request $request)
    {
    	// 获取域名
    	dump($request->domain());
    	// 除域名以外部分
    	dump($request->url());
    	// 获取入口文件
    	dump($request->baseFile());
    	// 获取pathinfo路径
    	dump($request->pathinfo());
    	// 获取pathinfo路径 无后缀
    	dump($request->path());
    	// url地址伪静态后缀
    	dump($request->ext());
    }

    // 获取模块请求

    public function getInfo(Request $request)
    {
    	// 当前模块
    	dump($request->module());
    	// 当前方法
    	dump($request->action());
    	// 当前控制器
    	dump($request->controller());
    }

    public function getType(Request $request)
    {
    	// 请求类型
    	dump($request->method());
    	// 资源类型
    	dump($request->type());
    	// 访问地址
    	dump($request->ip());
    	// 判断是否ajax请求
    	dump($request->isAjax());
    	// 获取地址栏参数
    	dump($request->param());
    	// 获取地址栏特定参数
    	dump($request->only(['name','id']));
    	// 获取地址栏除了特地参数以外
    	dump($request->except(['name','id']));
    }


    // 获取地址栏变量
    public function getData(Request $request)
    {
    	// 判断get类型中的ID是否存在 如存在为ture 不存在为false
    	dump($request->has('id','get'));
    	dump(input('?get.id'));

    	// 读取变量
    	dump($request->get('id'));
    	dump(input('id'));
    	dump(input('get.'));

    	// 可以读取数据类型get/post/put/session/cookie/server等
    }

    // 注册页面

    public function reg()
    {
    	return view();
    }

    public function guolv(Request $request)
    {
    	// 转实体 单双引号
    	$request->filter(['strip_tags','htmlspecialchars']);

    	// 设置单个变量过滤
    	$request->get('name','','htmlspecialchars,md5');
    	dump($request->post());
    }

    // 修饰符

    public function xiushi(){
    	dump(input('get.id/d'));// 强制转换成整形
    	dump(input('get.name/s'));// 强制转换成字符串
    	dump($request->get('id/d'));
    }

    // 修改变量

    public function xiugai(Request $request)
    {
    	dump($request->get('id'));
    	dump($request->get(['id'=>10]));
    }


    public function diaoyong(){

    	//调用前台Uesr控制器

    	$model = new \app\index\controller\User;

    	echo $model->index();

    	echo "<hr>";

    	$model = new User;

    	echo $model->index();

    	//使用系统方法
    	echo "<hr>";

    	$model = controller('User');

    	echo $model->index();

    }

    public function diaoyongs(){

    	//使用命名空间
    	$model = new \app\admin\controller\Index;

    	echo $model->index();

    	echo "<hr>";

    	//使用use方法
    	$model = new AdminIndex;

    	echo $model->index();

    	echo "<hr>";

    	//使用系统方法
    	$model = controller('admin/Index');

    	echo $model->index();
    }

    public function test(){

	return "我是用户自己创建的方法";

    }

    //调用当前跨控制器中的方法

    public function fangfa(){

    	echo $this->test();

    	echo "<hr>";

    	echo self::test();

    	echo "<hr>";

    	echo Index::test();

    	echo "<hr>";

    	echo action('test');
    }

    //调用后台模块index方法

    public function fangfass(){

    	$model = new \app\admin\controller\Index;

    	echo $model->index();

    	echo "<hr>";

    	echo action('admin/Index/index');
    }

    //读取配置文件
    public function getConfig(){

    	// 系统函数读取配置
    	echo config('name');
    	echo "<hr>";
    	echo config('age');
    	echo "<hr>";
    	echo config('kouhao');
    	echo "<hr>";

    	// 通过系统类读取配置

    	echo \think\Config::get('name');
    	echo "<hr>";

    	// 读取数组

    	echo config('student.name');
    	echo "<hr>";
    	echo config('student.age');
    	echo "<hr>";

    	// 通过config方法读取数组
    	echo \think\Config::get('student.name');

    	// 读取应用配置
    	echo config('app_name');
    }

    // 读取扩展配置

    public function getkuozhan(){
    	dump(config('database.username'));

    	dump(config('user'));
    	dump(config('user.love'));
    }

    // 读取场景配置
    public function getchangjing(){
    	dump(config('database.database'));
    	dump(config('database.password'));
    }

    // 读取模块配置

    public function getmokuai(){
    	echo config('index');

    }

    // 动态配置

    public function setConfig(){
    	// 通过系统方法
    	dump(config('name'));

    	config('name','PHP开发');

    	// 系统类

    	\think\Config::set('name','web前端');

    	Config::set('name','程序开发');

    	dump(config('name'));
    }

    // 加载顺序

    public function jiazai(){

		// 动态配置

		config('name','动态配置');

		// 输出配置

		dump(config('name'));
    }

    public function getenv(){

    	dump(\think\ENV::get('name'));

    	dump(Env::get('name'));

    }

    public function course(){
    	echo input('id');
    }

    public function shijian(){

    	echo input('year').' '.input('month');
    }

    public function dongtai(){

    	echo input('a')." ".input('b');
    }

    public function test1(){

    	echo "我是测试方法test1";
    }

    public function type(){
    	dump(input());

    	echo "我是要测试请求类型";
    	
    	return view();
    }

    public function type2(Request $request)
    {
    	echo "<h1>是否GET请求</h1>";
    	dump($request->isGet());
    	dump($request->isPut());
    	// dump($request->isMobile());
    }

    // 表单页面
    public function main()
    {
    	return view();
    }

    // 参数绑定

    public function bangding($id,$name)
    {
    	dump($id);
    	dump($name);
    }

    // 使用配置文件链接数据库

    public function data()
    {
        // 实例化系统数据库类
        $DB = new Db;
        // 查询数据
        $data = $DB::table('user')->select();

        dump($data);


        // 使用sql语句
        $data = $DB::query("select * from user");

        dump($data);
    }


    // 使用方法配置链接数据库
    public function data1()
    {
        // 使用数组查询数据库
        echo "使用方法配置数据库链接";

        $DB = DB::connect([
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
            ]);

        $data = $DB->table('user')->select();

        dump( $data );


        // 使用字符串
        $DB = DB::connect("mysql://root:@127.0.0.1:3306/test#utf8");
        // 数据库类型://用户名:密码@数据库地址:数据库端口/数据库名#字符集

        $data = $DB->table('user')->select();

        dump($data);

    }

    // 使用模型类链接数据库

    public function data2()
    {
        echo "使用模型链接数据库";

        $user = new \app\index\model\User();

        dump($user::all());
    }

    
}
