<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User as UserModel;

class User extends Controller
{
	public function login()
	{
		return $this->fetch();
	}

	//登录处理
	//$user 依赖注入
	public function doLogin(UserModel $user)
	{
		//验证失败
		$res = $this->validate(input(),'User');
		if ($res !== true) {
			$this->error($res);
			die;
		}
		//查询数据库
		$username = input('username');
		$password = input('password');
		if ($user->checkUser($username,$password)) {
			session('username',$username);
			$this->success('登陆成功','admin/index/index');
		} else {
			$this->error('登录失败');
		}
	}
}