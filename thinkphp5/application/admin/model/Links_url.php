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
	//友链查询
	public function selink()
	{
		return Db::name('links_url')->select();
	}
	//是否显示
	public function uplinks($id)
	{
      return Db::table('links_url')
						->where('id', $id)
						->update(['display' => 0 ]);

	}
	public function uptolinks($id)
	{
      return Db::table('links_url')
						->where('id', $id)
						->update(['display' => 1 ]);

	}

}