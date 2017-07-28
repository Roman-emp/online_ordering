<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Userfavorites as UserfavorMod;


class Userfavorites extends Controller
{
	protected $Userfavorites;
	public function _initialize()
	{
		$this->Userfavorites = new UserfavorMod();
	}
	//我的用户收藏
	public function user_favorites()
	{
		$data = $this->Userfavorites
					->user_favorites();
		$this->assign('data',$data);
		return $this->fetch();
	}
	
	//删除我的收藏
	public function delUserFavor()
	{

		
		$res = $this->Userfavorites->delUserFavor(input());
		if($res == true)
		{
			$this->success('删除成功','userfavorites');
		}
	}
	

}


