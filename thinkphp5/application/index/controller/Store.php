<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class  Store extends Controller
{
	//商家详情信息
	public function storeDetail()
	{
		return $this->fetch();
	}
}