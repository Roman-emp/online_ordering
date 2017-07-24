<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Storejoin as StorejoinModel;

class Storejoin extends Base
{
	//初始化对象 
   public function _initialize()
   {

      $this->storemodel = new StorejoinModel();

    }
	
	//获取商家入驻所有信息
	public function index()
	{
		$data = $this->storemodel->storeList();
		
		$this->assign('data',$data);
		
		return $this->fetch();
	}
	
	//编辑商家入驻信息
	public function edit()
	{
		//接受商家入驻id
		$store_id = $_GET['store_id'];
		
		//实例化对象
		$stM = Db('store_join');
		
		$stM_info = $stM->where("store_id ={$store_id}")->find();
		
		$this->assign('stM_info',$stM_info);
		return $this->fetch();
		
	}
	
	//处理编辑商家入驻信息
	public function update()
	{
		//接受商家id
		$store_id=$_REQUEST['store_id'];
	
		$data = [
			'store_name'	=> input('store_name'),
			'store_tel'		=>	input('store_tel'),
			'is_check'		=>	input('is_check'),
		];
		
		
		$res = $this->storemodel->storeUpdate($store_id,$data);
		
		if($res == false)
		{
			$this->error('编辑失败','edit');
		}else{
			$this->success('编辑成功','index');
		}
	}
	
	//删除商家入驻信息
	public function delStore()
	{
		$store_id = $_GET['store_id'];
		
		$stM = Db('store_join');
		$check = $stM->where("store_id ={$store_id}")
					  ->find();
				  
		if($check==false)
		{
			$this->error('非法操作','index');
		}
		
		$back = $stM->where("store_id={$store_id}")
					->delete();
		if($back == true)
		{
			$this->success('删除成功', 'index');
		}
	}
	
	//搜索商家入驻信息
	
	public function search()
	{

			//接受提交过来的信息
			$data['search'] = input('search');
			$data['button']	= input('button');
			
			$stM = Db('store_join');
			$res = $stM->where('store_name','like','%'.$data['search'].'%')
					->select();
			$this->assign('res',$res);
			return $this->fetch();
				
	
	}
	
}
