<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\User;

class Index extends Base
{
	public function index(User $user)
	{
		$data = $user->getUserList();

		// echo "首页";
		return $this->fetch('',['data'=>$data['data'],'render'=>$data['render']]);
	}
}