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
		$shop = $shop_info[0];
	
		$this->assign('shop_info',$shop_info);
		$this->assign('shop_detail',$shop_detail);
		$this->assign('shop',$shop);
		return $this->fetch();
	}
}