<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员中心';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>";
require(ECMS_PATH.'e/template/incfile/header.php');
$bili=round($r[userfen]/10000*100,2);
?>
<style>
.havejf{ width:<?=$bili?>%;}
</style>
<div class="hymain">
  <div class="block">
  	<? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
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
      <h3>帐户安全 <span class="f12 noBold c999">我们会对您的个人资料隐私加以保密</span></h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      提升您的帐户安全,保护您的资金安全!
	  </div>
      <div class="anquan">
<?
	$dj=0; //已完善项目
	$totaldj=2; //总项目
	if($addr[phone]){
		$phone='<i class="aqicon aqsuccess"></i>手机号</span><span class="w70">已设置</span><span class="w250 c999">您验证的手机: '.$addr[phone].'</span>';	
		$dj++;
	} else {
		$phone='<i class="aqicon aqwarn"></i>手机号</span><span class="w70 corg">未设置</span><span class="w250 c999">设置手机号,我们会提醒您一些信息!</span>';	
	}
	if($user[email]){
		$email='<i class="aqicon aqsuccess"></i>邮箱</span><span class="w70">已设置</span><span class="w250 c999">您验证的邮箱: '.$user[email].'</span>';	
		$dj++;
	} else {
		$email='<i class="aqicon aqwarn"></i>邮箱</span><span class="w70 corg">未设置</span><span class="w250 c999">设置正确的邮箱,我们会提现您订单信息等</span>';	
	}
	$a=$dj/$totaldj;
	switch($a){
		case ($a=="0"):$djbl="0";break;
		case ($a>0 && $a<=0.1):$djbl="7";break;
		case ($a>0.1 && $a<=0.2):$djbl="14";break;
		case ($a>0.2 && $a<=0.3):$djbl="28";break;
		case ($a>0.3 && $a<=0.4):$djbl="35";break;
		case ($a>0.4 && $a<0.5):$djbl="42";break;
		case ($a=="0.5"):$djbl="50";break;
		case ($a>0.5 && $a<=0.6):$djbl="57";break;
		case ($a>0.6 && $a<=0.7):$djbl="64";break;
		case ($a>0.7 && $a<=0.8):$djbl="78";break;
		case ($a>0.8 && $a<=0.9):$djbl="85";break;
		case ($a>0.9 && $a<1):$djbl="92";break;
		case ($a==1):$djbl="100";break;
		default:$djbl=="0";
	}
?>
      	<div class="aqbox fl">
        	<p class="center">您的安全等级</p>
            <div class="aqpic aqpic<?=$djbl?>">
            </div>
        </div>
        <div class="aqyz fl c666">
        	<ul>
            	<li><span class="w90"><?=$phone?><span class="fr w90"><a href="/e/member/EditInfo/" class="cblue">修改</a></span><div class="clearfix"></div></li>
                <li><span class="w90"><?=$email?><span class="fr w90"><a href="/e/member/EditInfo/EditSafeInfo.php" class="cblue">修改</a></span><div class="clearfix"></div></li>
                <li><span class="w90"><?=$question?><div class="clearfix"></div></li>
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