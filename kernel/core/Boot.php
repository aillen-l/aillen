<?php
/**
 * Created by PhpStorm.
 * User: 琳   创建框架的启动类
 * Date: 2018/3/21
 * Time: 15:29
 */


namespace kernel\core;

class Boot
{
     //创建个静态方法
    public static function run(){
     //初始化框架
     //先测试能否运行
     // echo 'run';
     //调用初始化框架
        self::init();
      self::appRun();
    }
/**
 * 初始化
 * 头部声明、设置时区、开启session等
 */

    private static function init(){
        //先测试能否运行
        // echo '111';
        //头部声明
        header('Content-type:text/html;charset=utf8');
        //设置时区
        date_default_timezone_set('PRC');
        //开始sesstion
        session_id() || session_start();

    }

    /**
     * 执行应用Application、app
     * 运行app/类
     * 为了方便调用app里面的任何一个类
     */

    //我们会实例化不同的类，调用不同的方法，类和方法不能写死
    //通过地址栏参数的变化，控制访问不同的类，调用不同的方法
    //?m=admin&c=index&a=add (m:模块，c:控制器，a:方法)
    //?s=admin/index/add(我们使用该方式)
    private  static function appRun(){
     //判断检测是否接受get参数
         if(isset($_GET['s'])){
            //接受$_GET参数，转为数组形式
             $s=$_GET['s'];
             //将字符串转为数组
             $info=explode('/',$s);
//             p($info);
//地址栏http://localhost/aillen/public/?s=admin/controller/ArticleController
//             Array
//             (
//             [0] => admin  模块
//             [1] => controller 控制器
//             [2] => ArticleController 方法
//)

             $m=$info[0];
             $c=$info[1];
             $a=$info[2];

         }else{
             $m='home';
             $c='index';
             $a='index';
         }
         //定义常量
         define('MODULE',$m);
         define('CONTROLLER',strtolower($c));
         define('ACTION',$a);

       $controller='\app\\' .$m. '\controller\\'.ucfirst($c).'Controller';
//        (new \app\admin\controller\ArticleController())->index();
        //系统函数实例化，后面的[]是参数的意思
           echo call_user_func_array([new $controller,$a] , []);
            //在地址栏写：http://localhost/aillen/public/?s=admin/article/index
            //前台或后台/控制器类/方法

    }




}