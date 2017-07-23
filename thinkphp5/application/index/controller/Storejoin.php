<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Online_shop;


class  Storejoin  extends Controller{


	//商家入住
	public function addStore()
	{
		return $this->fetch();
	}
}