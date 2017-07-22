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

	//获取用户列表
	public function getUserList()
	{
		$res = $this->paginate(3);
		$render = $res->render();
		return ['data'=>$res,'render'=>$render];
	}

	//获取管理员列表
	public function adminlist()
	{
		//实例化对象
		$adM = Db('online_admin');
		$res = $adM->select();
		return $res;
	}

	//添加管理员
	public function add($data)
	{

		//实例化对象
		$adM = Db('online_admin');
		$res = $adM->insert($data);
		return $res;
	}

	//编辑管理员信息
	// public  function updateModel()
	// {
	// 	//实例化对象
	// 	$adM = Db('online_admin');
	// }

	
}