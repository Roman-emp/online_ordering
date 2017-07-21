<?php
 namespace app\index\model;
use think\DB;
use think\Model;

class User extends Model
{
	
    //判断用户名是否重复
	public function checkUser($username)
	{
		return DB::name('online_user')->where('user_name',$username)->select();
	}
	//注册用户
	public function doReg($data)
	{
		return DB::name('online_user')->insert($data);
	}
	//用户登录
	public function doLogin($name,$pwd)
	{
       return DB::name('online_user')->where('user_name',$name)
                                     ->whereOr('user_email',$name)
                                     ->whereOr('user_tel',$name)
                                     ->where('user_pwd',$pwd)->find();
	}
	//修改个人信息
   public function modify($data)
   {
         $id  =	session('user_id');
   	return DB::name('online_user')->where('user_id',$id)->update($data);
   }
   //个人信息展现
   public function inquire()
   {
         $id  =	session('user_id');
   	 $data = DB::name('online_user')->where('user_id',$id)->find();
   	 return $data;
   }



	
}