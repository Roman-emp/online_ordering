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

		//storedetail页面进行商品分页,使用此方法
		public function menu_limit($shop_id)
		{
			return Db::name("online_shop o,shop_menu s")
						->field('*')
						->where("o.shop_id=s.shop_id and o.shop_id=$shop_id")
						->paginate(1);;
		}
		/*public function select_shop_detail($shop_id)
		{
			return Db::name("online_shop o,shop_menu s")
						->field('*')
						->where("o.shop_id=s.shop_id and o.shop_id=$shop_id")
						->select();
		}*/

		//首页查询入驻的商家
		public function select_shop($shop_id)
		{
			return Db::name('online_shop')
						->field('shop_id,shop_name,shop_icon,shop_open_time,shop_address')
						->where("shop_id in ($shop_id)")
						->select();
		}
		
		
		//用户收藏店铺
		public function UserFavorShop($shop_id)
		{
			$dM = Db('user_favor');
			
			$data = [
				'shop_id' =>$shop_id,
				'user_id' =>session('user_id'),
				'create_time'=>date('Y-m-d H:i:s',time()),
			];
		
			$user_id = session('user_id');

			$result = Db::name('user_favor')
						->insert($data);
				return $result;
						
		}
		
		//用户取消店铺收藏
		public function delFavorModel($shop_id)
		{
			$user_id = session('user_id');
			return Db::name('user_favor')
					->where("shop_id=$shop_id and user_id=$user_id")
					->delete();
					
					
		}
		
		
		
	}