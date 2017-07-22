<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User as UserModel;

class User extends Controller
{

	public function login()
	{
		return $this->fetch();
	}

	//获取管理员列表
	public  function  adminlist()
	{
		//实例化对象模型
		$adModel = new UserModel();
		$res = $adModel->adminlist();
		
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

		//实例化对象模型
		$adModel = new UserModel();
		$result = $adModel->add($data);
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
		

		//实例化对象模型
		$adModel = new UserModel();
		$result = $adModel->updateModel($id, $data);

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

			if($check['role'] == 1)
			{
				$this->error('没有权限...','adminlist');
			}

			$back = $adM->where("id = {$id} and role = 0")->delete();
			if($back == true)
			{
				$this->success('删除成功','adminlist');
			}
	}

	//获取用户列表信息
	public function userlist()
	{
		//实例化模型
		$usModel = new UserModel();
		$usM_list = $usModel->getUserList();
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
			'user_pwd'      =>input('user_pwd'),
			'user_email'    =>input('email'),
			'user_tel'      =>input('user_tel'),
			'user_integrate'=>50,
			'user_create_time' =>date('Y-m-d H:i:s',time()),
			'user_last_login_time' =>date('Y-m-d H:i:s',time()),
			'user_icon'   => input('user_icon'),


		];

		//实例化模型
		$usModel = new UserModel();

		$result = $usModel->addUser($data);
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
		$id = input('user_id');
		
		$usM = Db('online_user');
		$usM_info= $usM->where("use_id=$id")->find();
	
		$this->assign('usM_info', $usM_info);
		return $this->fetch();
	}
	
}