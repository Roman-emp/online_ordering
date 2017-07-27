<?php
namespace app\admin\model;
use think\DB;
use think\Model;
class Node extends Model
{

	//查询根节点
    public function selenodes()
   {
     $re = Db::name('node')->where('level != 3')->select();
     return $re;
   }
   //查询根节点
    public function role_node()
   {
     $re = Db::name('node')->select();
     return $re;
   }
   //查询权限表
    public function senodes()
   {
     $re = Db::name('node')->select();
     return $re;
   }
    //添加
   public function addnodes($data)
   {
     $re = Db::name('node')->insert($data);
     return $re;
   }
   //删除权限表
    public function delenodes($id)
   {
     $re = Db::table('node')->where('id',$id)->delete();//返回受影响行数
     return $re;
   }
   //查询角色的权限
   public function list_node($id)
   {
      return   Db::name('role')->where('id',$id)
                          ->alias('r') //命名别名
                          ->join('access a','a.role_id = r.id')
                          ->field('node_id')
                          //->buildSql();
                          ->select();  

   }
   //根据node_id查询出来对应的权限和路径
   public function list_node_name($id)
   {
      $re = Db::name('node')->field('title,url,id,pid,level')->where('id',$id)->where('level',2)->find();

     return $re;
   }
   public function list_node_name_child($id)
   {
      $re = Db::name('node')->field('title,url,id,pid,level')->where('id',$id)->where('level',3)->find();

     return $re;
   }

}
