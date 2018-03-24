<?php
/**
 * Created by PhpStorm.
 * User: 琳 pdo链接mysql数据库
 * Date: 2018/3/22
 * Time: 21:41
 */

/**
 * 第四步，操作数据库，在indexController测试
 */

namespace kernel\model;

use PDO;
use Exception;

class Base
{

    private $table;   //操作数据表
    private $where = '';//where条件
    private $order = '';//order排序
    private $limit = '';//截取
    private $field = '*';//获取指定数据
    private static $pdo = null;//设置私有属性静态$pdo为空
    //构造函数来链接
    public function __construct($class)
    {
        //链接数据库
        self::connect();
       // p($class);//system\model\Student
        //获取对应的模型名称
        $this->table = strtolower ( ltrim ( strrchr ( $class , '\\' ) , '\\' ) );

    }
       //选取字段
    public function field($field=null){
        $this->field=$field ;
        p( $field);
        return $this;
    }
       //截取
    public function limit($limit){
        $this->limit=" limit $limit";
        return $this;
    }
    /**
     * 查询where条件
     * @param $where
     *
     * @return $this
     */
    public function where($where){
//        echo 2;
//        p($where);//cid=1
        //where条件拼接
        $this->where = $where ? ' where ' . $where : '';
        return $this;
    }

    /**
     * 排序
     * @param $order
     * @return $this
     */
    public function orderBy($order){
//        echo 3;
//        p($order);
        $this->order = $order ? ' order by ' . $order : '';
        return $this;
    }

    /**
     * 获取所有数据
     */
    public function get ()
    {
        if(is_null($this->field)){
            $sql='select * from'.$this->table .$this->where .$this->order.$this->limit;
        }else{
            $sql='select ' . $this->field.' from '.$this->table .$this->where .$this->order.$this->limit;
        }

//        p($sql);
        /**
         * 打印结果
         * select name from student where age between 18 and 28 order by sex desc limit 2
         */
        return $this->query ( $sql );
    }
    /**
     * 根据主键获取一一条数据
     *  $pri		主键值
     */
    public function find($pri)
    {
//        p($pri);
        $priField = $this->getPriField();
//        p($priField);
//        die;
        $sql = "select * from " . $this->table . ' where ' . $priField . '=' . $pri;
        return current($this->query($sql));


    }


    /**
     * 获取表主键
     *   [0] => Array
     * (
     * [Field] => id
     * [Type] => int(11)
     * [Null] => NO
     * [Key] => PRI
     * [Default] =>
     * [Extra] => auto_increment
     * )
     *
     */
    private function getPriField()
    {
        //先查看表结构query
//        p($this->table);

        $res = $this->query('desc ' . $this->table);
//        p($res);
        foreach ($res as $v) {
            if ($v['Key'] == 'PRI') {
                return $v['Field'];
            }
        }
    }

    /**
     * 链接数据库
     */
    private static function connect()
    {
        if (is_null(self::$pdo)) {
            try {
                $dsn = 'mysql:host=' . c('database.host') . ';dbname=' . c('database.name');

                self::$pdo = new PDO($dsn, c('database.user'), c('database.pass'));
                //设置字符集
                self::$pdo->query('set names utf8');
                //设置类型
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (Exception $e) {
                //抛出错误，类似打印
                throw new Exception($e->getMessage());
            }
        }
    }

    /**
     * 执行有结果集的操作(select)
     * @param $sql    sql语句
     *
     * @return array        返回查询的数据
     * @throws Exception    异常
     */
    public function query($sql)
    {
        try {
            $res = self::$pdo->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * 执行无结果集的操作(update、delete、insert)
     * @param $sql        sql语句
     *增加，删除，改
     * @return int        返回受影响的条数
     * @throws Exception    异常
     */
    public function exec($sql)
    {
        try {
            return self::$pdo->exec($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


}
////实例化
//$pdo=new Base();
////添加
//$sql="insert into student (name) values('xiaohong')";
//$res = $pdo->exec($sql);
////var_dump($res);