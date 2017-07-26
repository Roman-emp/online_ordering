<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Model;
use think\Request;
use think\Session;
use app\admin\controller\Tree;//无限极分类
use app\admin\model\Role;//角色表
use app\admin\model\Node;//权限表
use app\admin\model\Online_admin;//用户表
use app\admin\model\RoleAdmin;//用户角色表
use app\admin\model\Access;//用户角色表
class Base extends Controller
{
	public function _initialize()
	{
		
          $this->Role = new Role();
	      $this->Node = new Node();
	      $this->Tree = new Tree();
	      $this->Admin = new Online_admin();
	      $this->Role_Admin = new RoleAdmin();
	      $this->Access = new Access();


		if (!session('?id')) {
			$this->error("请登录先",'admin/user/login');
		}else{
           
           dump(Session::get('id'));
            $list_admin_id = Session::get('id');
            //根据用户id查找角色返回角色id
             $list_role_id = $this->Role->list_user($list_admin_id);
             //根据角色id查找权限
             dump($list_role_id);
             $list_node_id = $this->Node->list_node($list_role_id['role_id']);
             dump($list_node_id);
           die;
			 




		}
	}
}