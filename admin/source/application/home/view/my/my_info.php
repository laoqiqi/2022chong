	<body>
	<div id="my">
		<div class="my_info">
			<img src="assets/home/images/my/bj.png" />
			<div class="my_mian">
				<p class="my_pic">
					<img src="assets/home/images/my/my_03.png" />
				</p>
				<span class="my_number">{{$inlogin['user_name']}}</span>
				<span class="my_txt">欢迎您的到来<br>满1000领100优惠卷</span>
			</div>
		</div>,
		<div class="my_content clearfix">
			<ul>
				<a href="#" @click="dingdan" >
					<li class="my_border">
						<span class="my_pic"><img src="assets/home/images/my/main_04.png" /></span>
						<span class="my_order">回传订单查询</span>
						<span class="my_right"><img src="assets/home/images/my/right.png"/></span>
					</li>
				</a>
				<a href="<?=url('Address/index')?>">
					<li class="my_border topline">
						<span class="my_pic"><img src="assets/home/images/my/main_11.png" /></span>
						<span class="my_order">收货地址</span>
						<span class="my_right"><img src="assets/home/images/my/right.png"/></span>
					</li>
				</a>
			</ul>
		</div>
		<div id="close">
			<a href="<?=url('Login/loGout')?>" class="close_con">退出登录</a>
		</div>
		<div class="my_content_box"></div>
	</div>
	</body>
    <script type="text/javascript" src="assets/home/js/rem.js" ></script>
    <script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js" ></script>
    <script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
    <script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
    <script>
        new Vue({
            el:'#my',
            data:{
                user:{
                    name:'alice',
                    age:19
                },
            },
            methods:{
                handclick(){
                    this.$http.post("Index.php?s=/home/Address/edit/",
                        {name:username,phone:phone,province_id:province_id,city_id:city_id,region_id:region_id,detail:detail,address_id:address_id}).
                    then(function(res){
                        let _info=  res;
                        if (res.body==1)
                        {
                            alert('修改成功');
                            window.history.go(-2);
                        }
                        if (res.body!=1)
                        {
                            alert('新增失败，请联系管理员qq2313814787');
                            location.reload([bForceGet])
                        }
                        this.infoObj = _info;
                    },function(){
                        console.log('请求失败处理');
                    });
                    this.isDialog = true
                },
                dingdan(){
                    this.$http.post("Index.php?s=/home/Order/orderon").then(function(res){
                        if (res.data='')
                        {
                            alert('暂时没有发货或没有填写回传单号，请联系管理员')
                        }
                        alert(res.bodyText);
                       console.log(res.bodyText);
                    },function(){
                        console.log('请求失败处理');
                    });
                }
            }
        });
    </script>

