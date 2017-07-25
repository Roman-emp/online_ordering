<?php
namespace app\admin\model;
use think\DB;
use think\Model;
class Node extends Model
{

	//查询根节点
    public function selenodes()
   {
     $re = Db::name('node')->where('level != 3')->order('sort')->select();
     return $re;
   }
   //查询权限表
    public function senodes()
   {
     $re = Db::name('node')->order('sort')->select();
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
}
