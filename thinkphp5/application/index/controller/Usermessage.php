<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\UserMess as UserMessModel;

class Usermessage 	extends  Controller
{
	//获取我的留言列表
	public function userMessage()
	{
		return $this->fetch();
	}
	
}