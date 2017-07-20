<?php
namespace app\index\controller;

use think\Controller;
use think\Db;


class Order extends Controller
{
	public function orderlist()
	{
		return  $this->fetch();
	}
}
