<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha;
use think\Session;
use app\admin\model\User as UserModel;

//登录信息处理
class Login extends Controller
{

	 public function _initialize()
   {

      $this->usermode = new UserModel();

    }


    public function login()
	{
		return $this->fetch();
	}
	 public function dologin()
	    {
	     // var_dump(session('id'));
	       $data = input();
	        if(!captcha_check($data['yzm'])){
	               $this->error('验证码错误');
	            };
	          $name = input('name');
	          $pwd  = input('pwd');
	          $pwd  = md5($pwd);
	          $re = $this->usermode->dologin($name,$pwd);
	   
	          $id = $re['id'];
	          if($re)
	          {
	              session('id', $id);
	             $this->success('登录成功',"admin/index/index");
	             
	          }else{
	            $this->error('用户名或密码错误');
	          }
	    }
	}