<?php
namespace app\index\controller;
use think\Controller;
//解决重名问题，是用as
use app\index\model\User as UserModel;

class User extends Controller
{
	protected $user;
	public function _initialize()
	{
		$this->user = new UserModel();
	}

	public function listUser()
	{
		$data = $this->user->getUserInfo();
		$this->assign('data',$data);
		// return $this->fetch();
	}
	public function login()
	{
		return "登录啊";
	}

	public function multi()
	{
		$data = $this->user->multiTable();
		var_dump($data);
		die;
	}
	public function test()
	{
		//1 find和select的区别
		//find只取第一条数据，返回一维数组 如果没有结果返回null
		//select 返回多条数据，返回二维数组，如果没有结果返回一个
		//空数组
		var_dump($this->user->countUser());
	}
}