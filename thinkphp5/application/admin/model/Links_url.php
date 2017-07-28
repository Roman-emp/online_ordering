<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Links_url extends Model
{

	 //插入友情链接
	public function dolink($data)
	{
		return Db::name('links_url')->insert($data);
	}

}