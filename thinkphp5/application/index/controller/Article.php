<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class  Article extends Controller
{
	public function articleRead()
	{
		return $this->fetch();
	}
}