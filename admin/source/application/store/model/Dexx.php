<?php
namespace app\store\model;
use  app\common\model\Dexx as DexModel;
use think\Db;
class Dexx extends DexModel
{
    public function index()
    {
         $data = $this->select();
         return $data;
    }

}