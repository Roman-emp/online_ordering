<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Address as AddressModel;
use app\admin\model\Links_url;

class Address 	extends  Controller
{
	
	protected $address;
	public function _initialize()
	{
		$this->address = new AddressModel();
		 $this->Links_url = new Links_url();
	      $link = $this->Links_url->selink();
	      $this->assign('link',$link);
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

	

	//编辑用户地址信息
	public function editUserAddress()
	{
		$recieve_id = $_GET['recieve_id'];
		$rsM = Db('recieve_address');
		$rsM_info = $rsM->where("recieve_id= $recieve_id")
						->find();
		$this->assign('rsM_info',$rsM_info);
		return $this->fetch();
	}
	
	//编辑用户地址信息处理数据
	public function updateUserAddress()
	{
		$recieve_id = $_POST['recieve_id'];
		
		$data = [
			'recieve_name'	=>	input('recieve_name'),
			'recieve_address_detail' => input('recieve_address_detail'),
			'recieve_tel'	=>	input('recieve_tel'),
			'recieve_ems'	=>	input('recieve_ems'),
		];
		
		$res = $this->address
					->updateUserAddress($recieve_id,$data);
			if($res==false)
			{
				$this->error('修改失败','editUserAddress');
			}else{
				$this->success('修改成功','userAddress');
			}
 	}
	
	
	//删除用户地址信息
	public function delUserAddress()
	{
		$recieve_id = $_GET['recieve_id'];
		$rsM = Db('recieve_address');
		$check = $rsM->where("recieve_id = $recieve_id")
				   ->find();
				   if($check == false)
				   {
					   $this->error('非法操作', 'userAddress');
				   }
		
		$back = $rsM->where("recieve_id = $recieve_id")
					  ->delete();
					if($back == true)
					{
						$this->success('删除成功','userAddress');
					}
		
	}



} 