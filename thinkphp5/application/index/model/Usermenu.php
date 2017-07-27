<?php
namespace app\index\model;
use think\DB;
use think\Model;

class Usermenu extends Model
{
	
	//获取用户购买商品的列表信息
	public function getUserMenuList($user_id)
	{
		$data = Db('shop_menu me, online_shop sh, online_user us, menu_list li')
			->field('us.user_name,li.menu_name,sh.shop_name,li.menu_price,li.menu_icon,sh.shop_id,li.menu_id')
			->where("me.shop_id = sh.shop_id and me.menu_id = li.menu_id and us.user_id=$user_id")
			->select();

			return $data;
			
			
	}
	
	
}