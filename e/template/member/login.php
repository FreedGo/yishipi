<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员登录';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;会员登录";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<form name="form1" method="post" action="../doaction.php">
    <input type=hidden name=ecmsfrom value="<?=ehtmlspecialchars($_GET['from'])?>">
    <input type=hidden name=enews value=login>
	<input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
<div class="loginbox">
    	<div class="block">
        	<div class="loginform">
            	<h1>已有登陆帐号</h1>
                <ul>
                	<li class="inputfont"><input type="text" class="input" name="username" value="" placeholder="用户名"></li>
                    <li class="inputfont"><input type="password" class="input" name="password" value="" placeholder="密码"></span></li>
<?php
	if($public_r['loginkey_ok'])
	{
?>
                    <li><input type="text" class="input" name="key" value="验证码" onBlur="if(this.value=='') this.value='验证码';" onFocus="if(this.value=='验证码') this.value='';" style="width:80px; height:10px; padding:5px 15px; float:left; margin-right:5px;"> <img src="../../ShowKey/?v=login" onClick="this.src='../../ShowKey/?v=login&'+Math.random();" alt="点击刷新验证码"></li>
<? } ?>
                    <li><input type="checkbox" name="lifetime" value="315360000" class="fl" id="lifetime"><label for="lifetime"><a>保持登陆</a></label> | <a class="reg" href="/e/member/register/index.php?tobind=0&groupid=1">免费注册</a> | <a class="fp" href="../GetPassword/" target="_blank">忘记密码?</a> </li>
                    <li><input type="submit" class="loginbtn" value="登 录"></li>
                </ul>
                <h1>使用第三方帐号登陆</h1>
                <div class="third-login"> <a hidefocus="true" href="/e/memberconnect/?apptype=qq" class="qq" target="_blank">QQ</a> <a hidefocus="true" href="/e/memberconnect/?apptype=sina" class="sina" target="_blank">新浪微博</a></div>
            </div>
        </div>
</div>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>