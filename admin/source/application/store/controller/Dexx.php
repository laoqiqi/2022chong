<?php
namespace app\store\controller;
use app\store\model\Dexx as DexxModel;
class Dexx extends Controller
{
    public function index()
    {
      $list = (new  DexxModel())->index();
      return view('table/index',['list'=>$list]);
    }

}