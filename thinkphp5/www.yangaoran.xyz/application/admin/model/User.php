<?php
namespace app\admin\model;
use think\DB;
use think\Model;


class User extends Model
{
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
	public  function updateModel($id, $data)
	{

		//实例化对象
		$adM = Db('online_admin');
		$result = $adM->where("id={$id}")->update($data);
		return $result;
	}

	//获取用户列表信息
	public function getUserList()
	{
		//实例化对象
		$adM = Db('online_user');
		$result = $adM->select();
		return $result;
	}

	//添加用户信息
	public function addUser($data)
	{
		$usM = Db('online_user');
		$result = $usM->insert($data);
		return $result;
	}


	//编辑用户信息
	public function editUser($user_id,$data)
	{

		$usM = Db('online_user');
		
		$result = $usM->where("user_id = {$user_id}")->update($data);
    
		return $result;
	}



	//用户登录


	public function dologin($name,$pwd)
	{
       return Db::name('online_admin')->where('name',$name)
                                     ->where('password',$pwd)->find();
	}

   
	
}