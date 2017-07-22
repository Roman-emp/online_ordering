<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User as UserModel;

class User extends Controller
{
    
   public function _initialize()
   {

      $this->usermode = new UserModel();

    }
   
 

	public function login()
	{
		return $this->fetch();
	}

	//获取管理员列表
	public  function  adminlist()
	{
		//实例化对象模型
		$adModel = new UserModel();
		$res = $adModel->adminlist();
		
		$this->assign('res',$res);
		return $this->fetch();
	}
	
}