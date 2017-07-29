<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Online_shop;
use app\admin\model\Links_url;

class  Store extends Controller
{
	protected $shop;

	public function _initialize()
	{
		$this->shop = new Online_shop();
		$this->Links_url = new Links_url();
        $link = $this->Links_url->selink();
        $this->assign('link',$link);
	}
	//商家详情信息
	public function storedetail()
	{

		$shop_id = input('shop_id');

		$menu_id = $_GET['menu_id'];
			//获取商铺详情
		$shop_info = $this->shop->select_shop_detail($shop_id);

		$shop_detail = $shop_info;
		$shop = $shop_info[0];//获取商店信息
		
		$list = $this->shop->menu_limit($shop_id);	
		$page = $list->render();		
	
		$this->assign('list',$list);
		$this->assign('page',$page);
		$this->assign('shop_info',$shop_info);
		$this->assign('shop_detail',$shop_detail);
		$this->assign('shop',$shop);
		$this->assign('shop_id',$shop_id);
		$this->assign('menu_id',$menu_id);
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
			$this->error('收藏失败','storedetail');
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
	
	
	
	//添加用户留言
	public function addUserFavor()
	{
		 $shop_id = input('shop_id');
		 $menu_id = input('menu_id');
		// $user_id = session('user_id');
		// $message_name = input('message_name');
		// $reply_content = input('reply_content');
		
		$data = [
			'shop_id'	=>$shop_id ,
			'menu_id'	=>$menu_id,
			'user_id'	=>session('user_id'),
			'message_name'=>input('message_name'),
			'reply_content'=>input('reply_content')
		];
		
		$result = Db('user_comments')
				->insert($data);
				if($result == true)
				{
					$this->success('成功');
					$this->redirect('/index/store/storeDetail?shop_id={$shop_id}');
				}else{
					$this->error('失败');
				}
	}
	
	
	
	
	
	
	
}