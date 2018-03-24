<?php
/**
 * Created by PhpStorm.
 * User: 琳，第二步，在home/controller/indexcontrollor里测试，显示页面添加成功
 * 1.消息提示
 * 2.重定向(指定跳转页面)
 * Date: 2018/3/22
 * Time: 9:39
 */

namespace kernel\core;


class Controller
{

//    public function index(){
//        echo '1111';
//    }
    /**
     * 消息提示
     * @param $msg 参数
     */
    public function message($msg){
        //加载模板文件参考单一入口文件,所有文件
        include "./view/message.php ";
    }

    /**
     * 重定向(指定跳转的页面)
     * @param string $url 参数，跳转的地址
     */
    public function setRedirect($url=''){
            if($url){
                $this->url=$url;
            }else{
                //跳转回历史页面
                $this->url='javascript:history.back()';
            }
            return $this;
    }
}