<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Dishes as DishesModel;

class Webmanager extends Base
{
	
	//站点信息
	public function index()
	{
		
		$data = Db('web_manager')
					->select();
			$this->assign('data',$data);
			return $this->fetch();
	}
	
	//编辑站点信息（关闭站点信息）
	public function edit()
	{
		$id = $_GET['id'];
			
			$info = Db('web_manager')
					->where("id={$id}")
					->find();
				$this->assign('info',$info);
				return $this->fetch();
	}
	
	//处理关闭站点信息
	public function update()
	{
		$id = $_POST['id'];

		$data = [
			'name' => input('name'),
			'url'  => input('url'),
			'telephone' => input('telephone'),
			'is_close'  =>input('is_close'),
		];
		
		$info = Db('web_manager')
				->where("id={$id}")    //is_close 0表示开启  1表示关闭
				->update($data);
				if($info == true)
				{
					$this->success('编辑成功','index');
				}else{
					$this->error('编辑失败','index');
				}
	}
	
	
	
}