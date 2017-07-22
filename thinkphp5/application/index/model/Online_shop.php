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
	}