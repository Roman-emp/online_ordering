<?php
namespace app\index\model;
use think\DB;
use think\Model;

class Usermessage extends Model
{
	
	// SELECT ue.user_name,sh.shop_name,me.menu_name FROM 
// user_comments as us, shop_menu me, online_shop sh, online_user ue
// where us.user_id = ue.user_id  and us.menu_id = me.menu_id and us.shop_id=sh.shop_id
	
	//查询用户留言信息（某个用户，某个商家，某个商品的留言）
	public function getUserMessage()
	{
		$data = Db('user_comments us, shop_menu me, online_shop sh, online_user ue')
			->field("us.message_name,us.reply_content,ue.user_name,sh.shop_name,me.menu_name,me.menu_id,sh.shop_id")
			->where("us.user_id = ue.user_id  and us.menu_id = me.menu_id and us.shop_id=sh.shop_id and is_reply=0")
			->select();
	
			return $data;
	}
	
	
	//查看商家对某个用户的某个店铺的某个商品进行留言问题回复
	public function viewUserMess($menu_id,$shop_id,$user_id)
	{
		
				$data = Db('user_comments')
							->field('reply_content,reply_time') //reply_content回复内容 reply_time回复时间
							->where("menu_id = {$menu_id} and shop_id = {$shop_id} and user_id={$user_id} and is_reply=1")
							->select();
			
							return $data;
			
	}
	
	
	//用户删除留言
	public function delUserMess()
	{
		return Db::name('user_comments')
				->where('menu_id',input('menu_id'))
				->where('shop_id',input('shop_id'))
				->where('user_id',session('user_id'))
				->delete();
	}
	
	
		
}