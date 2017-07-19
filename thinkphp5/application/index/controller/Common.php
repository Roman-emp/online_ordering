<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;


class Common extends Controller
{
	public function header()
	{
		return $this->fetch();
	}
}
