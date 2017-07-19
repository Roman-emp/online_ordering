<?php

	namespace app\index\controller;

	use think\Controller;
	use app\index\model\Online_order;

	class Order extends Controller
	{
		public function orderlist()
		{
			return $this->fetch();
		}
	}