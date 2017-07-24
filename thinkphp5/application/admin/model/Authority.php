<?php
namespace app\admin\model;
use think\DB;
use think\Model;


class Authority extends Model
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


}