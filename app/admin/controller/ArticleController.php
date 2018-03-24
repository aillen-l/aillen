<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/3/21
 * Time: 17:34
 */

namespace app\admin\controller;


use kernel\core\Controller;

class ArticleController extends Controller
{

    public function index(){
        //测试
//        echo 'ArticleController';
//        http://localhost/aillen/public/?s=admin/article/index
//        (new Controller())->index();
        parent::index();

    }
    public function add(){
        //2.测试Controller 里面的message,setRedirect
//        $this->setRedirect();
//        $this->setRedirect()->message('添加成功');

    }

}