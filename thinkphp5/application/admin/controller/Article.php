<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Article as ArticleModel;

class Article extends Base
{
	//支付方式
	public function payWay()
	{
		//实例化对象模型
		$wpModel = new ArticleModel();
		$data = $wpModel->payWayMod();
		
		$this->assign('data',$data);
		return $this->fetch('payWay');
	}

	//配送方式
	public function sendWay()
	{
		//实例化对象模型
		$swModel = new ArticleModel();
		$data = $swModel->sendWayMod();
		$this->assign('data', $data);
		return $this->fetch();
	}


		//获取配送信息
		public function index()
		{
			$data = Db('article')
					->select();
			$this->assign('data',$data);
			return $this->fetch();
		}
		
		//添加配送信息
		public function add()
		{
			return $this->fetch();
		}


		//添加配送信息处理
		public function insert()
		{

			$data = [
				'title' =>input('title'),
				'content'=>input('content'),
				'create_time' =>date('Y-m-d H:i:s', time()),

			];
	

			$res = Db('article')
					->insert($data);

				if($res == true)
				{
					$this->success('添加成功','index');

				}else{
					$this->error('添加失败','add');
				}
		}

		//编辑配送信息
		public function edit()
		{
			$id = $_GET['id'];
			
			$info = Db('article')
					->where("id={$id}")
					->find();
				$this->assign('info',$info);
				return $this->fetch();
		} 

		//编辑配送信息处理数据
		public function update()
		{
			$id = $_POST['id'];
	
			$data = [
				'title' =>input('title'),
				'content'=>input('content'),

			];
			$res = Db('article')
						->where("id = {$id}")
						->update($data);
					if($res == false)
					{
						$this->error('编辑失败','index');
					}else{
						$this->success('编辑成功','index');
					}
		}
		
		
		//删除配送信息
		public function delete()
		{
			$id = $_GET['id'];
			$result = Db('article')
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