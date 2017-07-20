<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Article as ArticleModel;

class Article extends Base
{
	//支付方式
	public function payWay()
	{
		//实例化对象模型
		$wpModel = new ArticleModel();
		$data = $wpModel->payWayMod();
		
		$this->assign('data',$data);
		return $this->fetch('payWay');
	}

	//配送方式
	public function sendWay()
	{
		//实例化对象模型
		$swModel = new ArticleModel();
		$data = $swModel->sendWayMod();
		$this->assign('data', $data);
		return $this->fetch();
	}

	//服务费用
	public  function  serverFee()
	{

		return $this->fetch();
	}

	//配送效率
	public function sendEffic()
	{
		return $this->fetch();
	}

	//网站介绍
	public function website()
	{
		return $this->fetch();
	}

	//公司公告
	public function information()
	{
		return $this->fetch();
	}

	//商家加盟
	public function storeBus()
	{
		return $this->fetch();
	}

	//服务内容
	public function serverCon()
	{
		return $this->fetch();
	}

	//常见问题
	public function question()
	{
		return $this->fetch();
	}


}