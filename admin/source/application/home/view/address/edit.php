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
        <div class="int_title">
           <span class="int_pic"><img src="assets/home/images/jifen/left.png"/></span>
            编辑地址
        </div>
        <div class="m_pwd">
            <span class="new topline">填写收货人：<input  name="name" value="<?=$info['name']?>" class="name"/></span>
            <span class="new topline" style="display:none">填写收货人：
                <input  name="address_id" value="<?=$info['address_id']?>" class="address_id" style="display:none"/>
            </span>
            <span class="new topline">填写联系方式：<input  name="phone" value="<?=$info['phone']?>" class="phone"/></span>
            <span class="new topline">填写省份：<input  name="province_id" value="<?= $info['region']['province']?>" class="province_id"/></span>
            <span class="new topline">填写市区：<input name="city_id" value="<?= $info['region']['city']?>" class="city_id"/></span>
            <span class="new topline">填写县区：<input name="region_id" value="<?= $info['region']['region']?>" class="region_id" /></span>
            <span class="new topline">填写地址：<input  name="detail" value="<?= $info['detail']?>" class="detail"/></span>

            <?php if ($address_id == $info['address_id']): ?>
                <span class="new topline">是否默认：<input type="checkbox" name="vehicle" value="Car" checked="checked" id="cboxreturned"/></span>
            <?php else: ?>
                <span class="new topline">是否默认：<input type="checkbox" name="vehicle" value="Car" id="cboxreturned"/></span>
            <?php endif ?>
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
</script>
<script>
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
                address_id = $('.address_id').val();

                if (detail=='')
                {
                    alert('请正确填写详细地址')
                }
                if (region_id=='')
                {
                    alert('请正确填写县区')
                }
                if (username=='')
                {
                    alert('请正确填写用户名')
                }
                if (phone=='')
                {
                    alert('请正确填写手机号')
                }
                if (province_id=='')
                {
                    alert('请正确填写省份')
                }
                if (city_id=='')
                {
                    alert('请正确填写城市')
                }
                this.$http.post("Index.php?s=/home/Address/edit/",
                    {moren:isReturned,name:username,phone:phone,province_id:province_id,city_id:city_id,region_id:region_id,detail:detail,address_id:address_id}).
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
                this.isDialog = trueth
            },
        }
    });
</script>
</html>

