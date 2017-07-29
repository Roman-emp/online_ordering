<?php
namespace app\admin\model;
use think\DB;
use think\Model;
use app\admin\model\Role;
use app\admin\model\Role_admin;

class OnlineAdmin extends Model
{

		 //添加用户
		   public function addusers($data)
		   {
		    return Db::name('online_admin')->insertGetId($data);
		   }
		   //查询用户
		   public function seleadmin()
		   {
		     $re = Db::name('online_admin')->relation(true)->select();
		     return $re;
		   }
		  
		  
		  /* public function role()
		   {
		   	 return $this->belongsToMany('role','role_admin','id','user_id');
		   }
		   //关联rolles
		   public function roles()
		   {
			// 用户 BELONGS_TO_MANY 角色
			return $this->belongsToMany('Role', 'role_admin','','user_id');
		   }
		   */
}