<?php
namespace app\admin\model;
use think\Model;

class Dishes extends Model
{
	//获取商品列表
	public function getAllDishesList()
	{
		//实例化对象
		$mlM = Db('menu_list');
		$result = $mlM->select();
		dump($result);
		return $result;
	}
}