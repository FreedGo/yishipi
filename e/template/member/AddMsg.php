<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='发送消息';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../msg/>消息列表</a>&nbsp;>&nbsp;发送消息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>发送消息</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      发送成功后将会在会员首页进行提醒呦!
	  </div>
<form action="../../doaction.php" method="post" name="sendmsg" id="sendmsg">
        <input name="enews" type="hidden" id="enews" value="AddMsg">
        <div id="edituserxx">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 70px;">标题</td>
                <td bgcolor="" width=""><input name="title" type="text" id="title2" value="<?=ehtmlspecialchars(stripSlashes($title))?>" size="43"></td>
              </tr>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 70px;">接收者</td>
                <td bgcolor="" width=""><input name="to_username" type="text" id="to_username2" value="<?=$username?>">
                [<a href="#EmpireCMS" onclick="window.open('../../friend/change/?fm=sendmsg&f=to_username','','width=250,height=360');">选择好友</a>] </td>
              </tr>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 70px;">内容</td>
                <td bgcolor="" width=""><textarea name="msgtext" cols="60" rows="12" id="textarea"><?=ehtmlspecialchars(stripSlashes($msgtext))?></textarea></td>
              </tr>
            </tbody>
          </table>
          <div class="pl78">
            <input type="submit" name="Submit" value="发送" class="button small green"> <input type="reset" name="Submit2" value="重置" class="button small gray">
          </div>
        </div>
      </form>    
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>