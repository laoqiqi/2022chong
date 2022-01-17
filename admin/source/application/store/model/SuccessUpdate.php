<?php

namespace app\store\model;

use app\common\model\SuccessUpdate as SuccessUpdateModel;

class SuccessUpdate extends SuccessUpdateModel
{
    //新增支付成功
    public function addImage($data = '')
    {
        $add = $data['goods']['images'][0];
       $info = $this->save([
           'image'=>$add
       ]);
       return $info;
    }

    //展示所有
    public function index()
    {
        $info = $this->orderRaw("RAND()")->field('image')->find();

        //拿出随机id去查询
        $uplodafileModel = new  UploadFile();
        $image = $uplodafileModel->jumpUrl($info);
        return $image;
    }
}
