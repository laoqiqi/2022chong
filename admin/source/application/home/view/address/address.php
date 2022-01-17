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
    <title>秃头怪潮牌店|收货地址</title>
</head>
<body>
<div id="wrapper">
    <div class="int_title">
        <span class="int_pic">
            <img src="assets/home/images/jifen/left.png" class=".int_pi"/>
        </span>收货地址</div>
    <div class="m_pwd topline">
        <div class="confirm">


            {{foreach $info as $first}}
                <ul class="qaddress">
    <!--                <li class="fl addr_1 add_main">-->
    <!--                    <img src="assets/home/images/adress/addr.png" />-->
    <!--                </li>-->
                    <li class="fl addr_2 add_main">
                        <span class="add_txt add_color">{{$first.name}}<font>{{$first.phone}}</font></span>
                        <span class="add_txt">{{$first.region.province}}{{$first.region.city}}{{$first.region.region}}</span>
                        <span class="add_txt">{{$first.detail}}</span>
                        <input value="{{$first.address_id}}" style="display:none;" class="address_id">
                    </li>
                    <li class="fr addr_3 add_main"><a href="<?=url('Address/urledit',['address_id'=>$first['address_id']])?>">编辑</a></li>
                </ul>
            {{/foreach}}


        </div>
        <div class="con_sub address">
            <a href="<?= url('Address/addUrl')?>" class="con_ti address_ti">新建地址</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/home/js/rem.js"></script>
<script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/home/js/swiper.min.js"></script>
<!--<script type="text/javascript" src="assets/home/js/seasonal.js"></script>-->
</body>
<script>
    $('.int_pic').click(function(){
        window.history.go(-1);
    })
</script>
</html>
