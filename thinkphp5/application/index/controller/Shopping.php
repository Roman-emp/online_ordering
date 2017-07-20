<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Menu_list;

class Shopping extends Controller
{
	protected $menu;
	public function _initialize()
	{
		$this->menu = new Menu_list();
	}
	//商品详情
	public function detail()
	{
		//获取菜品id
		$menu_id = $_GET['menu_id'];
		$menu = new Menu_list();
		$menu_list = $menu->select_menu_detail($menu_id);
		//菜品详情
		$this->assign('menu_list',$menu_list);
		return $this->fetch();
	}

	//商品列表
	/*public function list()
	{
		return $this->fetch();
	}
	*/
	//添加到购物车
	public  function  add_menu()
	{
		$num = $_REQUEST['Number'];//添加商品的数量
		$menu_id = $_REQUEST['menu_id'];//商品id
		//商家id缺失
		//用户id缺失
		//获取商品详情
		$menu_detail = $this->menu->select_menu_detail($menu_id);

		$menu_name = $menu_detail[0]['menu_name'];//商品名称
		$menu_icon = $menu_detail[0]['menu_icon'];//商品图片
		$menu_price = $menu_detail[0]['menu_price'];//商品价格
		$last_operate_time = date('Y-m-d H:i:s',time());//最后操作时间

		$data = [
			'menu_num'          => $num,
			'menu_id'			=> $menu_id,
			'menu_name'			=> $menu_name,
			'menu_icon'			=> $menu_icon,
			'menu_price'		=> $menu_price,
			'last_operate_time'	=> $last_operate_time,
		];
		//把商品加入购物车
		$res = $this->menu->add_cart($data);

		if ($res)
		{
			$this->success('已加入购物车');
		}
	}

	//购物车展示所选菜品
	public  function  cart()
	{
		//$user_id = $_REQUEST['user_id'];用户id
		$user_id = 1;//测试使用的id

		//查询登录用户的购物车信息
		$shop_cart = $this->menu->select_cart($user_id);
		$this->assign('shop_cart',$shop_cart);
		return $this->fetch();
	}

	//商品分类
	public function category()
	{
		return $this->fetch();
	}


	
}