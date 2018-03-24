<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/3/22
 * Time: 20:38
 */

namespace kernel\view;

/**
 * 为了方便调用make和with， __toString方法
 * @package kernel\view
 */
class Base
{

    //创建属性，为了调用
    private $file;//加载文件
    private $data=[];//存储数据
    /**
     * 加载模板
     */
    public function make($tpl=''){
        echo 1;
        //三元表达
        $tpl = $tpl ? : ACTION ;
        //加载模板文件
        $this->file='../app/'.MODULE.'/view/'.CONTROLLER.'/'.$tpl.'.php';
        //返出去，方便调用模板
        return $this;
    }

    /**
     * 分配变量
     */
    public function with($var=[]){
        $this->data=$var;
        return $this;
    }


    /**
     * 当输出一个值用的
     */
    public function __toString()
    {
//         echo '1';
        //取出数据
        extract($this->data);
        p($this->file);
        if(!is_null($this->file)){
            include $this->file;
        }
        return "";
    }
}