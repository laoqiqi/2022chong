{__NOLAYOUT__}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,minimum-scale=1.0">
    <link rel="stylesheet" href="assets/home/css/reset.css">
    <link rel="stylesheet" href="assets/home/css/index.css">
    <title>秃头商品详情</title>
</head>
<body>
<div id="wrapper">
    <div class="int_title"><span class="int_pic">
            <img src="assets/home/images/jifen/left.png" class="backoff"/>
        </span>商品详情</div>
    <div class="video details_back">
        <div class="deta_pic topline">
            <p class="deta_box"><img src="{{$goodsinfo['file_url']}}/{{$goodsinfo['file_name']}}"  style="width:100%"/></p>
            <p class="deta_con">商品姓名：{{$goodsinfo['goods_name']}}</p>
            <p class="deta_con deta_line">商品价格：{{$goodsinfo['goods_price']}}</p>
        </div>
        <div class="perform topline">
            <div class="fill_name clearfix topline">
                <ul>
                    <li class="fill fl name_color">详情</li>
                    <li class="addr_name fill fr">规格</li>
                </ul>
            </div>
            <div class="name_perf details_padding">
                <div class="name_box " style="display: block;" id="fuwen">
                    {{$goodsinfo['content']}}
                </div>
                <div class="name_box detail_width_con">
                    <span class="detail_main">品牌及名称：{{$goodsinfo['goods_name']}}</span>
                    <span class="detail_main">型号：{{$goodsinfo['goods_no']}}</span>
                    <span class="detail_main">产地：福建</span>
                    <span class="detail_main">配送时间：下午六点之前当天发货七点出单号过了六点第二天</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="menu" class="detail_nav_main topline" >
    <ul class="m_nav clearfix">
        <a href="<?=url('index/index') ?>"><li class="m_nav_1">
				<span class="m_nav_pic_main">
					<img src="assets/home/images/xqq/nav_icon.png" />
				</span>
            </li></a>
        <a href="#"><li class="m_nav_2">加入购物车</li></a>
        <a href="<?=url('Order/index',['goods_id'=>$goodsinfo['goods_id']])?>"><li class="m_nav_2 m_nav_fr ">立即购买</li></a>
    </ul>
</div>

<div id="back_top">
    <a href="#"><img src="assets/home/images/xqq/the_top.png" /></a>
</div>
<script type="text/javascript" src="assets/home/js/rem.js" ></script>
<script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js" ></script>
<script type="text/javascript" src="assets/home/js/fill_name.js" ></script>
<script type="text/javascript" src="assets/home/js/pay_success.js" ></script>
<script>
    var obj = document.getElementById("fuwen");
    obj.innerHTML = obj.innerText;//这样重新设置html代码为解析后的格

    $('.backoff').click(function(){
        window.history.go(-1);
    })

</script>
</body>


