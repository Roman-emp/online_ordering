<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Menu_list;

class Index extends Controller
{
	protected $menu;
	public function _initialize()
	{
		$this->menu = new Menu_list();
	}
	public function index()
	{
		
		$menu_list = $this->menu->select_menu();
		$this->assign('menu_list',$menu_list);
		return $this->fetch();
	}
	public function head()
	{
		return $this->fetch();
	}

}

