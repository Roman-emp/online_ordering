<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Online_shop;

class  Store extends Controller
{
	protected $shop;

	public function _initialize()
	{
		$this->shop = new Online_shop();
	}
	//商家详情信息
	public function storeDetail()
	{
		$shop_id = $_GET['shop_id'];
			//获取商铺详情
		$shop_info = $this->shop->select_shop_detail($shop_id);

		$shop_detail = $shop_info;
		$shop = $shop_info[0];//获取商店信息
	
		$this->assign('shop_info',$shop_info);
		$this->assign('shop_detail',$shop_detail);
		$this->assign('shop',$shop);
		$this->assign('shop_id',$shop_id);
		return $this->fetch();
	}
	
	
	//用户收藏店铺
	public function UserFavorShop()
	{
		//接受商家shop_id
		$shop_id = $_GET['shop_id'];
		
		$result = $this->shop->UserFavorShop($shop_id);
		if($result == true)
		{
			$this->success('收藏成功','/index/userfavorites/user_favorites');
		}else{
			$this->error('收藏失败','storeDetail');
		}
	}
	
	
	//用户取消店铺收藏
	public function delFavor()
	{
		$shop_id = $_GET['shop_id'];
		$result = $this->shop->delFavorModel($shop_id);
		if($result == true)
		{
			$this->success('取消成功','/index/userfavorites/user_favorites');
		}else{
			$this->success('取消失败','/index/userfavorites/user_favorites');
		}
	}
	
	
	
	
	
	
}