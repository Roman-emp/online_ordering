<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Order as orderModel;
use app\admin\model\Links_url;
//use extend\hbj\MyCurl;

class Order extends Controller
{
	//初始化对象
	protected $online_order;
	protected $order_status;
	public function _initialize()
	{
		$this->online_order = new orderModel();
		$this->order_status	= new orderModel();
		$this->Links_url = new Links_url();
        $link = $this->Links_url->selink();
        $this->assign('link',$link);
	} 
	//用户订单列表信息
	public function user_orderlist()
	{
		$user_id = session('user_id');	
		$data = $this->online_order
					 ->userOrder($user_id);
			
					

					// foreach($data as $key=>$value)
					// {
					// 	$order_num = $value['order_num'];
					// 	$dishes_num = $value['num']; //商品总数量
					// 	$dishes_price =$value['price']; //商品单价
						
					// }
					// if($dishes_num>0 && $dishes_price>0)
					// {
					// 	//计算没个订单的总金额
					// 	$dishes_total = $dishes_num*$dishes_price;
					// }
						
						
					// $res = $this->online_order
					// 	->userOrderStatus($order_num);
					// foreach($res as $key=>$value)
					// {
					// 	$order_status = $value['order_status'];
						
					// }
		
			
		/*$url = "http://v.juhe.cn/exp/index?com=yd&no=3973210243695&dtype=&key=c55fd666abc71d2d9739d59c14a44055";
		$curl = MyCurl::get($url);
		$arr = json_decode($curl,true);
		
		$title = "快递公司：".$arr['result']['company']."快递单号：".$arr['result']['no']; 
		$content = $arr['result']['list'];*/
	
			// $this->assign('order_status',$order_status);
			 $this->assign('data',$data);
			 //$this->assign('dishes_total',$dishes_total);
			// $this->assign('content',$content);
		
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
