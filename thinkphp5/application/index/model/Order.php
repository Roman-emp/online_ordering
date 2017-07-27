<?php
namespace app\index\model;
use think\Db;
use think\Model;

Class  Order  extends  Model
{
	//查询用户订单
	public function userOrder($user_id)
	{
		
		$result = Db('online_user,order_status')
				 ->where("online_user.user_id =order_status.user_id")
				 ->select();

				return $result;
	}
	
	

	
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
		$len = count(session('menus_id'));//循环插入数据的次数

		$order_num = 'LBJ'.time();//订单编号
		$create_time = date('Y-m-d H:i:s',time());//下单时间
		$menus_id = session('menus_id');
		$shops_id = session('shops_id');
		$menus_num = session('menus_num');
		$menus_price = session('menus_price');
		for ($i=0; $i <$len ; $i++) 
		{ 
			$arr = [
					'order_num' 		=> $order_num,
					'user_id'			=> session('user_id'),
					'recieve_person' 	=> $data['username'],
					'shop_id'			=> $shops_id[$i],
					'menu_id'			=> $menus_id[$i],
					'num'				=> $menus_num[0]['num'],
					'price'				=> $menus_price[$i],
					'user_tel'			=> $data['tel'],
					'order_add_info'	=> $data['msg'],
					'create_time'		=> $create_time
			];
		
			 Db::name('online_order')->insert($arr);	
		}
		return true;
	}
	//添加订单状态
	public function add_order_status()
	{
		$order_num = 'LBJ'.time();//订单编号
		$arr = [
			'user_id'		=> session('user_id'),
			'order_num'		=> $order_num,
			'order_status'  => '未收货',
			'pay_way'		=> '支付宝',
			'logistics'		=> '美团',
		];
		return Db::name('order_status')->insert($arr);
	}
}
