<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Menu_list;
use app\index\model\Online_shop;
class Index extends Controller
{
	protected $menu;
	protected $shop;
	public function _initialize()
	{
		$this->menu = new Menu_list();
		$this->shop = new Online_shop();
	}
	public function index()
	{
		
		$menu_list = $this->menu->select_menu();
		dump(session('user_id'));
		//查询商家的id,去除重复商家的id
		foreach ($menu_list as $key => $value) 
		{
			$arr[] = $value['shop_id'];
		}
		$shop_id = implode(',',array_unique($arr));//提取去重商家的id
		
		//查询入驻商家相关信息
		$shop_info = $this->shop->select_shop($shop_id);

		$this->assign('menu_list',$menu_list);
		$this->assign('shop_info',$shop_info);
		//dump(session('user_id'));
		return $this->fetch();
	}
	public function head()
	{
		return $this->fetch();
	}

}

