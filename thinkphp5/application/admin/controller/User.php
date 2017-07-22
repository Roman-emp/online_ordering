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
		$result = $adModel->updateModel($data);
	}
	
}