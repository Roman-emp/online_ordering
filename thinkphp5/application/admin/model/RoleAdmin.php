<?php
namespace app\admin\model;
use think\DB;
use think\Model;

class RoleAdmin extends Model
{

	//添加用户角色
   public function adminrole($data)
   {
     $re = Db::name('role_admin')->insert($data);
     return $re;
   }
    //关联查询
   public function role_admin($re)
   {
     foreach ($re as $key => $value) {
     	$arr[] = $value['id'];
     }
    
     foreach ($arr as $key => $value) {
     	//dump($value);
     	$res[] = Db::name('role_admin')->field('role_id')->where("user_id = $value")->find();
     	
     }
     foreach ($res as $key => $value) {
     	$ress[] = Db::name('role')->field('name')->where('id', '=', $value['role_id'])->find();
     
     } 
     return $ress;
      
   }
  
}