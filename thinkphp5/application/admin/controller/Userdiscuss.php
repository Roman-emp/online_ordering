<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Dishes as DishesModel;

class Userdiscuss extends Base
{
	//获取品论信息
	public function index()
	{
		$data = Db('user_comments us, shop_menu me, online_shop sh, online_user ue')
			->field("us.comment_id,us.message_name,us.reply_content,ue.user_name,sh.shop_name,me.menu_name,me.menu_id,sh.shop_id")
			->where("us.user_id = ue.user_id  and us.menu_id = me.menu_id and us.shop_id=sh.shop_id and is_reply=0")
			->select();
		$this->assign('data',$data);
		return $this->fetch();
	}
	
	//商家回复用户留言评论
	public function add()
	{
		$shop_id=$_GET['shop_id'];
		$menu_id = $_GET['menu_id'];
		$this->assign('shop_id',$shop_id);
		$this->assign('menu_id',$menu_id);
		
			return $this->fetch();
	}
	
	
	//商家回复用户留言评论处理
	public function insert()
	{

		$data = [
			'shop_id' =>input('shop_id'),
		
			'menu_id' =>input('menu_id'),
			'reply_content' =>input('reply_content'),
			'user_id'	=>session('user_id'),
			'is_reply'  =>1,
			'create_time'=>date('Y-m-d H:i:s',time())
			
		];

		
		$result = Db('user_comments')
					->insert($data);
					
			if($result == true)
			{
					$this->success('回复成功','index');
			}else{
				$this->error('回复失败','index');
			}
	}
	
}