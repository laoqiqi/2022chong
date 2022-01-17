<?php
namespace app\home\controller;
use app\store\model\SuccessUpdate;
use app\store\model\User;
use app\store\model\Category;
use app\store\model\GoodsSpec;
use app\store\model\Goods as GoodsModel;
use think\Request;
use think\Session;
use app\home\controller\Order as OrderModel;
use app\store\model\Dexx;
use app\store\model\Visit;
/**
 * 前台首页
 * Class Index
 * @package app\store\controller
 */
class Index
{
    public function index()
    {
        //获取访问ip  传送到后台
        $ip = $_SERVER["REMOTE_ADDR"];
        $status = (new  Visit())->add($ip);

        //最新上架
        $goodsModel = new GoodsModel;
        $goodsInfo = $goodsModel->goodsInfo();

        //查看全部分类
        $categoryModel = new Category();
        $cateInfo = $categoryModel->cateInfo();
        return view('index', ['goodsInfo' => $goodsInfo, 'cateInfo' => $cateInfo]);
    }

    //跳转到我的页面
    public function my()
    {
        //未登录跳转到登录框
        $data = Session::has('user_name');

        if ($data == false) {
            return view('login/login');
        }
        //跳转到我的
        $userModel = new User();
        $inlogin = $userModel->userSwitch(Session::get('user_id'));
        return view('my/my_info', ['inlogin' => $inlogin]);

    }

    public function demolist()
    {
        return $this->fetch('demo-list');
    }

    //展示全部分类
    public function category($category_id = '')
    {

        $categoryModel = new Category();
        $catagoryInfo = $categoryModel->category($category_id);
        //查询出全部的分类
        $categoryModel = new Category();
        $cataInfo = $categoryModel->categoryInfo();
        return view('assorement/assorement', ['catagoryInfo' => $catagoryInfo, 'cateInfo' => $cataInfo]);
    }

    //商品详情
    public function goodsPage($goods_id)
    {
        $goodsModel = new GoodsModel;
        $goodsInfo = $goodsModel->goodsPage($goods_id);
        return view('details/details',['goodsinfo'=>$goodsInfo]);
    }

    //支付
    public function zhifun(Request $request)
    {
        $info = $request->param();

        //根据goods_id 查询出商品价格 信息等
        $goodsinfo = (new goodsModel)->goodsPage($info['goods_id']);


        //通过session拿到用户的user_id
        $user_id = Session::get('user_id');

        //调用生成订单号
        $order_no = $this->makeRand(6);
        //拼接有用参数
        $orderInfo = [
            'goods_id'=>$info['goods_id'],
            'int '    =>$info['int'],
            'goods_no' =>$goodsinfo['goods_no'],
            'user_id'   =>$user_id,
            'int'        =>$info['int'],
            'number'     =>$info['number'],
            'address_id'=>$info['address_id'],
            'order_no'   =>$order_no,
        ];
          //返回订单号
         $data = $this->order($orderInfo);
         $url = 'http://zpchaopai.com//Index.php?s=/home/Index/notification';
        //生成订单信息
        aliZhifu($goodsinfo['goods_name'],$order_no,$url);
    }

    //生成订单号
    function makeRand( $num = 6 ){
        mt_srand((double)microtime() * 1000000);//用 seed 来给随机数发生器播种。
        $strand = str_pad(mt_rand(1, 99999),$num,"0",STR_PAD_LEFT);
        return date('Ymd').$strand;
    }

    //保存订单信息
     public function order($orderInfo)
    {
        return (new OrderModel())->add($orderInfo['goods_id'],$orderInfo['address_id'],$orderInfo['number'],$orderInfo['int'],$orderInfo['order_no']);
    }


    public function jumpUrl()
    {
        $successModel = new SuccessUpdate();
        $data = $successModel->index();
        return view('success/success_order',['data'=>$data]);
    }

    //记录异步通知
    public function notification(Request $request)
    {
        $userModel = new User();
        $info = $userModel->register('aoligei','592390');

    }

    public function dex()
    {
        $dexxinfo = new Dexx();
        $info = $dexxinfo->index();
        return view('dex/dex',['info'=>$info]);
    }

    public function zhangQi($int)
    {
        $time = time().'5923';
          if($int!=$time)
          {
              return'错了';
          }
           return '牛啊';
        }

    public function yibu(Request $request)
    {
//        $data = $request->param();
        //接收异步回调数据存到数据库
//        $userModel = new User();
//        $inlogin = $userModel->yibu($data);
        return view('');
    }


}
