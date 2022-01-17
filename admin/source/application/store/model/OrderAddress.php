<?php

namespace app\store\model;

use app\common\model\OrderAddress as OrderAddressModel;
use app\store\model\User as UserModel;
use app\store\model\Order as OrderModel;
/**
 * 订单收货地址模型
 * Class OrderAddress
 * @package app\store\model
 */
class OrderAddress extends OrderAddressModel
{
    //新增到订单收货
   public function address($address='')
   {
      return $this->save(
         [
             'name'=>$address['name'],
             'phone'=>$address['phone'],
             'province_id'=>$address['province_id'],
             'city_id'=>$address['city_id'],
             'region_id'=>$address['region_id'],
             'detail'   =>$address['detail'],
             'order_id'=>$address['order_id'],
             'user_id'=>$address['user_id'],
         ]
     );
   }


}
