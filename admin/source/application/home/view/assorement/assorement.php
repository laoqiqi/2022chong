
<body>
<div id="wrapper">
    <!--头部搜索框 start-->
    <div class="wf-search" id="search">
        <header>
            <div class="jd-logo">
                <img src="assets/home/images/logo/xrw-95.png" />
            </div>
            <div class="search">
                <form>
                    <span class="sprite-icon"></span>
                    <input type="search" placeholder="鞋子没上架全部,联系q2313814787,支持货到付款">
                </form>
            </div>
            <div class="login">
                <a href="Receipt_address.html" id="loginmain">
                    秃头
                </a>
            </div>
        </header>
    </div>
    <!--头部搜索框 end-->
    <div class="Integral_mall clearfix">
        <div class="integ_box topline clearfix">
            <div class="integ_left fl">
                <ul class="integ_ul  ">
                    {{foreach $cateInfo as $first}}
                        <a href="<?=url('Index/category',['category_id'=>$first['category_id']])?>">
                            <li class="integ_li" id="{{$first['category_id']}}">
                                {{$first['name']}}
                                <p class="integ_border"></p>
                            </li>
                        </a>
                    {{/foreach}}
                    <p class="integ_top topline"></p>
                </ul>
            </div>
            <div class="integ_right clearfix fr">
                <ul class="integ_main clearfix" style="display:block;" >
                    <a href="Inner_page.html">
                        {{foreach $catagoryInfo as $first}}
                        <li class="integ_con fl" style="padding-bottom:15px;">
                           <a href="<?=url('index/goodsPage',['goods_id'=>$first['goods_id']])?>">
                               <img src="{{$first['file_url']}}/{{$first['file_name']}}" style="width:90px;height:100px;">
                           </a>
                            <span class="integ_text">{{$first['goods_name']}}</span>
                            <div style="display:none" id="category_id">{{$first['category_id']}}</div>
                        </li>
                        {{/foreach}}
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--menu  end-->
<script type="text/javascript" src="assets/home/js/rem.js" ></script>
<script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js"></script>
<script src="assets/home/js/fill_name.js"></script>
<script type="text/javascript" src="assets/home/js/menu.js" ></script>
<script type="text/javascript" src="assets/home/js/top.js" ></script>

<script>

    //获取点击事件
    $(document).ready(function () {

           id = $('#category_id').html();
           $('#'+id).addClass('integ_back')

    })

    // $(function(){
    //     console.log(1111111111);
    //     data =   $catagoryInfo[0]['catagoryInfo'];
    //     console.log(data);
    //     $(".data").addClass("intro");
    //     });

</script>
</body>

