<?php
namespace app\index\model;
use think\DB;
use think\Model;
class Storejoin extends Model
{
	
	//添加商家入住信息
	public function addStorejoin($arr)
	{
		
		//实例化对象
		$stM = Db("store_join");
		$result = $stM->insert($arr);
		return $result;
	}
}