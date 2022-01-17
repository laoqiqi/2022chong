<?php
namespace app\store\controller;

use  app\store\model\Visit as  VisitModel;
class Visit extends Controller
{
    public function index()
    {
        $data = (new VisitModel())->index();

        return view('index',['data'=>$data,'int'=>count($data)]);
    }
}
