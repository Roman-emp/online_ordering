<?php
namespace app\admin\model;
use think\Model;

class User extends Model
{
	public function checkUser($username,$password)
	{

		$data = $this->where('name',$username)
					 ->where('password',md5($password))
					 ->find();
		return $data?true:false;
	}

	//返回用户列表
	public function getUserList()
	{
		$res = $this->paginate(3);
		$render = $res->render();
		return ['data'=>$res,'render'=>$render];
	}

	}
}