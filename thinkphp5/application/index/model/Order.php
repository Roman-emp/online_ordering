<?php
namespace app\index\model;
use think\DB;
use think\Model;

Class  Order  extends  Model
{
	//获取用户订单列表信息
	public function userOrder($user_id)
	{
		
		$olM = Db('online_order');
		$result = $olM->where("user_id ={$user_id}")
					  ->select();
					  
					  return $result;
	}
}
