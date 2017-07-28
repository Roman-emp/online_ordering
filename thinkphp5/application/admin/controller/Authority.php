<?php
namespace app\admin\controller;
use app\admin\controller\Base;//判断是否登录


//权限管理
class Authority extends Base
{


	
     //角色管理
	public function admin_role()
	{
		$res= $this->Role->seleroles();
		    $le = count($res);
		    $this->assign('le',$le);
		$this->assign('res',$res);
	
		return $this->fetch();
	}
	//管理员角色添加
	public function admin_role_add()
	{
		$data = input();
		
		$re = $this->Role->roleadd($data['id']);//根据id查找出角色

		$role_node = $this->Node->role_node();//查找出所有的权限节点
		$role_node = $this->Tree->create($role_node);//用无限极分类进行排序
       // dump($role_node);
		$access = $this->Access->seleaccess($data['id'],$role_node);
		//dump($access);
		$this->assign('access',$access);
		$this->assign('re',$re);
		return $this->fetch();
	}
	//权限管理
	public function admin_permission()
	{

		$re = $this->Node->senodes();
		$re = $this->Tree->create($re);
		$le = count($re);
		$this->assign('le',$le);
		$this->assign('re',$re);
		
		return $this->fetch();
	}
    //删除权限节点
    public function delenode()
    {
    	$data = input();
    	$re = $this->Node->delenodes($data['id']);
    	if($re)
			{
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
    }
	//添加角色
	public function addrole()
	{
		return $this->fetch();
	}
   //处理添加角色数据

	public function doaddrole()
		{
			$data = input();
			$re = $this->Role->addroles($data);
			if($re)
			{
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
       //添加权限
		public function add_node()
		{
			$re = $this->Node->selenodes();
			$this->assign('re',$re);
			return $this->fetch();
		}
		//处理添加权限信息
		public function doadd_node()
		{
			
			$data = input();
			$re = $this->Node->addnodes($data);
			if($re)
			{
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}

        //添加用户
        public function adduser()
        {
        	$re = $this->Role->seleroles();
        	$this->assign('re',$re);
        	return $this->fetch();
        }
        //处理添加用户数据
        public function doadduser()
        { //需要用户表和用户角色表
        	
        	$data['name'] = input('name');
        	$data['password'] = md5(input('password'));
        	$data['create_time'] = date('Y-m-d H:i:s' ,time());
        	$data['status'] = 1;
            $Uid = $this->Admin->addusers($data);
        	if($Uid)
			{ 
				//用户添加成功后添加用户角色表
				$role['role_id'] = input('role_id');
				$role['user_id'] = $Uid;	
				$this->Role_Admin->adminrole($role);
				$this->success('添加成功');

			}else{
				$this->error('添加失败');
			}
        }
        //用户管理
        public function admin_user()
        {

			//  $user = Role::get([1,2,3]);
			//  $arr = $user->OnlineAdmin;
			// $arr = json_decode( json_encode( $arr ), true );
	  //          dump($arr);

        	$re = $this->Admin->seleadmin();
            $res = $this->Role_Admin->role_admin($re);
            foreach ($res as $key => $value) {
            	$arr[] =array_values($value); 

            } 
            $len = count($arr);
            for($i=0;$i<$len;$i++)
            {
            	

            	$arrs[] = ['role'=>$arr[$i][0]];

            }
            $reus = array();
            foreach ($arrs as $k=>$v) {
            	$reus[]=array_merge($v,$re[$k]);
            }
            // $res = array_values($res); dump($res);
            $le = count($reus);
		    $this->assign('le',$le);
        	$this->assign('reus',$reus);
        	return $this->fetch();
        }
		
		//添加角色权限
		public function addrolenode()
		{
			
			$data = input();
			$acce = $this->Access->seleroles($data['rid']);
			if(isset($data['access'])){
				//dump($data['access']);
				$array = array();
				foreach ($data['access'] as $v) {
					$tmp=explode('_',$v);
					
					$array[] = array(
                          'role_id' => $data['rid'],
                          'node_id' => $tmp[0],
                          'level'   => $tmp[1]
						);
				}
				//dump($array);
				$add = $this->Access->addaccess($array);
				dump($add);
				if($add)
				{
                  	 $this->success('修改成功');
					}else
					{
						$this->error('修改失败');
					}

				}
			else
			{
				$this->error('修改失败');
			}
		}  
   







      



}