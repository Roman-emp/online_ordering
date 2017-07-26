<?php
namespace app\index\model;
use think\DB;
use think\Model;

Class  Order  extends  Model
{

	public function userOrder($user_id)
	{
		
		$result = Db('online_user,order_status')
				 ->where("online_user.user_id =order_status.user_id")
				 ->select();

				return $result;
	}
	
	

	//脫脙禄搂露漏碌楼脕脨卤铆拢篓虏茅脩炉脫脙禄搂露漏碌楼脳麓脤卢拢漏
	public function userOrderStatus($order_num)
	{
		
		$result = Db('online_order,order_status')
					->where("online_order.order_num=order_status.order_num")
					->select();
					
					return $result;
	}

	public function delUserOrder()
	{
		return Db::name('order_status')
					// ->where('id',input('order_id'))
					->where('order_num',input('order_num'))
					->where('user_id',session('user_id'))
					->delete();
	}
	//完成订单支付
	public function complete_order($data)
	{
		$len = conut($menu_id);//循环插入数据的次数
		$order_num = 'LBJ'.time();//订单编号
		$create_time = date('Y-m-d H:i:s',time());//下单时间
		for ($i=0; $i <$len ; $i++) 
		{ 
			$arr = [
					'order_num' 		=> $order_num,
					'user_id'			=> session('user_id'),
					'recieve_person' 	=> $data['username'],
					'shop_id'			=> $shops_id[$i],
					'menu_id'			=> $menus_id[$i],
					'num'				=> $menus_num[$i],
					'price'				=> $menus_price[$i],
					'user_tel'			=> $data['tel'],
					'order_add_info'	=> $data['msg'],
					'create_time'		=> $create_time
			];
			return Db::name('online_order')->insert($arr);
		}
	}
	//添加订单状态
	public function add_order_status($data)
	{
		$order_num = 'LBJ'.time();//订单编号
		$arr = [
			'order_num' 	=> $order_num,
			'order_status'  => '未收货',
			'pay_way' 		=> '支付宝',
			'logistics' 	=> '美团',
		];
		return Db::name('order_status')->inset($arr);
	}
}
