<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='在线支付';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href=../member/cp/>会员中心</a>&nbsp;>&nbsp;在线支付";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function ChangeShowBuyFen(amount){
	var fen;
	fen=Math.floor(amount)*<?=$pr[paymoneytofen]?>;
	document.getElementById("showbuyfen").innerHTML=fen+" 点";
}
</script>

<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>账户信息</h3>
      <div class="yuer f12 p20">会员等级: <span class="csh"><?=$tmgetgroupname?></span><span class="ml30">可用余额: <span class="csh f20">￥<?=number_format($user[money],2)?></span></span> <span class="ml30">剩余积分: <span class="csh f20"><?=$user[userfen]?></span></span></div>
      <div class="tab">
        <div class="ddsearch fr"><a href="#" class="c4095ce">充值帮助>></a></div>
        <ul>
          <li class="tabhover"><a href="/e/payapi/">充值余额</a></li>
          <li><a href="/e/payapi/buypoint.php">充值点数</a></li>
          <li><a href="/e/member/buybak/">帐户明细</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div class="hyad"><a href="#"><img src="/eshop/ad/1.jpg" width="815"></a></div>
      <div class="quickpay">
      	<h3>账户充值，请选择充值金额</h3>
        <ul>
        	<li class="hover"><img src="/eshop/skin/pay100.png" price="100"></li>
            <li><img src="/eshop/skin/pay200.png" price="200"></li>
            <li><img src="/eshop/skin/pay300.png" price="300"></li>
            <li><img src="/eshop/skin/pay500.png" price="500"></li>
            <li><img src="/eshop/skin/pay700.png" price="700"></li>
            <li><div class="p6">其它金额<span class="c999">（输入您要充值的金额）</span><br><input type="text" maxlength="10" id="otherprice" class="input_text w230"></div></li>
            <div class="clearfix"></div>
        </ul>
      </div>
      <div id="chongzhi">
        	<form name="paytomoneyform" method="post" action="pay.php" target="_blank">
            	<input name="phome" type="hidden" id="phome" value="PayToMoney">
                <input name="money" type="hidden" value="100">
                <input name="payid" type="hidden" value="3">
                <ul>
                	<li>支付金额：<span class="f20 csh price">100</span> <span class="csh">元</span> <a href="#" class="cblue ml10">索要发票</a></li>
                    <li class="payfs"><span class="fl">支付方式：</span><a href="javascript:void();" class="hover" payfs="3"><span></span><img src="/eshop/skin/pay/zfb.jpg"></a> <a href="javascript:void();" payfs="1"><span></span><img src="/eshop/skin/pay/cft.jpg"></a> <a href="javascript:void();" payfs="2"><span></span><img src="/eshop/skin/pay/wyzx.jpg"></a><a href="javascript:void();" payfs="4"><span></span><img src="/eshop/skin/pay/wx.jpg"></a><div class="clearfix"></div></li>
                    <li class="center"><input type="submit" name="Submit" value="确定支付" class="rbutton"></li>
                </ul>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>