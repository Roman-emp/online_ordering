<?php
    namespace app\index\controller;

    use think\Controller;
    use think\Db;
    use think\Request;
    use extend\Connect2;
    use app\index\model\Menu_list; 

    class Index extends Controller
    {
        
        protected $menu;
        public function _initialize()
        {
            $this->menu = new Menu_list();
        }

        public function index()
        {   
            $data = $this->menu->select_menu();
            var_dump($data);
            $this->assign('data',$data);
            return $this->fetch();
        }
    }
