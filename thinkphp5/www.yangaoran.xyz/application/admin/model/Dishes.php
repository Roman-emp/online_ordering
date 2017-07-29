<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Dishes extends Model
{
	//查询所有菜品
	public function select_menu()
	{
		return Db::name('menu_list')->field('menu_id,menu_name')->select();
	}
	//根据菜品id,查询对应菜品名字
	public function select_menu_name($menu_id)
	{
		return Db::name('menu_list')->field('menu_name')->where('menu_id',$menu_id)->find();
	}
	//获取商品列表
	public function getalldisheslist($shop_id)
	{
		//实例化对象
		return Db('shop_menu')->where('shop_id',$shop_id)->select();
	}

	//添加商品
	public function add_goods($data)
	{
		//实例化对象
		return Db('shop_menu')->insert($data);
	}

	//编辑商品方法
	public function updateModel($id, $data)
	{
		//实例化对象		
		return Db('shop_menu')
				->where("menu_id = $id")
				->update($data);
	}
	//删除商品
	public function delete_menu($data)
	{			
		return Db::name('shop_menu')
				->where('shop_id',$data['shop_id'])
				->where('menu_id',$data['menu_id'])
				->delete();
	}	
}