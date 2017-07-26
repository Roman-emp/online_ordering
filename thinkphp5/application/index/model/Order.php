<?php
namespace app\index\model;
use think\DB;
use think\Model;

Class  Order  extends  Model
{
	//获取用户订单列表信息
	public function userOrder($user_id)
	{
		
		$result = Db('online_user,order_status')
				 ->where("online_user.user_id =order_status.user_id")
				 ->select();

				return $result;
	}
	
	
	//取消我的订单
	public function delUserOrder()
	{
		return Db::name('order_status')
					// ->where('id',input('order_id'))
					->where('order_num',input('order_num'))
					->where('user_id',session('user_id'))
					->delete();
	}
}
