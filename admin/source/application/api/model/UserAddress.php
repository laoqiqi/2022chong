<?php

namespace app\api\model;

use app\common\model\Region;
use app\common\model\UserAddress as UserAddressModel;

use app\store\model\User;
/**
 * 用户收货地址模型
 * Class UserAddress
 * @package app\common\model
 */
class UserAddress extends UserAddressModel
{
    /**
     * 隐藏字段
     * @var array
     */
    protected $hidden = [
        'create_time',
        'update_time'
    ];

    /**
     * @param $user_id
     * @return false|static[]
     * @throws \think\exception\DbException
     */
    public function getList($user_id)
    {
        return self::all(compact('user_id'));
    }

    /**
     * 新增收货地址
     * @param null|static $user
     * @param $data
     * @return false|int
     */
    public function add($user, $data)
    {
//        dump($data['params']['province_id']);die;
        $data['region']=[];
        $data['region'][0] = $data['params']['province_id'];
        $data['region'][1] = $data['params']['city_id'];
        $data['region'][2] = $data['params']['region_id'];

        // 添加收货地址
//        $region = explode(',', $data['region']);

        $province_id = Region::getIdByName($data['region'][0], 1);
        $city_id = Region::getIdByName($data['region'][1], 2, $province_id);
        $region_id = Region::getIdByName($data['region'][2], 3, $city_id);
        $info =   $this->allowField(true)->save(array_merge([
            'name'    =>$data['params']['name'],
            'detail'  =>$data['params']['detail'],
            'phone'   =>$data['params']['phone'],
            'user_id' => $user,
            'wxapp_id' => self::$wxapp_id,
            'province_id' => $province_id,
            'city_id' => $city_id,
            'region_id' => $region_id,
        ], $data));

        if ($data['params']['default']!='')
        {
            $id = $this->address_id;
            $addressModel = new User();
            return $addressModel->save(['address_id'=>$id],['user_id'=>$user]);
        }
        return $info;
    }

    /**
     * 编辑收货地址
     * @param $data
     * @return false|int
     */
    public function edit($data,$user_id)
    {
        $data['region']=[];
        $data['region'][0] = $data['province_id'];
        $data['region'][1] = $data['city_id'];
        $data['region'][2] = $data['region_id'];
        $province_id = Region::getIdByName($data['region'][0], 1);
        $city_id = Region::getIdByName($data['region'][1], 2, $province_id);
        $region_id = Region::getIdByName($data['region'][2], 3, $city_id);
        $data['province_id'] = $province_id;
        $data['city_id'] = $city_id;
        $data['region_id'] = $region_id;

        if ($data['moren']!='')
        {
           $userModel = new User();
           $userModel->save(['address_id'=>$data['address_id']],['user_id'=>$user_id]);

        }
        return $this->allowField(true)
            ->isUpdate(true,['address_id'=>$data['address_id']])
            ->save(array_merge(compact('province_id', 'city_id', 'region_id'),$data));
    }

    /**
     * 设为默认收货地址
     * @param null|static $user
     * @return int
     */
    public function setDefault($user)
    {
        // 设为默认地址
        return $user->save(['address_id' => $this['address_id']]);
    }

    /**
     * 删除收货地址
     * @param null|static $user
     * @return int
     */
    public function remove($user)
    {
        // 查询当前是否为默认地址
        $user['address_id'] == $this['address_id'] && $user->save(['address_id' => 0]);
        return $this->delete();
    }

    /**
     * 收货地址详情
     * @param $user_id
     * @param $address_id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($user_id, $address_id)
    {
        return self::get(compact('user_id', 'address_id'));
    }


}
