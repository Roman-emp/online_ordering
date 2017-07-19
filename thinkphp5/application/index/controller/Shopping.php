<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Shopping extends Controller
{
	//商品详情
	public function detail()
	{
		return $this->fetch();
	}

	//商品列表
	public function list1()
	{
		return $this->fetch();
	}

	//添加到购物车
	public  function  cart()
	{
		dump($_POST);
		return $this->fetch();
	}

	//商品分类
	public function category()
	{
		return $this->fetch();
	}

	public function confirm_order()
	{
		return $this->fetch();
	}
	
}