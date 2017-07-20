<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Dishes as DishesModel;

class Dishes extends Base
{
		//获取所有商品列表
		public function getAllDishesList()
		{
			//实例化模型
			$mlModel = new DishesModel();
			$res = $mlModel->getAllDishesList();

			$this->assign('res', $res);
			return $this->fetch();
		}

		//添加商品
		public function addDishes()
		{
			return $this->fetch();
		}

		//编辑商品
		public function updateDishes()
		{
			return $this->fetch();
		}
}