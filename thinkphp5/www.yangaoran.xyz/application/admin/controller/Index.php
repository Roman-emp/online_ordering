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

		$re = $this->Links_url->selink();
		//var_dump($re);
		$this->assign('re',$re);
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

	public function uplink()
	{

		$id = input('id');
		$display = input('display');
		if($display == '1')
		{
			$re = $this->Links_url->uplinks($id);
		}else{
			$re = $this->Links_url->uptolinks($id);
		}
		  if($re)
				{
					$this->success('修改成功');

				}else{
					$this->error('修改失败');
				}  
	    
	}
}