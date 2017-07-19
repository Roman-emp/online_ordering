<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;

class Address 	extends  Controller
{
	//收货地址
	public function userAddress()
	{
		return $this->fetch();
	}


	//我的留言
	public function userMessage()
	{
		return $this->fetch();
	}

	//我的优惠劵
	public function userCoupon()
	{
		return $this->fetch();
	}
} 