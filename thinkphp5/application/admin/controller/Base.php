<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Model;
use think\Request;
use think\Session;
use app\admin\controller\Tree;//二级数组无限极分类
use app\admin\controller\threeTree;//三级数组无限极分类
use app\admin\model\Role;//角色表
use app\admin\model\Node;//权限表
use app\admin\model\Online_admin;//用户表
use app\admin\model\RoleAdmin;//用户角色表
use app\admin\model\Access;//用户角色表
use app\admin\model\User as UserModel;
use app\admin\model\Dishes as DishesModel;
use app\admin\model\Online_order;
use app\admin\model\Links_url;

 
class Base extends Controller
{
	public function _initialize()
	{     
        $this->Links_url = new Links_url();
        $this->order = new Online_order();
        $this->menu = new DishesModel();
        $this->goods = new DishesModel();
        $this->usermode = new UserModel();
        $this->Role = new Role();
	      $this->Node = new Node();
        $this->Tree = new Tree();
	      $this->threeTree = new threeTree();
	      $this->Admin = new Online_admin();
	      $this->Role_Admin = new RoleAdmin();
	      $this->Access = new Access();


		if (!session('?id')) {
			$this->error("请登录先",'admin/login/login');
		}else{
           
           //dump(Session::get('id'));
            $list_admin_id = Session::get('id');
            //根据用户id查找角色返回角色id
             $list_role_id = $this->Role->list_user($list_admin_id);
             //根据角色id查找权限
             $list_node_id = $this->Node->list_node($list_role_id['role_id']);
             $list_node_id = array_column($list_node_id,'node_id');
             //$list_node_id = implode(',',$list_node_id );
                foreach ($list_node_id as $key => $value) {
                 if( $this->Node->list_node_name($value))
                  {
                    $list_node_url[] = $this->Node->list_node_name($value);
                  }
                }
                  //dump($list_node_url);
                 // dump($list_node_id);

                $list_node_url_child = array();
                  foreach($list_node_id as $v)
                  {        
                           //dump($v);
                         // $list_node_url_child = $this->Node->list_node_name_child($v);
                          if( $this->Node->list_node_name_child($v) != null ){
                            $list_node_url_child[] = $this->Node->list_node_name_child($v);
                          }
                  }
                 
                if($list_node_url_child){
                  $this->assign('list_node_url',$list_node_url);
                  $this->assign('list_node_url_child',$list_node_url_child);
                }else{
                  $this->error("您没有任何权限",'admin/login/login');
                }
                 //dump($list_node_url_child);            
                 //dump($list_node_url);

		}
     if(session('id'))
     {
        $head_name = $this->Admin->head_name(session('id'));
        $head_role = $this->Admin->head_role($head_name['role_id']);
        $this->assign('head_name',$head_name);
        $this->assign('head_role',$head_role);
     }

    

	}

}