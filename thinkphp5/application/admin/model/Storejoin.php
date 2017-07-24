<?php
namespace app\admin\model;
use think\DB;
use think\Model;

Class Storejoin extends Model
{
	
	//获取商家入驻列表信息
	public function storeList()
	{
		//实例化对象
		$stM = Db('store_join');
		$res = $stM->select();
		return $res;
	}
	
	
	//编辑商家入驻
	public function storeUpdate($store_id,$data)
	{
		
		//实例化对象
		$stM = Db('store_join');
		$result = $stM->where("store_id = {$store_id}")
						->update($data);
		
		return $result;
	}
	
	

}