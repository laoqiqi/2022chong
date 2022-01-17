<?php
namespace  app\store\model;
use app\common\model\Visit as VisitModel;
use  think\db;
class Visit extends VisitModel
{
    //添加新ip
    public function add($ip)
    {
        //添加之前检查数据库有无这个ip
        $update = $this->isUpdate(true,['ip'=>$ip])->save(['update_time'=>time()]);
        if ($update!=1)
        {
            //拼接参数
            $data=[];
            $data['ip'] = $ip;
            $data['wxapp_id'] = 10001;
            $data['create_time'] = time();
            Db::table('yoshop_visit')->insert($data);
        }
    }

    //获取全部ip
    public function index()
    {
        return $this->select();
    }

}