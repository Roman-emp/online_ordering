<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Address as AddressModel;

class Address 	extends  Controller
{
	
	protected $address;
	public function _initialize()
	{
		$this->address = new AddressModel();
		
	}
	
	
	//获取用户地址信息
	public function userAddress()
	{
		//根据用户id查询用户详细地址
		$user_id = session('user_id');
		//我的地址列表
		$raM = Db('recieve_address');
	
		$raM_list = $raM->where("user_id ={$user_id}")
						->select();
			
			$this->assign('raM_list',$raM_list);
			return $this->fetch();
	}
	
	//添加用户地址信息
	public function addUserAddress()
	{
		$user_id = session('user_id');
		
		//用户地址信息
		$data =[
			'recieve_name'			=>input('recieve_name'),
			'recieve_address_detail'=>input('recieve_address_detail'),
			'recieve_ems'			=>input('recieve_ems'),	
			'recieve_tel'			=>input('recieve_tel'),
			'user_id'				=>$user_id,
		];
		
		$res = $this->address
					->addUserAddress($data);
					
		if($res)
		{
			$this->success('添加成功','userAddress');
		}else{
			$this->error('添加失败','userAddress');
		}
		
		
	}


	//我的留言
	public function userMessage()
	{
		return $this->fetch();
	}

	//我的优惠劵
	public function userCoupon()
	{
		return $this->fetch();
	}
} 