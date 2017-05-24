<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='帐号状态';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;帐号状态";
require(ECMS_PATH.'e/template/incfile/header.php');
$bili=round($r[userfen]/10000*100,2);
?>
<style>
.havejf{ width:<?=$bili?>%;}
</style>
<div class="hymain">
  <div class="block">
  	<? require(ECMS_PATH.'e/template/incfile/leftside1.php');?>
  	<div class="fr rmain noborder">
      <div class="jifen">
      	<div class="fl jfbox">
        	<img src="<?=$userpic?>" class="fl" width="60" height="60">
            <div class="hyxx">
            	<span class="bold"><?=$user[username]?></span><br>
                <span class="corg"><?=$level_r[$r[groupid]][groupname]?></span><br>
                <span class="c666">注册时间: <?=$registertime?></span>
            </div>
        </div>
        <div class="jfz fl">
        	<span class="c666">当前积分：</span><span class="corg"><?=$r[userfen]?></span>
            <div class="jflevel"><div class="havejf"><span></span></div><em class="jf0">0</em><em class="jf25">2500</em><em class="jf50">5000</em><em class="jf75">7500</em></div>
            <div class="needlevel"><?=$havemsg?></div>
            
        </div>
        <div class="clearfix"></div>
      </div>
      <h3>帐户信息 <span class="f12 noBold c999">您的会员注册信息</span></h3>
      <div class="anquan">
        <div class="aqyz fl c666">
        	<ul>
            	<li><span class="w90"><i class="aqicon aqsuccess"></i>用户ID:</span><span class="w70 corg"><?=$user[userid]?></span><div class="clearfix"></div></li>
                <li><span class="w90"><i class="aqicon aqsuccess"></i>会员等级:</span><span class="w70"><?=$level_r[$r[groupid]][groupname]?></span><div class="clearfix"></div></li>
                <li><span class="w90"><i class="aqicon aqsuccess"></i>剩余有效期:</span><span class="w70"><?=$userdate?>
      天</span><div class="clearfix"></div></li>
                <li><span class="w90"><i class="aqicon aqsuccess"></i>剩余点数:</span><span class="w70"><?=$r[userfen]?>
      点</span><div class="clearfix"></div></li>
                <li><span class="w90"><i class="aqicon aqsuccess"></i>帐户余额:</span><span class="w70"><?=$r[money]?>
      元</span><div class="clearfix"></div></li>
                <li><span class="w90"><i class="aqicon aqsuccess"></i>新短消息:</span><span class="w70"><?=$havemsg?></span><div class="clearfix"></div></li>
            </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  	<div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>