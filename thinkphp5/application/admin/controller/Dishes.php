<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Dishes as DishesModel;

class Dishes extends Base
{
	protected $goods;
	public function _initialize()
	{
		$this->goods = new DishesModel();
	}
	//获取所有商品列表
	public function getAllDishesList()
	{
		//展示登录商家对应的菜品表
			$shop_id = 1;//测试商家id
		//实例化模型
		$res = $this->goods->getAllDishesList($shop_id);
	
		$this->assign('res', $res);
		return $this->fetch();
	}
	//添加商品页面,进行商品信息的添加
	 public function add() 
	{
        $menu_list = $this->goods->select_menu();
        $this->assign('menu_list',$menu_list);
        return $this->fetch();
    }

	//商品添加提交页面
	public function addDishes()
	{

		//商铺id测试暂用shop_id = 1;
		$shop_id = 1;
		$menu_id = input('menu_id');
		
		$menu_name = $this->goods->select_menu_name($menu_id);
	
		//接受提交过来的数据
		if (input('menu_type'))
		{

			$file = request()->file('file');
			// 把上传图片，移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			
			if($info)
			{
				$menu_icon = $info->getSaveName();//生成带日期的文件夹路径
			}

			else
			{
				echo $file->getError();
			}
		
			$data = [
					'shop_id'	=> $shop_id,
					'menu_id'	=> $menu_id,
					'menu_name' => $menu_name['menu_name'],
					'menu_type' => input('menu_type'),
					'menu_info' => input('menu_info'),
					'menu_price'=> input('menu_price'),
					'menu_icon' => $menu_icon,
					'create_time'=> date('Y-m-d H:i:s',time()),
			];
		
			//添加商家所填信息
			$res = $this->goods->add_goods($data);

			if($res>0)
			{
				$this->success('添加成功', 'getAllDishesList');
			}else{

				$this->error('添加失败......', 'add');
			}
		}
		else
		{
			$this->error('请选择菜品类型');
		}
	}

	//赋给编辑页面
	public function edit()
	{
		//接受传过来的商品id

		$id = input('id');

		$mlM = Db('menu_list');
		//mlM_info
		$mlM_info = $mlM->where("menu_id = $id")->find();
		
		$this->assign('mlM_info', $mlM_info);
		return $this->fetch('edit');
	}

	//编辑商品
	public function update()
	{
		if (input('menu_type'))
		{	
			//接受提交过来的商品id
			$id = input('id');

			$file = request()->file('file');
			// 把上传图片，移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			if($info)
			{
				$menu_icon = $info->getSaveName();//生成带日期的文件夹路径
			}
			else
			{
				echo $file->getError();
			}

			//接受提交过来的数据
			$data = [
					'menu_name' => input('menu_name'),
					'menu_type' => input('menu_type'),
					'menu_info' => input('menu_info'),
					'menu_price'=> input('menu_price'),
					'menu_icon' => $menu_icon,
					'create_time'=> date('Y-m-d H:i:s',time()),
			];

			//实例化模型
			
	        $res = $this->goods->updateModel($id,$data); 
			
			if($res === false)
			{
					$this->error('编辑失败...','edit');
			}else{
				$this->success('编辑成功','getAllDishesList');
			}
		}
		else
		{
			$this->error('请选择菜品类型');
		}
	}

	//商家的商品分类
	public function product_category()
	{
		//测试商家，shop_id = 1
		$shop_id = 1;
		
		return $this->fetch();
	}

	//删除商品
	public function delete()
	{
		$id = input('id');
		
		$mlM = Db('menu_list');
		$check = $mlM->where("menu_id={$id}")->find();
	
		if($check == false)
		{
			$this->error('非法操作','getAllDishesList');
		}

		$back = $mlM->where("menu_id = {$id}")->delete();
		if($back == true)
		{
			$this->success('删除成功','getAllDishesList');
		}

	}


}