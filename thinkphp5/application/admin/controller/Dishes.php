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
	//赋给添加页面
	 public function add() {
        

        return $this->fetch();
    }

		//添加商品
		public function addDishes()
		{
			//接受提交过来的数据
			$data = [

					'menu_name' => input('menu_name'),
					'menu_type' => input('menu_type'),
					'menu_info' => input('menu_info'),
					'menu_price'=> input('menu_price'),
					'menu_icon' => input('menu_icon'),
					'create_time'=> date('Y-m-d H:i:s',time()),
			];
	
			//实例化模型
			$mlModel = new DishesModel();
			$res = $mlModel->add($data);

			if($res>0)
			{
				$this->success('添加成功', 'getAllDishesList');
			}else{

				$this->error('添加失败......', 'add');
			}
 
			//return $this->fetch();
		}

		

		//赋给编辑页面
		public function edit()
		{
			//接受传过来的商品id
			$id = $_GET['id'];

			$mlM = Db('menu_list');
			//mlM_info
			$mlM_info = $mlM->where("menu_id = {$id}")->find();
			
			$this->assign('mlM_info', $mlM_info);
			return $this->fetch('edit');
		}

		//编辑商品
		public function update()
		{
			//接受提交过来的商品id
			$id = $_POST['id'];

			//接受提交过来的数据
			$data = [

					'menu_name' => input('menu_name'),
					'menu_type' => input('menu_type'),
					'menu_info' => input('menu_info'),
					'menu_price'=> input('menu_price'),
					'menu_icon' => input('menu_icon'),
					'create_time'=> date('Y-m-d H:i:s',time()),
			];



			//实例化模型
			$mlModel = new DishesModel();
            $res = $mlModel->updateModel($id,$data); 
			
			if($res === false)
			{
					$this->error('编辑失败...','edit');
			}else{
				$this->success('编辑成功','getAllDishesList');
			}
		}


			//删除商品
		public function delete()
		{
			$id = $_GET['id'];
			dump($id); exit;
			$mlM = Db('menu_list');
			$check = $mlM->where("menu_id={$id}")->find();
			if($check == false)
			{
				$this->error('非法操作','getAllDishesList');
			}

			$back = $mlM->where("menu_id = {$id}")->delete();
			if($back == true)
			{
				$this->success('删除成功','getAllDishesList');
			}

		}


}