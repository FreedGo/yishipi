<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='我的推广链接';
require(ECMS_PATH.'e/template/incfile/header.php');
$tg=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$user[userid]' limit 1");
$invite=$empire->fetch1("select * from {$dbtbpre}fanli_config limit 1");
$tgurl=$invite[url]."e/extend/fanli/?s=".$user[userid];
$inviteurl=str_replace("[!--inviteurl--]",$tgurl,$invite[fanlism]);
?>
<link href="/e/extend/fanli/css/fanli.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/e/extend/fanli/js/invite.js"></script>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>我的返利</h3>
      <div class="yuer f12 p20">会员等级: <span class="csh"><?=$tmgetgroupname?></span><span class="ml30">可用余额: <span class="csh f20">￥<?=number_format($user[money],2)?></span></span> <span class="ml30">剩余积分: <span class="csh f20"><?=$user[userfen]?></span></span></div>
      <div class="tab">
        <ul>
          <li class="tabhover"><a href="/e/member/fanli/">我的推广链接</a></li>
          <li><a href="/e/member/fanli/list.php">返利记录</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <!--下面改为返利宣传图-->
      <div class="hyad"><a href="#"><img src="/eshop/ad/1.jpg" width="815"></a></div>
      <div class="quickpay">
      	<h3>如果您的朋友通过下面链接访问站点,并且购物成功后,您将获得购物返利金额或者积分!</h3>
        <table width="780" border="0" cellpadding="3" cellspacing="1">
            <tr bgcolor="#FFFFFF"> 
              <td>
              <div class="fanlism">
				您可通过QQ ,MSN ,QQ空间 ,邮件 ,论坛 ,博客等方式,向朋友推荐一下地址
     			<textarea id="invite-copy"><?=$inviteurl?></textarea>
                <div class="tuijian-click"><a href="javascript:void();" id="cp-btn" class="js-zclip click-copy fr"></a><span id="copy-success" class="fr"></span><div class="clearfix"></div></div>
			  </div>
              </td>
            </tr>
</table>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>