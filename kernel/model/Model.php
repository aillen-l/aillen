<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/3/22
 * Time: 21:41
 */

namespace kernel\model;


class Model
{

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        return self::runPrase($name,$arguments);

    }
    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        return self::runPrase($name,$arguments);
    }
    public static function runPrase($name,$arguments){
        //接受base里面的$name make/with的值
        $modelCLass = get_called_class ();//Stu，获取调用的类
//        p($modelCLass);
        return call_user_func_array([new Base($modelCLass),$name],$arguments);
    }
}