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
}