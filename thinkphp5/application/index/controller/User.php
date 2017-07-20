<?php
namespace app\index\controller;
use think\Controller;

class User extends Controller
{
	//用户注册
	public function register()
	{
		return $this->fetch();
	}


	//用户登录
		public function login()
		{
			return $this->fetch();
		}

	//用户中心
		public function usercenter()
		{
			return $this->fetch();
		}

		//我的收藏
		public function userfavorites()
		{
				return  $this->fetch();
		}


		//用户账户管理
		public function userAccount()
		{
			return  $this->fetch();
		}

		//用户退出登录
		public function userExit()
		{
			return  $this->fetch();
		}
}

