<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/3/21
 * Time: 17:34
 */

namespace app\home\controller;


use kernel\core\Controller;
use kernel\model\Model;
use kernel\view\View;
use system\model\Student;

class IndexController extends Controller
{

    /**
     * 1.测试先看页面是否加载成功那个
     * 2.测试add方法是否加载成功
     * 3.封装图层view测试make,with方法，看是否静态调用和非静态调用能不能成功
     * 4.测试操作数据库,在这里面调用数据库，显示数据库内容
     * 5.测试加载配置项文件c(),c('database'),c('database.name')
     * 6.c函数测试完成之后，将其替换到houdunwang/model/Base.php中链接数据库地方
     */
    public function index(){
        //测试
//        echo 'ArticleController';
//        http://localhost/aillen/public/?s=admin/article/index
//        (new Controller())->index();
//        parent::index();
        //3.封装图层View,测试在base里面的make,with
        //a.静态变量
//        View::make()
//        return View::make();
        //b.非静态变量
        //(new View())->make();

        //c.测试加载模板和分配变量功能
//        p(View::with());die;

        //4.调用数据库，测试数据库的操作
//        $data=Model::query("select * from student");
//        p($data);
        /**
         * 第五步，测试加载配置项文件config
         */
        //需要一个个测试，共有3种情况，第一个没传参，第二个 [host] => 第三个127.0.0.1
//        $res=c();
//        $res=c('database');
//        $res=c('database.name');
//        p($res);
        /**
         * 第六步c函数测试完成之后，将其替换到houdunwang/model/Base.php中链接数据库地方
         */
//          $data = Model::query('select * from student');
          $data = Student::find(1);
//        p($data);
        /**
         * where条件
         */

        /**
         * order 排序
         */
        $data = Student::where('age between 18 and 28')->orderBy('sex desc')->field("name")->limit(2)->get();
//select * from student where age between 18 and 28 order by sex desc limit 2
        p($data);
    }
    public function add(){
        //2.测试Controller 里面的message,setRedirect
//        $this->setRedirect();
        //http://localhost/aillen/public/?s=home/index/add

        $this->setRedirect()->message('添加成功');

    }

}