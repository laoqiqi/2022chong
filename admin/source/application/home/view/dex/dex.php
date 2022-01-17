<body>
		<div id="wrapper">
			<div class="int_title backoff"><span class="int_pic "><img src="assets/home/images/jifen/left.png" />
                </span>实用小公举</div>
			<div class="perform">
                <?php foreach ($info  as $key => $value) { ?>
                <dl class="p_main topline clearfix">
					<dt class="p_pic fl">
						<img src="http://images.shejidaren.com/wp-content/uploads/2013/06/044635WIX.jpg" />
					</dt>
					<dd class="p_con fr">
						<span class="p_con_sp"> <?= $value["name"]?></span>
                        <span class="p_con_sp"> <?= $value["id"]?></span>
						<a href="<?= url('method/index',['id'=>$value['int']])?>" class="p_money">点击使用</a>
					</dd>
				</dl>
                <?php } ?>
			</div>
		</div>
            <script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js" ></script>
            <script type="text/javascript" src="assets/home/js/fill_name.js" ></script>
	</body>
<script>

    $('.backoff').click(function(){
        window.history.go(-1);
    })

</script>

</html>
