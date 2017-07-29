<?php

	namespace app\admin\controller;
	use app\admin\controller\Base;
	
	class Order extends Base
	{
		
		
	

		/*查询未收货订单*/
		public function order_list()
		{
			$shop_id = 1;//测试默认查看商家id为1的订单
			$order_detail = $this->order->order_detail($shop_id);

			$len = count($order_detail);
			for ($i=0; $i <$len ; $i++) 
			{ 
				$menu_id[] = $order_detail[$i]['menu_id'];	
				//根据菜品id获取对应菜品名称
				$menu_name[] = $this->menu->select_menu_name($menu_id[$i]);
			}
			$this->assign('menu_name',$menu_name);
			$this->assign('order_detail',$order_detail);
			return $this->fetch();
		}
	}