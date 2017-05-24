<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='在线充值';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;在线充值";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>账户信息</h3>
      <div class="yuer f12 p20">会员等级: <span class="csh"><?=$tmgetgroupname?></span><span class="ml30">可用余额: <span class="csh f20">￥<?=number_format($user[money],2)?></span></span> <span class="ml30">剩余积分: <span class="csh f20"><?=$user[userfen]?></span></span></div>
      <div class="tab">
        <div class="ddsearch fr"><a href="#" class="c4095ce">充值帮助>></a></div>
        <ul>
          <li class="tabhover"><a href="#">购买会员组</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<form name="payform" method="post" action="../../payapi/BuyGroupPay.php">
      <div id="edituserxx">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
    </tr>
    <?
  while($r=$empire->fetch($sql))
  {
	  if($r[buygroupid]&&$level_r[$r[buygroupid]][level]>$level_r[$user[groupid]][level])
	  {
		  continue;
	  }
  ?>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 100px;"><input type="radio" name="id" value="<?=$r[id]?>"></td>
                <td bgcolor="" width=""><?=$r[gmoney]?>
              元 （ 
              <?=$r[gname]?>
              ） <?=nl2br($r[gsay])?></td>
              </tr>
    <?
  }
  ?>
            </tbody>
          </table>
        </div>
      <div id="chongzhi" class="pl20">
                <input name="payid" type="hidden" value="3">
                <ul>
                    <li class="payfs"><span class="fl pr30">支付方式：</span><a href="javascript:void();" class="hover" payfs="3"><span></span><img src="/eshop/skin/pay/zfb.jpg"></a> <a href="javascript:void();" payfs="1"><span></span><img src="/eshop/skin/pay/cft.jpg"></a> <a href="javascript:void();" payfs="2"><span></span><img src="/eshop/skin/pay/wyzx.jpg"></a><a href="javascript:void();" payfs="4"><span></span><img src="/eshop/skin/pay/wx.jpg"></a><div class="clearfix"></div></li>
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