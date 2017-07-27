<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\User;

class Index extends Base
{
	public function index()
	{
		
		return $this->fetch();
	}
}