<?php

	namespace app\index\model;
	use think\Db;
	use think\Model;

	class Online_shop extends Model
	{
		//查询商铺信息
		public function select_shop_detail($shop_id)
		{
			return Db::name("online_shop o,shop_menu s")
						->field('*')
						->where("o.shop_id=s.shop_id and o.shop_id=$shop_id")
						->select();
		}

		//首页查询入驻的商家
		public function select_shop($shop_id)
		{
			return Db::name('online_shop')
						->field('shop_id,shop_name,shop_icon,shop_open_time,shop_address')
						->where("shop_id in ($shop_id)")
						->select();
		}
	}