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
      <div id="app">
		<div id="wrapper">
			<div class="int_title"><span class="int_pic"><img src="assets/home/images/jifen/left.png"/></span>新建地址</div>
			<div class="m_pwd">
                <span class="new topline">填写收货人：<input  name="name" value="" class="name"/></span>
				<span class="new topline">填写联系方式：<input  name="phone" value="" class="phone"/></span>
				<span class="new topline">填写省份：<input  name="province_id" value="" class="province_id"/></span>
                <span class="new topline">填写市区：<input name="city_id" value="" class="city_id"/></span>
                <span class="new topline">填写县区：<input name="region_id" value="" class="region_id" /></span>
				<span class="new topline">填写地址：<input  name="detail" value="" class="detail"/></span>
                <span class="new topline">是否默认：<input type="checkbox" name="vehicle" value="Car" checked="checked" id="cboxreturned"/></span>

				<p class="new_ti" style="margin-top:-40px;" @click="handclick">
					<a href="#" >保存并使用</a>
				</p>

            </div>
		</div>
      </div>
	</body>
<script type="text/javascript" src="assets/home/js/rem.js" ></script>
<script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js" ></script>
<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
<script>

    $('.int_pic').click(function(){
        window.history.go(-1);
    });

    new Vue({
        el:'#app',
        data:{
            user:{
                name:'alice',
                age:19
            },
        },
        methods:{
            handclick(){
                isReturned = document.getElementById('cboxreturned').checked;
                username = $('.name').val();
                phone  = $('.phone').val();
                province_id = $('.province_id').val();
                city_id  = $('.city_id').val();
                region_id = $('.region_id').val();
                detail = $('.detail').val();

                if (detail=='')
                {
                    alert('请正确填写详细地址');
                    return false;
                }
                if (region_id=='')
                {
                    alert('请正确填写县区');
                    return false;
                }
                if (username=='')
                {
                    alert('请正确填写用户名');
                    return false;
                }
                if (phone=='')
                {
                    alert('请正确填写手机号');
                    return false;
                }
                if (province_id=='')
                {
                    alert('请正确填写省份');
                    return false;
                }
                if (city_id=='')
                {
                    alert('请正确填写城市');
                    return false;
                }
                this.$http.post("Index.php?s=/home/Address/add/",
                    {params:{name:username,phone:phone,province_id:province_id,default:isReturned,city_id:city_id,region_id:region_id,detail:detail}}).
                then(function(res){
                    let _info=  res;
                    if (res.body==1)
                    {
                        alert('新增成功');
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
        }
    });
</script>
</html>

