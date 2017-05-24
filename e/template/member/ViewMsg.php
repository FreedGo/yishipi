<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='查看消息';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../msg/>消息列表</a>&nbsp;>&nbsp;查看消息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php'); ?>
    <div class="fr rmain">
      <h3>消息内容</h3>
      <div id="edituserxx">
      	<table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tbody><tr><td width="25%" height="25" bgcolor="ffffff">发送者</td><td bgcolor="ffffff">
<?=$r[from_username]?>
</td></tr>
<tr><td width="16%" height="25" bgcolor="ffffff">标题</td><td bgcolor="ffffff"><?=stripSlashes($r[title])?>
</td></tr>
<tr><td width="16%" height="25" bgcolor="ffffff">发送时间：</td><td bgcolor="ffffff"><?=$r[msgtime]?>
</td></tr>
<tr><td width="16%" height="25" bgcolor="ffffff" valign="top">消息内容：</td><td bgcolor="ffffff"><?=nl2br(stripSlashes($r[msgtext]))?>
</td></tr>
<tr><td width="16%" height="25" bgcolor="ffffff">操作：</td><td bgcolor="ffffff"><a href="javascript:void();" onclick="javascript:history.go(-1);" class="button small gray">返回</a> <a href="../../doaction.php?enews=DelMsg&mid=<?=$mid?>" onclick="return confirm('确认要删除?');" class="button small green">删除</a>
</td></tr>
</tbody></table>
      </div>
      
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>