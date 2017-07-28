<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Usermessage as UserMessageModel;
use app\admin\model\Links_url;

class Usermessage 	extends  Controller
{
	
	//初始化对象
	protected $user_comments;
	public function _initialize()
	{
		$this->user_comments = new UserMessageModel();
        $this->Links_url = new Links_url();
        $link = $this->Links_url->selink();
        $this->assign('link',$link);
	}
	
	//获取我的留言列表
	public function userMessage()
	{
		$data = $this->user_comments
					 ->getUserMessage();
					 
		$this->assign('data',$data);
		return $this->fetch();
	}
	

	
	
	//用户查看商家回复信息
	
	public function viewUserMess()
	{
		
		//接受穿过来的数据
		$menu_id = $_GET['menu_id']; //商品的id
		$shop_id = $_GET['shop_id']; //店铺的id
		$user_id = session('user_id');
		$data = $this->user_comments
			->viewUserMess($menu_id,$shop_id,$user_id);
			
			$this->assign('data',$data);
			return $this->fetch();
	}
	
	//用户删除留言
	public function delUserMess()
	{
		$res = $this->user_comments->delUserMess(input());
		if($res == true)
		{
			$this->success('删除成功','usermessage');
		}
	}
	
}