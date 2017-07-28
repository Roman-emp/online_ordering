<?php
namespace app\admin\controller;
use think\captcha;
use think\Session;
use app\admin\controller\Base;

class User extends Base
{
   //初始化对象 
 

	//获取管理员列表
	public  function  adminlist()
	{
		
		$res = $this->usermode->adminlist();
		 $le = count($res);
		 $this->assign('le',$le);
		$this->assign('res',$res);
		return $this->fetch();
	}

	//添加管理员（赋给添加页面，渲染模板）
	public function add()
	{

		return $this->fetch();
	}

	//添加管理员
	public function insert()
	{
		//接受提交过来的数据
		$data = [
			'name'      =>  input('name'),
			'password'  =>  md5(input('pwd')),
			'password'  =>  md5(input('repwd')),
			'sex'       =>  input('sex'),
			'telephone' =>  input('telephone'),
			'email'     =>  input('email'),
			'role'      =>  input('role'),
			'remark'    =>  input('remark'),
			'create_time'=> date('Y-m-d H:i:s', time()),
		];

		
		$result = $this->usermode->add($data);
		if($result == true)
		{
			$this->success('添加成功');
		}else{
			$this->error('添加失败...');
		}
	}

	//赋给编辑页面
	public function  edit()
	{
		//接受id
		$id = $_GET['id'];
		
		//实例化对象
		$adM = Db('online_admin');
		$adM_info = $adM->where("id = {$id}")->find();
		
		$this->assign('adM_info', $adM_info);
		return $this->fetch();

	}

	//编辑管理员信息
	public function update()
	{
		//接受传过来的id值
		$id = $_POST['id'];

		//接受提交过来的数据
		$data = [
			'name'      =>  input('name'),
			'password'  =>  md5(input('pwd')),
			'sex'       =>  input('sex'),
			'telephone' =>  input('telephone'),
			'email'     =>  input('email'),
			'role'      =>  input('role'),
			'remark'    =>  input('remark'),
			'create_time'=> date('Y-m-d H:i:s', time()),
		];
		

		
		$result = $this->usermode->updateModel($id, $data);

		if($result == false)
		{
			$this->error('编辑失败...','add');
		}else{
			$this->success('编辑成功', 'adminlist');
		}
	}

	//删除管理员
	public function delete()
	{
		$id = $_GET['id'];
			
			$adM = Db('online_admin');
			$check = $adM->where("id={$id}")->find();

		
			if($check == false)
			{
				$this->error('非法操作','adminlist');
			}

			

			$back = $adM->where("id = {$id} ")->delete();
			if($back == true)
			{
				$this->success('删除成功','adminlist');
			}
	}

	//获取用户列表信息
	public function userlist()
	{
	
		$usM_list = $this->usermode->getUserList();
		$this->assign('usM_list', $usM_list);
		return $this->fetch();
	}

	//赋给添加用户信息页面
	public function addUser()
	{
		return $this->fetch();
	}

	//添加用户信息
	public function userInsert()
	{
		//接受提交过来的数据
		$data = [
			'user_name'     =>input('username'),
			'user_pwd'      =>md5(input('user_pwd')),
			'user_email'    =>input('email'),
			'user_tel'      =>input('user_tel'),
			'user_integrate'=>50,
			'user_create_time' =>date('Y-m-d H:i:s',time()),
			'user_last_login_time' =>date('Y-m-d H:i:s',time()),
			'user_icon'   => input('user_icon'),


		];

		$result = $this->usermode->addUser($data);
		if($result>0)
		{
			$this->success('添加成功', 'userlist');
		}else{
			$this->error('添加失败...', 'addUser');
		}


	}

	//编辑用户信息
	public function editUser()
	{
		
		$user_id = $_GET['user_id'];

		$usM = Db('online_user');
		$usM_info= $usM->where("user_id=$user_id")->find();
	
		$this->assign('usM_info', $usM_info);
		return $this->fetch();
	}

	//处理用户编辑信息
	public function updateUser()
	{
		$user_id = $_REQUEST['user_id'];

		//接受提交过来的用户信息
		$data = [
			'user_name'     =>input('user_name'),
			'user_pwd'      =>md5(input('user_pwd')),
			'user_email'    =>input('user_email'),
			'user_tel'      =>input('user_tel'),
			'user_icon'   => input('user_icon'),

		];



		$result = $this->usermode->editUser($user_id,$data);
		if($result ==false)
		{
			$this->error('编辑失败...', 'editUser');
		}else{
			$this->success('编辑成功','userlist');
		}

	}

	//删除用户信息
	public function delUser()
	{
		$user_id = $_GET['user_id'];

		//实例化对象
		$usM = Db('online_user');
		$check = $usM ->where("user_id = {$user_id}")->find();

		if($check == false)
		{
			$this->error('非法操作', 'userlist');
		}
		$result = $usM ->where("user_id = {$user_id}")->delete();


		if($result == true)
		{
			$this->success('删除成功', 'userlist');
		}
	}
	
	//搜索用户列表信息
	public function searchUser()
	{
		//接受数据
		
			$data['searchUser'] = input('searchUser');
			$data['dosubmit'] =	input('dosubmit');

		
		$usM = Db('online_user');
		$usM_lists = $usM
					->where('user_name','like','%'.$data['searchUser'].'%')
					->select();
				$this->assign('usM_lists',$usM_lists);
				return 	$this->fetch();
	}



     
      

	
}