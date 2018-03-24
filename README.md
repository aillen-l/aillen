# aillen
aillen开源框架

目的
---
*   熟悉什么是框架
*   熟悉框架的核心运行原理
*   熟悉与掌握框架的使用

要求
---
*   框架的运行原理以及全部流程
*   每一行代码需要加上注释
*   不要求默打，这个难度比较大，尽量做到


需要使用的知识点
--------------
*   php
*   mysql
*   composer`项目提交composer的packagist`
*   git简单知识`项目提交至github`

准备工作
-------
github注册账号<br>
创建一个项目<br>
克隆下来到www目录<br>
-------------------
安装composer

实现步骤
-------
###1.本地创建框架的目录，使用`composer init` 初始化项目
```
    composer init初始化之后会自动声场vendor目录以及composer.json文件
```

###2.构建框架文件以及目录(目录名全部小写规范)
app-->开发者写代码地方-->admin-->后台模板-->controller-->类文件-->类名(要大写)
                     -->home-->前台模板 -->controller-->类文件-->类名(要大写)
kernel-->系统核心，要点--> core-->创建框架启动类(boot类)
public-->入口、静态资源-->static-->静态资源
                      -->view-->公共模板文件
system-->配置-->config-->配置项
             -->model -->
             
###3.创建框架启动类boot
    a.创建boot类，静态方法
    b.在composer.json添加autoload{自动加载文件[],和psr-4{}}psr-4使代码更加规范
    c.初始化框架，私有静态init方法（头部声明，设置时区，开启session）
###4.在public目录中创建index.php单一入口文件  
目的为了自动加载文件
实例化静态调用run方法
在浏览器打开index.php，测试run有没有运行，结果是报错，因为没有生成composer自动加载，
在Terminal进入项目根目录执行：composer dump
这是再输出run
###5.在boot写入appRun方法




               
             
             
             
                                                        