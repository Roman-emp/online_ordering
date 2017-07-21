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

		return $result;
	}

	//添加商品
	public function add($data)
	{
		//实例化对象
		$mlM = Db('menu_list');
		$result = $mlM->insert($data);

		return $result;
	}

	//编辑商品方法
	public function updateModel($id, $data)
	{

		//实例化对象
		$mlM = Db('menu_list');
		$result = $mlM->where("menu_id = {$id}")->update($data);
		
		return $result;
	}

	public function delete()
	{
	  
		$id = $_POST['id'];
		dump($id); exit;
		//实例化对象
		$mlM = Db('menu_list');
		$check = $mlM->where("menu_id={$id}")->find();
		if($check == false)
		{
			$this->error('非法操作', 'getAllDishesList');
		}

		$back = $mlM->where("menu_id={$id}")->delete();
		if($back == true)
		{
			$this->success('删除成功', 'getAllDishesList');
		}

	}

	
}