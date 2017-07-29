<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Links_url;
class  Article extends Controller
{
	
	public function _initialize()
	{
     $this->Links_url = new Links_url();
      $link = $this->Links_url->selink();
      $this->assign('link',$link);
    }
	public function articleRead()
	{
		return $this->fetch();
	}
}