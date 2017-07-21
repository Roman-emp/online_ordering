<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Menu_list;

class Index extends Controller
{
	public function _initialize()
	{

	}
	public function index()
	{
		$menu = new Menu_list();
		$menu_list = $menu->select_menu();
		$this->assign('menu_list',$menu_list);
		return $this->fetch();
	}
	public function head()
	{
		return $this->fetch();
	}

}

