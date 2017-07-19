<?php
namespace app\index\model;

use think\Model;
use think\Db;
	
	class User 
	{
		public function getUserInfo()
		{
			/*
				*where()三种使用方式
			*/
				//1.where();三个参数:1 查询关键字，2 比较运算符，3 值，第二个参数不传，默认是判等
			//$data = Db::name('user')->field('uid,username')->where('uid','<',20)->select();
				//2.where('字符串')
			//$data = Db::name('user')->where('uid < 20')->select();
				//3.数组形式
			// $con['uid'] = ['<',20];
			// $con['type'] = 0;
			// $data = Db::name('user')->where($con)->select();
			$data = Db::getTableInfo('user');
			return $data;
		}
		public function test()
		{
			 $data = db('user')->field('uid,username')->select();
			 return $data;
			/*db('user')->insert('username'=>'tom','pwd');*/
		}
		
	}