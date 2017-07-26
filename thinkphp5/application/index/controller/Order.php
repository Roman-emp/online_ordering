<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Order as orderModel;


class Order extends Controller
{
	//初始化对象
	protected $online_order;
	protected $order_status;
	public function _initialize()
	{
		$this->online_order = new orderModel();
		$this->order_status	= new orderModel();
	}
	//用户订单列表信息
	public function user_orderlist()
	{
		$user_id = session('user_id');
		
		$data = $this->online_order
					 ->userOrder($user_id);
			
					
		$this->assign('data',$data);	 
		return  $this->fetch();
	}
	
	//用户取消订单操作
	public function delUserOrder()
	{
		
		$res = $this->online_order->delUserOrder(input());
		if($res == true)
		{
			$this->success('删除成功','user_orderlist');
		}
		
	}

}
