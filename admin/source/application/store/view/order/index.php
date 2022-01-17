<div id="app">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">未发货订单</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="order-list am-scrollable-horizontal am-u-sm-12 am-margin-top-xs">
                        <table width="100%" class="am-table am-table-centered
                        am-text-nowrap am-margin-bottom-xs">
                            <thead>
                            <tr>
                                <th width="30%" class="goods-detail">商品信息</th>
                                <th width="10%">订单金额</th>
                                <th width="15%">实付款</th>
                                <th>买家</th>
                                <th>交易状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{foreach $list as $order}}
                                <tr class="order-empty">
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td class="am-text-middle am-text-left" colspan="6">
                                        <span class="am-margin-right-lg"> 商品图片：<img src="<?= $order['file_url'].'/'.$order['file_name']?>" style="width:100px;height:100px;"></span>
                                        <span class="am-margin-right-lg"> 商品姓名：<?= $order['goods_name'] ?></span>
                                        <span class="am-margin-right-lg"> 商品价格：<?= $order['goods_price'] ?></span>
                                        <span class="am-margin-right-lg"> 商品编号：<?= $order['int'] ?></span>
                                        <span class="am-margin-right-lg"> 商品码数：<?= $order['number'] ?></span>
                                        <span class="am-margin-right-lg"> 收货地址：<?= $order['detail'] ?></span>
                                        <span class="am-margin-right-lg"> 买家姓名：<?= $order['user_name'] ?></span>
                                        <span class="am-margin-right-lg"> 买家手机号：<?= $order['phone'] ?></span>
                                        <span class="am-margin-right-lg" style="display: none"> 买家手机号：<?= $order['order_id'] ?></span>
                                        <button class="danhao" @click="danhao(<?= $order['order_id'] ?>)">填写单号</button>
                                    </td>
                                </tr>
                            {{/foreach}}
                                <tr>
                                    <td colspan="6" class="am-text-center">暂无记录</td>
                                </tr>

                                <div class="ti" style="background:#D4D5D0;width: 300px;height:100px;position:fixed;top:260px;left:730px;display:none" >
                                    <span>请填写单号</span>
                                    <input style="" value="" class="info" />
                                    <button style="margin-top:40px;margin-left:230px;" value="" class="que" @click="que" id=""  >确定</button>
                                </div>

                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://lib.baomitu.com/vue/2.6.12/vue.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
<script>
  new Vue({
      el:'#app',
      methods:{
          danhao:function(e){
              $('.ti').css("display","block");
              $('.que').val(e);
          },
          que(){
              order_id = $('.que').val();
              info = $('.info').val();
              this.$http.post("Index.php?s=/store/Order/orderon/",{order_id:order_id,info:info}).then(function(res){
                  alert('添加成功');
                  window.location.reload()
              },function(){
                  console.log('请求失败处理');
              });
          }

      }
  });

</script>

