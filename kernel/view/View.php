<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/3/22
 * Time: 20:38
 */

namespace kernel\view;


class View
{
    //建两个方法，一个是静态变量和非静态变量，为了方便用静态和非静态的
    public function __call($name, $arguments)
    {
        return self::runPrase($name, $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        return self::runPrase($name, $arguments);

    }

    /**
     * 为了实例化base
     */
    public static function runPrase($name, $arguments)
    {
        //接受base里面的$name make/with的值
        return call_user_func_array([new Base(), $name], $arguments);
    }

}