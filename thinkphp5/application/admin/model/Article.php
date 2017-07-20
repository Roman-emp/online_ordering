<?php
namespace app\admin\model;
use think\Model;

class Article extends Model
{
	//支付方式接口模型
	public function payWayMod()
	{
		//实例化对象
		$wpM = Db('pay_way');
		$result = $wpM->select();

		return $result;
	}

	//配送方式接口模型
	public function sendWayMod()
	{
		$swM = Db('send_way');
		$result = $swM->select();

		return $result;
	}
}