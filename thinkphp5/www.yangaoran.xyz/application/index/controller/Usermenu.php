<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Usermenu as UserMenuModel;
use app\admin\model\Links_url;

class Usermenu	extends  Controller
{
		//初始化对象
	protected $online_order;
	public function _initialize()
	{
		
		$this->online_order = new UserMenuModel();
        $this->Links_url = new Links_url();
        $link = $this->Links_url->selink();
        $this->assign('link',$link);
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