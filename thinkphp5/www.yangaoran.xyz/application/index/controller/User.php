<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
use think\captcha;
use think\Session;
use app\admin\model\Links_url;

class User extends Controller
{
	protected $usermode;
    public function _initialize()
    {
      $this->usermode = new UserModel();
      $this->Links_url = new Links_url();
      $link = $this->Links_url->selink();
      $this->assign('link',$link);

    }
//用户注册
		public function register()
		{
			return $this->fetch();
		}
//注册内容的处理
	    public function upregister()
	    {

             $data = input();
	    	if(!captcha_check($data['img'])){
	               $this->error('验证码错误');
	            };
	           $res = $this->validate($data,'User');
	         
	      
	          if($res == true )
	          {
	          
	            $name = input('name');
	            $pwd  = input('pwd');
	            $pwd  = md5($pwd);
	            $email = input('email');
	            $tell  = input('tell');
	           
	            $time  = date('Y-m-d H:i:s',time());
 				$tellcode = input('tellcode');
	            if($tellcode == '1234')
                 {
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

				      }else{
				      
				  	  $this->error('短信验证错误');
				  
				     }
				 }else{
				      	$this->error($res);
				      }
				  

	    }
//判断注册用户名是否存在
	    public function upName()
	    {
	       $data = $this->usermode->checkUser(input('name'));
	    		
	    	return json_encode($data);
	    }
	     public function jsession()
	     {
	     	$jse = session('user_id');
	     	return json_encode($jse);
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
	       $data = input();
	        if(!captcha_check($data['yzm'])){
	               $this->error('验证码错误');
	            };
	          $name = input('name');
	          $pwd  = input('pwd');
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
	
//用户中心首页
		public function user_center()
		{
		    $data = $this->usermode->inquire();
		    $this->assign('data',$data);
           return $this->fetch();
		}
//用户账户管理
		public function user_account()
		{
            $data = $this->usermode->inquire();
		    $this->assign('data',$data);
			return  $this->fetch();
		}
//用户账户管理修改（用户修改完善自己的信息）
        public function upload()
        {
	        	$name = $_POST['name'];
	        	$email = $_POST['email'];
	        	$tell  = $_POST['tell'];
                $file = request()->file('file');
	        	if($file){
	        	//获取表单上传文件 例如上传了001.jpg
				//移动到框架应用根目录/public/uploads/ 目录下
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
				if($info){
				//成功上传后 获取上传信息
				//输出 jpg
				//echo $info->getExtension();
				//输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
				     $img = $info->getSaveName();
				}
				$data = [
	                      'user_name'   => $name,
	                      'user_icon'    => $img,
	                      'user_email'  => $email,
	                      'user_tel'    => $tell,
                       

        	    		];
			   }else{
				// 上传失败获取错误信息
				$data = [
	                      'user_name'   => $name,
	                      'user_email'  => $email,
	                      'user_tel'    => $tell,
        	             ];
				}

        	
        	$re = $this->usermode->modify($data);
              if($re)
	          {
	            
	             $this->success('修改成功',"index/user/user_account");
	             
	          }else{
	            $this->error('修改失败');
	          }
        }
//用户退出
        public function drop()
        {

        	session('user_id', null);
        	$this->success('退出成功',"index/index/index");

        }
         

//我的收藏
		public function userfavorites()
		{
				return  $this->fetch();
		}


	

		//用户退出登录
		public function userExit()
		{
			return  $this->fetch();
		}


		//用户短信验证
		public function tellcode()
		{


			$SoftVersion = "2014-06-30";
			$Account = "Accounts";
			//帐户id
			$accountSid = "4ac4b0e80c097aefae80ec9c4342acec";
			$function = "Messages";
			$operation = "templateSMS";
			$token = 'ce75d626605fc88148af69eb0c3c1741';
			$time = date('YmdHis');
			$SigParameter = strtoupper(md5($accountSid.$token.$time));
			$Authorization = base64_encode($accountSid.":".$time);
			//编写header头

			
			$header = [
				"Accept:application/json",
				'Content-Type:application/json;charset=utf-8',
				'Authorization:'.$Authorization,
			];
			//数组转json
			$data = [
			'templateSMS'=>[
				'appId'=>'b865ea18e7734f97a5a0564eb3bc3383',
				// 这个是短信模板参数
				'param'=>'1234',//这个是验证码随机
				'templateId'=>'104148',
				'to'=>input('to'),//这个是手机号
				]
			];

			//echo json_encode(input('to'));
			$body = json_encode($data);
			$url = "https://api.ucpaas.com/".$SoftVersion.'/'.$Account.'/'.$accountSid.'/'.$function.'/'.$operation.'?sig='.$SigParameter;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			$result = curl_exec($ch);
			curl_close($ch);
			return json_decode($result,true);

					}
}

