<?php

namespace app\store\model;

use app\common\model\UserAddress as UserAddressModel;
/**
 * 用户收货地址模型
 * Class UserAddress
 * @package app\common\model
 */
class UserAddress extends UserAddressModel
{

    public function index($address_id)
    {

       return $this->where('address_id',$address_id['address_id'])->find();

    }
}
