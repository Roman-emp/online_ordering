<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Dishes as DishesModel;

class Payway extends Base
{
	
		//获取支付信息
		public function index()
		{
			$data = Db('pay_way')
					->select();
			$this->assign('data',$data);
			return $this->fetch();
		}
		
		//添加支付方式
		public function add()
		{
			return $this->fetch();
		}


		//添加支付方式处理
		public function insert()
		{

			$data = [
				'paytype' =>input('paytype'),
				'create_time' =>date('Y-m-d H:i:s', time()),
			];

			$res = Db('pay_way')
					->insert($data);

				if($res == true)
				{
					$this->success('添加成功','index');

				}else{
					$this->error('添加失败','add');
				}
		}

		//编辑支付方式
		public function edit()
		{
			$id = $_GET['id'];
			
			$info = Db('pay_way')
					->where("id={$id}")
					->find();
				$this->assign('info',$info);
				return $this->fetch();
		} 

		//编辑支付方式处理数据
		public function update()
		{
			$id = $_POST['id'];
			
			$data = [
			
				'paytype' =>input('paytype'),
				
			];
			$res = Db('pay_way')
						->where("id = {$id}")
						->update($data);
					if($res == false)
					{
						$this->error('编辑失败','index');
					}else{
						$this->success('编辑成功','index');
					}
		}
		
		
		//删除支付方式
		public function delete()
		{
			$id = $_GET['id'];
			$result = Db('pay_way')
						->where("id={$id}")
						->delete();
				if($result == false)
				{
					$this->error('删除失败','index');
					}else{
						$this->success('删除成功','index');
				}
		}


}