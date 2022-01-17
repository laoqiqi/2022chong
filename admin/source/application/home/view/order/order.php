<body>
		<div id="wrapper" class="m_pwd">
			<!--<h2 class="int_title clearfix"><span class="int_pic"><img src="images/jifen/left.png"/></span>积分商城</h2>-->
			<div class="int_title"><span class="int_pic"><img src="assets/home/images/jifen/left.png"/></span>订单详情</div>

            <div class="fill_order clearfix">
                    <a href="<?= url('Address/index') ?>" class="111">

                    <ul class="fill_box">

						<li class="fill_left fill_list fl">
                            <?php if ($data['detail'] == ''): ?>
                                <span class="fill_span"><?=$data['name'] ?><?=$data['phone'] ?></span>
                                <p class="fill_pic clearfix">
                                <span class="span_pic fl"><img src="assets/home/images/ddxq/icon.png"></span>
                                <span class="span_text fr">请填写收货地址</span>
                            </p>

                            <?php else: ?>
                                <span class="fill_span"><?=$data['name'] ?><?=$data['phone'] ?></span>
                                <p class="fill_pic clearfix">
                                    <span class="span_pic fl"><img src="assets/home/images/ddxq/icon.png"></span>
                                    <span class="span_text fr"><?=$data['detail'] ?></span>
                                </p>
                            <?php endif; ?>
                    </a>

						</li>
						<li class="fill_right fill_list fr">
							<img src="assets/home/images/ddxq/right.png" class="fill_img" />
						</li>
					</ul>
				</div>


            <form action="<?=url('index/zhiFun')?>" method="post">
			<div class="order">
				<p class="o_txt clearfix">
					单号 :发货后自动回传，请在我的界面查询
				</p>
				<dl class="order_box topline clearfix">
					<dt class="order_pic fl">
						<img src="{{$goodsinfo['file_url']}}/{{$goodsinfo['file_name']}}"  style="height:147px;"/>
					</dt>
					<dd class="order_txt fr">
						<p class="order_con">商品名字：<?= $goodsinfo['goods_name'] ?>
                         <input name="goods_id" value="<?= $goodsinfo['goods_id'] ?>" style="display: none">
                        </p>
                        <input name="address_id" value="<?= $data['address_id'] ?>" style="display: none">
                        <p class="order_con">价格：<?= $goodsinfo['goods_price'] ?></p>
						<span class="order_line">请填写码数:
                            <input class="number"  placeholder="点我填写码数" style="height:50px;" name="number">
                        </span>
                        <span class="order_line">备注几号:
                            <input class="number"  placeholder="点我填写几号鞋子"  name="int">
                        </span>
                        <button style="margin-top:16px;width:200px; padding:8px;background-color: #428bca;border-color: #357ebd;color: #fff;-moz-border-radius: 10px;-webkit-border-radius: 10px;
                         border-radius: 10px;-khtml-border-radius:10px;text-align: center;vertical-align: middle; border: 1px solid transparent;font-weight: 900;font-size:125%">点击购买</button>
						<p class="order_number clearfix"><span class="order_add fr">x1</span></p>
					</dd>
				</dl>
			</div>
            </form>

            <img src="assets/home/images/ddxq/kefu.png" style="width:411px;margin-left: 2px;margin-top: 76px;">
         </div>
        <script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js"></script>
<script>
    $('.int_pic').click(function(){
        window.history.go(-1);
    })
</script>
</body>
