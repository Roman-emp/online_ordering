<?php

	namespace app\index\model;
	use think\Db;
	use think\Model;

	class Menu_list extends Model
	{
		
		//查询商家对应的菜单
		public function select_menu()
		{
			/*$menu = $this->field('menu_id,menu_name,menu_icon,menu_price')->select();
			return $menu;*/
			return Db::name('shop_menu s,online_shop o')
						->field('s.shop_id
								,menu_name
								,menu_id
								,menu_price
								,menu_icon
								,shop_name
								,shop_menu_type
								,shop_open_time
								,shop_icon
								,shop_address')
						->where('s.shop_id = o.shop_id')
						->select();
		}

		//根据菜品数量进行分页
		public function menu_limit()
		{
			 
			return Db::name('shop_menu s,online_shop o')
						->field('s.shop_id
								,menu_name
								,menu_id
								,menu_price
								,menu_icon
								,shop_name
								,shop_menu_type
								,shop_open_time
								,shop_icon
								,shop_address')
						->where('s.shop_id = o.shop_id')
						->paginate(3);
		}

		//根据菜品id，查询菜品详情
		public function select_menu_detail($menu_id)
		{
			return Db::table('shop_menu')
						->field('menu_id,menu_name,menu_icon,menu_price,menu_info')
						->where("menu_id=$menu_id")
						->select();
		}
		//根据商家id,查询商家信息
		public function select_shop_detail($id)
		{
			return Db::name('online_shop')
					->field('shop_name,shop_menu_type,shop_icon,shop_address')
					->where("shop_id=$id")
					->find();
		}

		//根据商家id与菜品id
		public function select_goods_detail($menu_id,$shop_id)
		{
			return Db::name('shop_menu')
					->field('menu_name,menu_price')
					->where("menu_id",$menu_id)
					->where('shop_id',$shop_id)
					->select();		
		}

		//根据查询有关商家的关键字,查询商家信息
		public function select_shop($con)
		{
			return Db::name('online_shop')
					->field('shop_name,shop_menu_type,shop_icon,shop_address,shop_id')
					->where("shop_name|shop_menu_type",'like',"%$con%")
					->select();
		}
		//根据搜索菜品词,查询相关类型的菜
		public function search_menu($con)
		{
			return Db::name('shop_menu s','online_shop o')
					->field(' shop_id,
							  menu_name,
							  menu_icon,
							  menu_price,
							  menu_info,
							  menu_id')
					->where('menu_name','like',"%$con%")
					->select();
		}
/*购物车部分*/

		//商品加入购物车
		public function add_cart($data)
		{
			return Db::name('shop_cart')->insert($data);	
		}
		//查询用户是否,将商品重复加入购物车
		public function select_cart($shop_id,$menu_id,$user_id)
		{
			return  Db::name('shop_cart')
						->field('menu_id,menu_name,menu_price,menu_icon,menu_num')
						->where('user_id',$user_id)
						->where('shop_id',$shop_id)
						->where('menu_id',$menu_id)
						->select();	
		}
		//查询用户加入购物车的商品
		public function select_user_cart($user_id)
		{
			return  Db::name('shop_cart')
						->field('shop_id,menu_id,menu_name,menu_price,menu_icon,menu_num')
						->where('user_id',$user_id)
						->select();	
		}
		//清空购物车
		public function clean_cart($data)
		{
			$menu_id = $data['menu_id'];//获取菜单id
			$user_id = $data['user_id'];
			$shop_id = $data['shop_id'];//获取商家id
			return Db::name('shop_cart')
			      ->where("menu_id=$menu_id and shop_id=$shop_id and user_id=$user_id")
			      ->delete();
		}


	}