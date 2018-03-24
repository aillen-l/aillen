<?php
/**
 * 打印函数
 * @param $var    打印的变量
 */
function p($var)
{
    echo '<pre style="width: 100%;padding: 5px;background: #CCCCCC;border-radius: 5px">';
    if (is_bool($var) || is_null($var)) {
        var_dump($var);
    } else {
        print_r($var);
    }
    echo '</pre>';
}

/**
 * 定义常量:IS_POST
 * 将侧是否为post请求
 */
define('IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false);

function c($var = null)
{
    //测试
    //echo'1';die;
    if (is_null($var)) {
        // echo 2;die;
        //将config目录里面的文件扫描出来
        $files = glob('../system/config/*');
        //          p($files);
        /**
         * 打印结果
         * Array
         * (
         * [0] => ../system/config/database.php
         * [1] => ../system/config/view.php
         * )
         */
        //声明一个空数组
        $data = [];
        foreach ($files as $file) {
            //include加载文件
            $content = include $file;
//          p($content);
            /**
             * 打印结果
             *
             * Array
             * (
             * [host] => 127.0.0.1 [name] => stu_from [user] => root [pass] => root
             *
             * )
             * Array
             * (
             * [suffix] => php
             * )
             */
            //为了将文件名（不带后缀）截取出来，为了做数组下标
            $fileName = basename($file);//获取文件名，database.php
//          p($fileName);
            /**
             * 打印结果
             * database.php  view.php
             */
            $position = strpos($fileName, '.php');//截取.php:8
//          p($position);
            /**
             * 打印结果
             * 8  4
             */
            $index = substr($fileName, 0, $position);//字符串截取 database
//          p($index);
            /**
             * 打印结果
             * database  view
             */
            //$content赋值给数据库的下标
            $data[$index] = $content;

        }
//      p($data);
        /**
         * 打印结果
         *
         * Array
         * (
         * [database] => Array
         * (
         * [host] => 127.0.0.1
         * [name] => stu_from
         * [user] => root
         * [pass] => root
         * )
         *
         * [view] => Array
         * (
         * [suffix] => php
         * )
         *
         * )
         *
         */
        return $data;
    }
    //将var按照.来拆分成数组
    $info = explode('.', $var);
//        p($info);
    /**
     * 打印结果
     *
     * Array
     * (
     * [0] => database
     * [1] => name
     * )
     */
    //count是总数，计算数组传了几个
    //判断传第一个参数   [0] => database
    if (count($info) == 1) {
        //调用(c('database'))，加载database所有的配置项数据
        //拼接文件要打印出来看是否拼接对
//        echo 2;
        $file = '../system/config/' . $var . '.php';
        // p($file);
        /**
         * 打印结果
         * ../system/config/database.php
         */
        //三元表达式
        return is_file($file) ? include $file : null;
    }
    //判断传两个参数[0] => database [1] => name
    if (count($info) == 2) {
//        echo 1;
//        p($info);
        //调用(c('database.name'))，加载database里的name数据的值
        $file = '../system/config/' . $info[0] . '.php';

        //用if判断，检测文件是否传来，
        //加载文件，返回时候检测数据传了一个是name，host,user,pass就加进去，
        if (is_file($file)) {
            $data = include $file;
            return isset($data[$info[1]]) ? $data[$info[1]] : null;
        } else {
            return null;
        }
    }


}

