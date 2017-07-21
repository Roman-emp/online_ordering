<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
use think\captcha;
use think\Session;

class User extends Controller
{
	protected $usermode;
    public function _initialize()
    {
      $this->usermode = new UserModel();

    }
	//用户注册
	public function register()
	{
		return $this->fetch();
	}
	 //注册内容的处理
    public function upregister()
    {
    	 $data = $_POST;
        if(!captcha_check($data['img'])){
               $this->error('验证码错误');
            };
         
           
            $name = $_POST['name'];
            $pwd  = $_POST['pwd'];
            $pwd  = md5($pwd);
            $email = $_POST['email'];
            $tell  = $_POST['tell'];
            $time  = date('Y-m-d H:i:s',time());

            $data = [
                      'user_name'   => $name,
                      'user_pwd'    => $pwd,
                      'user_email'  => $email,
                      'user_tel'    => $tell,
                      'user_create_time'  => $time

            ];
          $re = $this->usermode->doReg($data);
          if($re)
          {
             $this->success('注册成功');
          }else{
            $this->error('注册失败');
          }

    }
    //判断注册用户名是否存在
    public function upName()
    {
       $data = $this->usermode->checkUser($_POST['name']);
    		
    	return json_encode($data);
    }
   



	//用户登录
		public function login()
		{
			return $this->fetch();
		}
         //判断登录
	    public function dologin()
	    {
	     //var_dump(session('user_id'));
	       $data = $_POST;
	        if(!captcha_check($data['yzm'])){
	               $this->error('验证码错误');
	            };
	          $name = $_POST['name'];
	          $pwd  = $_POST['pwd'];
	          $pwd  = md5($pwd);
	          $re = $this->usermode->doLogin($name,$pwd);
	          $id = $re['user_id'];
	          if($re)
	          {
	            session('user_id', $id);
	             $this->success('登录成功',"index/index/index");
	             
	          }else{
	            $this->error('用户名或密码错误');
	          }
	    }
	//用户中心
		public function usercenter()
		{
			return $this->fetch();
		}

		//我的收藏
		public function userfavorites()
		{
				return  $this->fetch();
		}


		//用户账户管理
		public function userAccount()
		{
			return  $this->fetch();
		}

		//用户退出登录
		public function userExit()
		{
			return  $this->fetch();
		}
}

