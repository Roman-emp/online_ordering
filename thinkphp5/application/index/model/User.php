<?php
namespace app\index\model;
use think\Model;//引入model类
use think\Db;

class User
{
	public function getUserInfo()
	{
		// $data = Db::table('php_user')
		// 			->select();
		//name不用带表的前缀
		// $data = Db::name('user')
		// 		->where('uid','>','1')
		// 		->select();
		// //where的用法
		// $data = Db::name('user')
		// 		->where('uid > 2')
		// 		->select();	
		//where的第三种用法	
		$con['uid'] = ['>', 1]; //等价语法uid > 1
		$con['type'] = 1;
		$data = Db::name('user')
				->where($con)
				->buildSql();



		// $data = Db::name('user')
		// 		->where('uid > 2')
		// 		// ->fetchSql(true)//查看sql语句
		// 		->select();
		//有两种方式查看sql语句：fetchSql和buildSql
		// $data = Db::name('user')
		// 		->where('uid > 2')
		// 		->buildSql();
		dump($data);
		die;
				// ->select();	
		// return $data;
	}


	function multiTable()
	{
		//1 多表链接 where中需要时用字符串方式写链接条件
		// $data = Db::table('php_blog b ,php_category c')
		// 		->where("b.cid = c.cid")
		// 		->select();
		//2 使用join进行多表链接
		$data = Db::table('php_blog')
				->alias('b') //命名别名
				->join('php_category c','b.cid=c.cid')
				->select();

		return $data;
	}

	public function find()
	{

		// return Db::name('user')->where('uid < 0')->select();
		return Db::name('user')->where('uid < 0')->find();

	}

	public function multiCondition()
	{
		// return Db::name('user')
		// 		->where('name' ,'like','%天%')
		// 		->whereor('uid','<' ,3)
		// 		->select();
		return Db::name('user')
				->where("name like '%天%' or uid <3")		
				->select();
	}

	function tableInfo()
	{
		return Db::getTableInfo('php_user');
	}

	function time1()
	{
		//3使用英文单词表示
		// return Db::name('blog')->whereTime('create_time', 'last week')
		// 					->buildSql();

		//原生字时间比较，
		// return Db::name('blog')
		//         ->where('create_time','<' ,'2017-07-05 0:0:0')
			    // ->buildSql();
			    // 
		//使用whereTime
	    return Db::name('blog')
		        ->whereTime('create_time','<' ,'2017-07-05 0:0:0')
			    ->buildSql();
			   
	}

	//聚合查询
	function countUser()
	{
		//助手函数表名不带前缀
		// return db('user')->count("case when type = 0 then 1 end");
		return db('user')->field("count(distinct type)")->where("type=0")->buildSql();

		//去重统计 count\avg\sum
		//SELECT  count(DISTINCT type)    FROM php_user
	}
}

