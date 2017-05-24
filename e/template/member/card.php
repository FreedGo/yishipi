<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='点卡充值';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;点卡充值";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function GetFen1()
{
var ok;
ok=confirm("确认要充值?");
if(ok)
{
document.GetFen.Submit.disabled=true
return true;
}
else
{return false;}
}
</script>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>红包冲值</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      当您收到我们赠予的红包,可以到这边来充值兑换哦!
	  </div>
      <div class="tab">
        <div class="ddsearch fr"><a href="#" class="c4095ce">充值帮助>></a></div>
        <ul>
          <li class="tabhover"><a href="#">红包充值</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div id="edituserxx">
<form name=GetFen method=post action=../doaction.php onsubmit="return GetFen1();">
    <input type=hidden name=enews value=CardGetFen>
      	<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tbody><tr><td width="25%" height="25" bgcolor="ffffff">冲值到的用户：</td><td bgcolor="ffffff">
<input name="username" type="text" id="username" value="<?=$user[username]?>"></td></tr>
<tr><td height="25" bgcolor="ffffff">重复用户：</td><td bgcolor="ffffff"><input name="reusername" type="text" id="reusername" value="<?=$user[username]?>">
</td></tr>
<tr><td width="16%" height="25" bgcolor="ffffff">红包卡号：</td><td bgcolor="ffffff"><input name="card_no" type="text" id="card_no" size="60">
</td></tr>
<tr><td width="16%" height="25" bgcolor="ffffff">红包密码：</td><td bgcolor="ffffff"><input name="password" type="password" id="password" size="60">
</td></tr>
</tbody></table>
	  <div class="pl78"><input type="submit" name="Submit" value="确定充值" class="button small gray"></div>
</form>
      </div>
      
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>