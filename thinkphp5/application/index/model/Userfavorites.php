<?php
namespace app\index\model;
use think\Db;
use think\Model;

Class  Userfavorites  extends  Model
{
	//我的用户收藏
	public function user_favorites()
	{
		$result = Db('user_favor fa,online_user us,menu_list me, online_shop sh')
				
				 ->where("fa.user_id =us.user_id and fa.menu_id = me.menu_id and fa.shop_id = sh.shop_id")
				 ->select();

				return $result;
	}
	
	
			//删除我的收藏
		public function delUserFavor()
		{
			return Db::name('user_favor')
				->where('menu_id',input('menu_id'))
				->where('shop_id',input('shop_id'))
				->where('user_id',session('user_id'))
				->delete();
		}
			
	}