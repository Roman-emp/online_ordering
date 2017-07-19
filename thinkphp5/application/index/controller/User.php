<?php

	namespace app\index\controller;

	use think\Controller;
	use app\index\model\User as UserModel;
	use extend\Connect2;
	class User extends Controller
	{
		protected $user;
		public function user()
		{
				//getUserInfo();返回数据库表的类型、字段等
			//$data = $this->user->getUserInfo();
			/*$data = $this->user->test();
			dump($data);*/
			
		}
		public function register()
		{
			return $this->fetch();
		}
		public function login()
		{	
			return $this->fetch();
		}
	}