<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Order as orderModel;


class Order extends Controller
{
	//初始化对象
	protected $online_order;
	public function _initialize()
	{
		$this->online_order = new orderModel();
	}
	//用户订单列表信息
	public function user_orderlist()
	{
		$user_id = session('user_id');
		
		$data = $this->online_order
					 ->userOrder($user_id);
					
				
					foreach($data as $key=>$value)
					{
						$order_num = $value['order_num'];
						$dishes_num = $value['num']; //商品总数量
						$dishes_price =$value['price']; //商品单价
						
					}
					if($dishes_num>0 && $dishes_price>0)
					{
						//计算没个订单的总金额
						$dishes_total = $dishes_num*$dishes_price;
					}
						
						
					$res = $this->online_order
						->userOrderStatus($order_num);
					foreach($res as $key=>$value)
					{
						$order_status = $value['order_status'];
						
					}
				
			 // $this->assign('order_status',$order_status);
			 $this->assign('data',$data);
			 $this->assign('dishes_total',$dishes_total);
			 
		return  $this->fetch();
	}
	
	//用户取消订单操作
	public function delUserOrder()
	{
		
		$res = $this->online_order->delUserOrder(input());
		if($res == true)
		{
			$thi->success('删除成功','user_orderlist');
		}
		
	}
	
	
	
	
	
	
	
}
