<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/3/21
 * Time: 17:32
 */

namespace app\admin\controller;


use kernel\core\Controller;

class IndexController extends Controller
{
    public function index(){
        echo 'namespace IndexControler';
    }
    public function add(){
//        $this->setRedirect()->message('添加成功');

    }
}