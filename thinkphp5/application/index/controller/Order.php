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
			 $this->assign('data',$data);
			 
		return  $this->fetch();
	}
}
