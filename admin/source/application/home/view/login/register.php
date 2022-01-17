<body>
<div id="app">
    <div id="my" class="login_content" style="">
        <div class="my_info">
            <img src="assets/home/images/login/bj_01.png" />
            <div class="my_mian login_pic">
            </div>
        </div>
        <div class="login">
                <p class="login_p"><span class="logo_user">
                        <img src="assets/home/images/login/login_04.png"/></span>
                    <input type="text" name="user_name" placeholder="请输入用户名" id="username" autocomplete="off" value=""/></p>
                <p class="login_p"><span class="logo_pwd">
                        <img src="assets/home/images/login/login_07.png"/></span>
                    <input type="password" placeholder="请输入密码"  id="password" name="password" value=""/></p>
                <p class="login_sub"><input @click="handclick" type="submit" id="sub" value="点击注册"  /></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/home/js/jquery-1.11.3.min.js" ></script>
<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
</body>
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
                username = $('#username').val();
                password  = $('#password').val();

                if (username=='')
                {
                    alert('请正确填写用户名');
                    return false;
                }
                if (password=='')
                {
                    alert('请正确填写密码');
                    return false;

                }
                    this.$http.post("Index.php?s=/home/login/register/",{params:{username:username,password:password}}).then(function(res){
                        let _info=  res;
                        if (res.body==3)
                        {
                            alert('用户名已被使用')
                        }
                        if (res.body==1)
                        {
                            alert('1231231231');
                            window.location.href="javascript:history.go(-1)";
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
