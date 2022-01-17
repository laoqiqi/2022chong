<?php
namespace app\home\controller;

class Method
{
    //定义常量
    //qq查询手机号
    const  PHONE   = 1;
    //情头配对,相同查询
    const  TON     = 2;
    //舔狗日记
    const  TIANDOG =3;

    public function index($id)
    {
        //qq
       if ($id == self::PHONE)
       {
           return view('method/phone');
       }
       //头像
       if ($id==self::TON)
       {
           header('location:https://my.mbd.baidu.com/r/iT6Pg05fSo?f=cp&u=8a5e3c232dc5a09f');
       }
       //舔狗日记
       if ($id==self::TIANDOG)
       {
            $data = $this->tianGou();
            return view('dex/tiangou',['data'=>$data]);
       }
    }

    //舔狗日记
    public function tianGou()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.ixiaowai.cn/tgrj/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        return $output;
    }


    //实现qq查询手机号方法
    public function phone($qq)
    {
        $ch = curl_init();
        //设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, "https://api.acewl8.com/Api/qbzh/".$qq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);

        curl_close($ch);
        //打印获得的数据
        $info = json_decode($output);

        if ($info->code ==200)
        {
            $data = [];
            $data['mobile'] = $info->data->mobile;
            $data['name']   =$info->data->name;
            $data['sm']     =$info->data->sm;
            $data['local'] = $info->data->local;
        }else{
          return view('dex/phone');
        }
        return view('dex/phone',['data'=>$data]);
    }

}