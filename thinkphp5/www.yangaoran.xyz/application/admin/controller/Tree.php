<?php
namespace app\admin\controller;
use think\Controller;


class Tree extends Controller
{
  static public $treeList = array();//存放无限极分类

  public function create($data,$pid=0)
  {
  	foreach ($data as $key => $value) {
  		if($value['pid'] == $pid)
  		{
  			self::$treeList[]=$value;
  			unset($data[$key]);
  			self::create($data,$value['id']);
  		}
  	}

  	return self::$treeList;
  }




}
