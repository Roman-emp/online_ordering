<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Menu_list;
use app\index\model\Order;
use app\index\model\Address;
use app\admin\model\Links_url;
class Shopping extends Controller
{
	protected $menu;
	protected $shop;
	protected $order;
	protected $orders;
	protected $address;

	public function _initialize()
	{
		$this->menu = new Menu_list();
		$this->shop = new Menu_list();
		$this->order = new Menu_list();
		$this->orders = new Order();
		$this->address = new Address();
		$this->Links_url = new Links_url();
        $link = $this->Links_url->selink();
        $this->assign('link',$link);
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

	
	//添加到购物车
	public function  add_menu()
	{
			$num = input('num');//添加商品的数量
			$menu_id = input('menu_id');//商品id
			$shop_id = input('shop_id');//商家id
			$user_id = input('user_id');
				//获取商品详情
			$menu_detail = $this->menu->select_menu_detail($menu_id);
				//查询用户是否已将商品加入购物车
			$is_exist = $this->menu->select_cart($shop_id,$menu_id,$user_id);
			if (!$is_exist) 
			{
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
						'user_id'			=> $user_id,//用户id
					];
					//echo json_encode($data);
					//echo $this->menu->add_cart($data);
					echo $this->menu->add_cart($data);
			}
			else
			{
				echo 0;
			}				
	}

	//购物车展示所选菜品
	public  function  cart()
	{
		$user_id = session('user_id');
		//查询登录用户的购物车信息
		$shop_cart = $this->menu->select_user_cart($user_id);
		$this->assign('shop_cart',$shop_cart);
		return $this->fetch();
	}


	//清空购物车,删除单个商品
	public function delete_order()
	{	
		echo json_encode($this->menu->clean_cart(input()));//删除购物车菜品
	}
	//生成订单,转到支付界面
	public function add_order()
	{
		
		/*获取到基础信息*/
		$user_id = session('user_id');
		$menu_id = input('menu_id');//商品id
		$shop_id = input('shop_id');//商家id
		$num = input('num');//商品数量

		$len = count(explode(',',$menu_id));

		$menu = explode(',', $menu_id);
		$shop = explode(',', $shop_id);
		$num = explode(',', $num);

		$str = '';
		for ($i=0; $i <$len ; $i++) 
		{ 
			$menu_id[$i] = array_pop($menu);//取得单独的菜品id
			$shop_id[$i] = array_pop($shop);//取得单独的商家id
			$amount[$i]  = array_pop($num);//取得单独的菜品数量
			
			$str .= $menu_id[$i].','.$shop_id[$i].','.$amount[$i].';';			
		}
		//取得由菜品id,商家id,菜品数量;组成的字符串
		$str = substr($str,0,strlen($str)-1);//去除结尾的分号
		
		for ($j=1; $j <=$len; $j++) 
		{ 
			//把分号之前的字符串进行切割,形成新的数组
			$arr = explode(';',$str);
		}
		session('arr',$arr);
		echo json_encode($arr);
		//echo $this->shop->product_order((input());
	}
	//添加订单基本信息界面
	public function confirm_order()
	{
		dump(session('arr'));

		$result = session('arr');//购物车提交的数据
	//获取数组遍历次数
		$len = count(session('arr'));
		for ($i = 0; $i < $len; $i++) 
		{
			$arr = explode(',',$result[$i]);
			//消除货品数量
			$num  = $arr;
			unset($arr[count($arr) - 1]);
			$menu_num[] = ['num'=>array_pop($num)];
			
			$time = count($arr);
			
			for ($j=0; $j <$time-1 ; $j++) 
			{ 
				//dump($arr[$j]);
				//去除多余的循环次数
				$array = array_unique(['menu_id'=>$arr[$j],'shop_id'=>$arr[$j+1]]);
				$menu_id[] = $array['menu_id'];//菜品id
				$shop_id[] = $array['shop_id'];//商铺id
				//根据商品id与商家id,查询商品详情
				$data[] = $this->order->select_goods_detail($array['menu_id'],$array['shop_id']);

				$menu_price[] = $data[$i][0]['menu_price'];
				dump($data);					
			}
		}
		$shops_id	= $shop_id;
		$menus_id	= $menu_id;
		$menus_num	= $menu_num;
		$menus_price = $menu_price;

		session('data',$data);//保存菜品和对应价格	
		session('shops_id',$shops_id);//保存商家id
		session('menus_id',$menus_id);//保存菜品id
		session('menus_num',$menus_num);//保存商品购买数量
		session('menus_price',$menus_price);//保存商品价格
		dump($shops_id);
		dump($menus_id);
		dump($menus_num);	
		dump($menus_price);
		$this->assign('data',$data);
		$this->assign('menu_num',$menu_num);
		return $this->fetch();	
	}

	//提交订单完成支付
	public function complete_order()
	{
		//echo json_encode(input());
		//添加订单
		//echo json_encode($this->orders->complete_order(input()));
		$online_order = $this->orders->complete_order(input());
		//添加收货地址
		$add_address = $this->address->add_address(input());
		//echo json_encode($this->address->add_address(input()));
		//把订单号插入订单状态表
		$order_status = $this->orders->add_order_status();
		//echo json_encode(session('shops_id'));
		
		if ($online_order && $add_address && $order_status)
		{
			echo json_encode(1);
		}
	}

/*根据搜索词,搜索对应结果*/

	//搜索对应菜单
	public function search_p()
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