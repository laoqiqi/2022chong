<?php

namespace app\store\model;

use app\common\model\Order as OrderModel;
use think\Request;
use app\api\model\UserAddress;
use think\Session;
use app\store\model\OrderAddress as OrderAddressModel ;
/**
 * 订单管理
 * Class Order
 * @package app\store\model
 */
class Order extends OrderModel
{
    /**
     * 订单列表
     * @param $filter
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList($status='')
    {
        return $this->alias('a')
            ->join('yoshop_order_address b','a.order_id = b.order_id')
            ->join('yoshop_goods c','a.goods_id = c.goods_id')
            ->join('yoshop_user d','a.user_id = d.user_id')
            ->join('yoshop_goods_image e','c.goods_id = e.goods_id')
            ->join('yoshop_upload_file f','e.image_id = f.file_id')
            ->join('yoshop_goods_spec g','c.goods_id = g.goods_id')
            ->where('a.receipt_status',$status)
            ->paginate(10);
    }

    /**
     * 确认发货
     * @param $data
     * @return bool|false|int
     */
    public function delivery($data)
    {
        if ($this['pay_status']['value'] == 10
            || $this['delivery_status']['value'] == 20) {
            $this->error = '该订单不合法';
            return false;
        }
        return $this->save([
            'express_company' => $data['express_company'],
            'express_no' => $data['express_no'],
            'delivery_status' => 20,
            'delivery_time' => time(),
        ]);
    }

    //添加订单
    public function addOrdel($order='')
    {
            $this->total_price     = $order['total_price'];
            $this->pay_status      = $order['pay_status'] ;
            $this->pay_time        = $order['pay_time'];
            $this->express_price   = $order['express_price'];
            $this->express_company =$order['express_company'];
            $this->user_id         =$order['user_id'];
            $this->number          =$order['number'];
            $this->goods_id        =$order['goods_id'];
            $this->save();

            //返回自增id
            $order_id = $this->order_id;

            //获取收货地址信息
            $addressModel = new UserAddress;
            $user_id =  Session::get('user_id');
            $address = $addressModel->detail($user_id,$order['address_id']);

            //放到订单收货地址表
            $orderaddressModel = new OrderAddressModel;
            $address['order_id'] = $order_id;
            $status = $orderaddressModel->address($address);

            return $order_id;

    }

    public  function orderon($order_id,$info)
    {
       return $this->where('order_id',$order_id)->update(['order_no'=>$info,'receipt_status'=>20]);

    }

    public function userorderon($user_id)
    {
        return $this->where('user_id',$user_id)->field('order_no')->select();
    }

}
