<?php
namespace app\admin\model;
use think\DB;
use think\Model;
class Access extends Model
{
	public function seleaccess($rid,$data)
	{

	    foreach ($data as  $value) 
	    {
	      	$count = Db::name('access')->where('role_id='.$rid.' and node_id='.$value['id'])->count();

	      	if($count)
	      	{
	      		$value['access']=1;
	      		
	      	}
	      	else
	      	{
	      		$value['access']=0;
	      	}
	        
	         $accessarr[]=$value;
	     
       }
         return $accessarr;
	}
    //查询access表根据角色id删除改角色的所有权限
   public function seleroles($id)
   {
     $re = Db::name('access')->where('role_id',$id)->delete();
     return $re;
   }
   //添加数据
   public function addaccess($data)
   {
   	  return  Db::name('access')->insertAll($data);
   }




}

