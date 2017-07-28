<?php
namespace app\index\controller;
use think\captcha;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Storejoin as storejoinModel;
use app\admin\model\Links_url;

class  Storejoin  extends Controller{


	//初始化对象
	 public function _initialize()
    {
      $this->storejoinmodel = new storejoinModel();
      $this->Links_url = new Links_url();
        $link = $this->Links_url->selink();
        $this->assign('link',$link);

    } 
	//商家入住
	public function addStore()
	{
		
		return $this->fetch();
	}
	
	//处理商家入住信息
	public function addStoreDetail()
	{
		$data = input();
	
	
		if(!captcha_check($data['img']))
		{
			$this->error('验证码错误','addStore');
		}
		
		$arr = [
			'store_name'	=>input('store_name'),
			'store_pwd'		=>md5(input('store_pwd')),
			'store_tel'		=>input('store_tel'),
			'create_time'	=>date('Y-m-d H:i:s',time()),
		];
		
		$result	=$this->storejoinmodel->addStorejoin($arr);
		if($result == true)
		{
			$this->success('商家注册成功','/index/user/login');
		}else{
			$this->error('商家入注册失败','addStore');
		}
		
		

		
	}
}