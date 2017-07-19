<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index()
    {   
    	return $this->fetch();
    }
    public function user()
    {
    	
    }
    public function login()
    {
    	return 22;
    }
}
