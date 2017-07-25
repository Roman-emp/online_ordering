<?php
namespace app\admin\model;
use think\DB;
use think\Model;
use app\admin\model\Online_admin;
use app\admin\model\Role_admin;

class Role extends Model
{
   //添加角色
   public function addroles($data)
   {
     $re = Db::name('role')->insert($data);
     return $re;
   }
   //查询角色
   public function seleroles()
   {
     $re = Db::name('role')->select();
     return $re;
   }
   // //关联
   // public function OnlineAdmin()
   //  {
   //    // 角色 BELONGS_TO_MANY 用户
   //     return $this->belongsToMany('OnlineAdmin', 'role_admin','user_id','role_id');
   //  }
  
    //关联查询
   public function role_admin($re)
   {
    
   }





}
