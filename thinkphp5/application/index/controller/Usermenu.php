<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Usermenu as UserMenuModel;

class Usermenu	extends  Controller
{
		//获取用户购买商品的列表
		public function user_menu()
		{
			return $this->fetch();
		}

}