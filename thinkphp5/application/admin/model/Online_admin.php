<?php
namespace app\admin\model;
use think\DB;
use think\Model;
use app\admin\model\Role;
use app\admin\model\Role_admin;
class Online_admin extends Model
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
		  
		   public function role()
		   {
		   	 return $this->belongsToMany('role','role_admin','','user_id');
		   }
		  /*
		   //关联rolles
		   public function roles()
		   {
			// 用户 BELONGS_TO_MANY 角色
			return $this->belongsToMany('Role', 'role_admin','','user_id');
		   }
		   */

        public function head_name($id)
		   {
		         return   Db('online_admin')->where('id',$id)
						->alias('oa')
						->join('role_admin ra',"oa.id = ra.user_id")
						->field('ra.role_id,oa.name')
						->find();
		   }
        
           public function head_role($id)
		   {
		         return   Db('role_admin ')->where('role_id',$id)
						->alias('ra')
						->join('role r',"r.id = ra.role_id")
						->field('r.name')
						->find();
		   }

}