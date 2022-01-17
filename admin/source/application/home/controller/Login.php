<?php
namespace app\home\controller;
use app\store\model\StoreUser;
use think\Request;
use app\store\model\User;
use think\Session;
use think\Controller;


class Login extends Controller
{
    //登陆
    public function login(Request $request)
    {
        $info = $request->param();

        //验证用户名或者密码
        $UserModel = new User();
        $inLogin = $UserModel->inLogin($info['user_name'], $info['password']);
        if ($inLogin == null){
            return view('login/login1');
            //注册页面
        } else {
            //判断是否第二次点击
            if (Session::has('user_name') == false)
            {
                //把他的用户名和密码放到session里面
                Session::set('user_name', $info['user_name']);
                Session::set('password', $info['password']);
                Session::set('user_id', $inLogin['user_id']);
                //查出他的数据跳转到页面 暂时只返回用户名
                return view('my/my_info', ['inlogin' => $inLogin]);
            }
            else{
                return view('my/my_info', ['inlogin' => $inLogin]);
            }
        }
    }

    //注册
    public function register(Request $request)
    {
       $data = $request->param();
       //都为空返回到注册页面
        if (!isset($data['params']['username']) and !isset($data['params']['password']))
        {
            return view('login/register');
        }

        $userModel = new User();
        $username = $data['params']['username'];
        $password = $data['params']['password'];
        $register = $userModel->register($username,$password);

        if ($register==null)
        {
            return 3;
        }

        return $register;
    }

    //退出登陆
    public function loGout()
    {
        Session::clear();
        return redirect('home/Index/index');
    }

}

