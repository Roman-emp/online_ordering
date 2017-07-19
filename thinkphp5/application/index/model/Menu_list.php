<?php

	namespace app\index\model;
	use think\Db;
	use think\Model;

	class Menu_list extends Model
	{
		
		public function select_menu()
		{
			$menu = $this->where('menu_id=1')->buildSql();
			return $menu;
		}
	}