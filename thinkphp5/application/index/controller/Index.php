<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;//引入数据库操作类

class Index extends Controller
{
    public function index(Request $request)
    {
        //1 使用单例获取请求
        // $url = Request::instance()->url();
        // $this->assign('url',$url);
    
        //2通依赖注入实现请求
        // $url = $request->url();
        //  $this->assign('url',$url);
        //3 使用助手函数
        $url = request()->url();
        $this->assign('url',$url);

        //请求参数
        $para = request()->param();
        //dump是tp自己的调试方法
        // dump($para);
        //input
        // dump(input());
        // dump(input('pwd'));
        $this->redirect("index/index/login?username=123");
        if (false) {
            $this->success("登录成功",'index/index/user');
        } else {
            $this->error("失败");
        }
        // return $this->fetch();
    }

    public function user(Request $request)
    {
        //name取表名，不需要加表的前缀
        // $data = Db::name('user')
        //         ->where('uid','>',1) //三个参数：1 查询关键字，2 比较运算符，3 值，第二个参数不传，默认是判等
        //         // ->where('type',1)
        //         ->limit(2)
        //         ->order('uid','desc')
                // ->select();
                // ->column('uid');
        $data = Db::field('*')
                ->table(['php_category'=>'c','php_blog'=>'b'])
                ->where('c.cid=b.cid')
                ->select();
        dump($data);
    	//return '我是新来的';
    }

    public function login($username)
    {
    	return "大家好:".$username;
    }
}
