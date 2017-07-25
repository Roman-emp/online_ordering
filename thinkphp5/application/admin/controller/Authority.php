<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Authority as Auth;

//权限管理
class Authority extends Base
{

	public function _initialize()
   {

      $this->Auth = new Auth();

    }
	
     //角色管理
	public function admin_role()
	{
		$res= $this->Auth->seleroles();
		$this->assign('res',$res);
	
		return $this->fetch();
	}
	//管理员角色添加
	public function admin_role_add()
	{
		$data = input();
		var_dump($data);
		return $this->fetch();
	}
	//权限管理
	public function admin_permission()
	{
		return $this->fetch();
	}

	//添加角色
	public function addrole()
	{
		return $this->fetch();
	}
   //处理添加角色数据

	public function doaddrole()
		{
			$data = input();
			$re = $this->Auth->addroles($data);
			if($re)
			{
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
      



}