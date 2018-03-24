<?php
namespace app\home\controller;

use kernel\core\Controller;

class ArticleController
{
	public function index(){
		//echo 'home article index';
		//return View::make();

		//$a = 1;
		//return View::with(compact ('a'));

		//return View::with()->make('aa');
        //make和with顺序可以颠倒，因为在view/base里面的__toString的方法
		return View::make()->with();
	}
	public function add(){
		echo 'home article add';
	}


}