<?php
	namespace app\admin\model;
	use think\Model;
	use think\Db;

	class Online_order extends Model
	{
		public function order_detail($shop_id)
		{
			return Db('online_order')
					->alias('o')
					->join('order_status s','o.order_num=s.order_num')
					->join('recieve_address r','o.user_id=r.user_id')
					->field('recieve_person,menu_id,user_tel,create_time,order_status,s.order_num,recieve_address,recieve_address_detail')
					->where('order_status','未收货')
					->where('shop_id',$shop_id)
					->select();
		}		
	}