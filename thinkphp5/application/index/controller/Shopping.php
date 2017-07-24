<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Menu_list;

class Shopping extends Controller
{
	protected $menu;
	protected $shop;
	public function _initialize()
	{
		$this->menu = new Menu_list();
		$this->shop = new Menu_list();
	}
	//商品详情
	public function detail()
	{
		//获取菜品id
		$menu_id = input('menu_id');
		$shop_id = input('shop_id');
			//获取菜品详情
		$menu_list = $this->menu->select_menu_detail($menu_id);
			//获取商家名字
		$shop_name = input('shop_name');
		
		$this->assign('menu_list',$menu_list);
		$this->assign('shop_id',$shop_id);
		$this->assign('shop_name',$shop_name);
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
		//判断用户是否登录
		if (session('user_id'))
		{
			
			$num = input('Number');//添加商品的数量
			$menu_id = input('menu_id');//商品id
			$shop_id = input('shop_id');//商家id
			$user_id = session('user_id');//用户id
		
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
				'shop_id' 			=> $shop_id,
				'user_id'			=> $user_id,
			];
	
			//把商品加入购物车
			$res = $this->menu->add_cart($data);

			if ($res)
			{
				$this->success('已加入购物车');
			}
		}
		else
		{
			$this->error('您未登录,无法加入购物车','/index/user/login');
		}

		
	}

	//购物车展示所选菜品
	public  function  cart()
	{
		$user_id = session('user_id');
		//查询登录用户的购物车信息-------商品未进行去重
		$shop_cart = $this->menu->select_cart($user_id);

		$this->assign('shop_cart',$shop_cart);
		return $this->fetch();
	}

	//商品分类
	public function category()
	{
		return $this->fetch();
	}

	//生成/删除订单
	public function confirm_order()
	{
		dump(input());
		die;
		if(input('delete'))
		{
			$menu_id = implode(',',input('menu_id'));//获取菜单id
			die;
			$delete_cart = $this->menu->clean_cart($menu_id);//删除购物车菜品
			if ($delete_cart)
			{
				$this->success('菜品删除成功');
			}
		}
	}
	//搜索对应菜单
	public function search_menu()
	{
		
		$con = input('keyword');//搜索关键字
			//查询匹配内容
		$menus = $this->menu->search_menu($con);
			//二维转一维
		$shop_id = array_column($menus,'shop_id');
		$length = count($shop_id);
			//商家id依次遍历出栈
		for ($i=0; $i <$length ; $i++) 
		{ 
			static $j=0;
			$id = ($shop_id[$j]);//把商家id弹出	
			$j++;
			
		}		
		$shop = $this->shop->select_shop_detail($id);
			//根据商家id查找商家基本信息
		$this->assign('shop',$shop);
		$this->assign('menus',$menus);
		return $this->fetch();
	}
	//搜索对应商铺
	public function search_shop()
	{
		$con = input('keyword');//搜索关键字
		$shops = $this->shop->select_shop($con);

		$this->assign('shops',$shops);

		return $this->fetch();
	}
	
}