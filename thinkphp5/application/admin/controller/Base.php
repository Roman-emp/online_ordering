<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
	public function _initialize()
	{
		if (!session('?id')) {
			$this->error("请登录先",'admin/user/login');
		}
	}
}