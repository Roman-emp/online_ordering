<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Index extends Base
{
	public function index()
	{
		
		return $this->fetch();
	}
	//友情链接
	public function links_url()
	{
		
		return $this->fetch();
	}
	//友情链接
	public function dolinks()
	{
		
		$data = input();
		$re = $this->Links_url->dolink($data);
		       if($re)
				{
					$this->success('添加成功');

				}else{
					$this->error('添加失败');
				}
	}
}