<?php
namespace app\index\model;
use think\Db;
use think\Model;

Class  Userfavorites  extends  Model
{
	//我的用户收藏
	public function user_favorites()
	{
		$result = Db('user_favor fa,online_user us,online_shop sh')
				
				 ->where("fa.user_id =us.user_id and fa.shop_id = sh.shop_id")
				 ->select();

				return $result;
	}
	
	
			//删除我的收藏
		public function delUserFavor($shop_id)
		{
			return Db::name('user_favor')

				->where('shop_id',input('shop_id'))
				->where('user_id',session('user_id'))
				->delete();
		}
			
	}