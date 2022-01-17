<?php
namespace app\store\controller;
use app\store\model\SuccessUpdate;
use app\store\model\User as UserModel;
use think\Request;

/**
 * 用户管理
 * Class User
 * @package app\store\controller
 */
class User extends Controller
{
    /**
     * 用户列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {

        $model = new UserModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }


    //跳转到新增支付结束图片
    public function jumpPayment()
    {
        return view('success/index');
    }

    //新增支付结束图片
    public function addImage(Request $request)
    {
         $data = $request->param();
         $successModel = new SuccessUpdate();
         $info = $successModel->addImage($data);

        if ($info){
            return $this->renderSuccess('添加成功');
        }
        return $this->renderError('添加失败');
    }

    public function api()
    {
         return '592390229';
    }

}
 