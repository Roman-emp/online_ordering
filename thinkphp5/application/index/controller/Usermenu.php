<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Usermenu as UserMenuModel;

class Usermenu	extends  Controller
{
		//初始化对象
	protected $online_order;
	public function _initialize()
	{
		
		$this->online_order = new UserMenuModel();

	}
	
	
		//获取用户购买商品的列表
		public function user_menu()
		{
			$user_id = session('user_id');
			$data = $this->online_order
						 ->getUserMenuList($user_id);
				$this->assign('data',$data);
			return $this->fetch();
		}

}