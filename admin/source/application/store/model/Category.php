<?php

namespace app\store\model;

use app\common\model\Category as CategoryModel;
use think\Cache;

//设置分类默认展示商品
const CATEGORY_ID  = 2;
/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class Category extends CategoryModel
{


    /**
     * 添加新记录
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
//        if (!empty($data['image'])) {
//            $data['image_id'] = UploadFile::getFildIdByName($data['image']);
//        }
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

    /**
     * 编辑记录
     * @param $data
     * @return bool|int
     */
    public function edit($data)
    {
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

    /**
     * 删除商品分类
     * @param $category_id
     * @return bool|int
     */
    public function remove($category_id)
    {
        // 判断是否存在商品
        if ($goodsCount = (new Goods)->where(compact('category_id'))->count()) {
            $this->error = '该分类下存在' . $goodsCount . '个商品，不允许删除';
            return false;
        }
        // 判断是否存在子分类
        if ((new self)->where(['parent_id' => $category_id])->count()) {
            $this->error = '该分类下存在子分类，请先删除';
            return false;
        }
        $this->deleteCache();
        return $this->delete();
    }

    /**
     * 删除缓存
     * @return bool
     */
    private function deleteCache()
    {
        return Cache::rm('category_' . self::$wxapp_id);
    }

    //查看当前的分类
    public function cateInfo()
    {
//        $data = Category::getALL();
//        dump($data);die;

        return \think\Db::table('yoshop_category')
            ->alias('a')
            ->join('yoshop_upload_file b','a.image_id = b.file_id')
            ->field('a.name,b.file_id,b.file_url,b.file_name,b.file_type,a.category_id')
            ->where('a.status',10)
            ->select();
    }


    //查询出所有分类 and 根据分类切换商品
    public function category($category_id='')
    {

        if ($category_id=='')
        {
            $category_id = CATEGORY_ID;
        }
            return  \think\Db::table('yoshop_category')
              ->alias('a')
              ->join('yoshop_goods b','a.category_id = b.category_id')
              ->join('yoshop_goods_image c','b.goods_id = c.goods_id')
              ->join('yoshop_upload_file d','c.image_id = d.file_id' )
              ->where(['a.category_id'=>$category_id])
              ->select();
    }


    //查询出全部的分类
    public function categoryInfo()
    {
        return $this->field('category_id,name')->where('status_info',NULL)->select();
    }



}
