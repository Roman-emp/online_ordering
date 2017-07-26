<?php
namespace app\index\model;
use think\DB;
use think\Model;

Class Address extends Model
{
	//添加用户地址信息
	public function addUserAddress($data)
	{
		
		$rsM = Db('recieve_address');
		$result = $rsM->insert($data);
		return $result;
	}
	
	//编辑用户地址信息
	public function updateUserAddress($recieve_id,$data)
	{
		
		$rsM = Db('recieve_address');
		$result = $rsM->where("recieve_id=$recieve_id")
					  ->update($data);
					 return $result; 
	}
	
	//前台完成添加订单地址
	public function add_address($data)
	{
		
		$arr = [
			'recieve_username'	=> $data['username'],
			'recieve_address'	=> $data['address'],
			'recieve_ems'		=> '美团',
			'recieve_tel'		=> $data['province'].$data['city'].$data['area'],
			'user_id'			=> session('user_id'),
			'recieve_address_detail' => $data['address'],
		];
		return Db::name()->insert($arr);
	}

}