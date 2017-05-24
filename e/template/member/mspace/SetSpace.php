<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='设置空间';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;设置空间";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>设置主页</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i> 设置好主页信息后您的个人主页内容将有所变动哦！ </div>
      <div class="yuer f12 p20 pt5">会员名: <span class="csh">
        <?=$user[username]?>
        </span></div>
      <div class="tab">
        <div class="ddsearch fr"><a href="#" class="c4095ce">隐私申明>></a></div>
        <ul>
          <li class="tabhover"><a href="/e/member/mspace/SetSpace.php">设置我的主页</a></li>
         <!--<li><a href="/e/member/mspace/ChangeStyle.php">选择主页模板</a></li>-->
          <div class="clearfix"></div>
        </ul>
      </div>
      <form name="setspace" method="post" action="index.php">
        <input name="enews" type="hidden" id="enews" value="DoSetSpace">
        <div id="edituserxx">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 70px;">用户名</td>
                <td bgcolor="" width="">&nbsp;&nbsp;<?=$user[username]?></td>
              </tr>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 70px;">主页名称</td>
                <td bgcolor="" width=""><input name="spacename" type="text" id="spacename" value="<?=$addr[spacename]?>"></td>
              </tr>
              <tr>
                <td width="" height="25" bgcolor="" style="width: 70px;">主页公告</td>
                <td bgcolor="" width=""><textarea name="spacegg" cols="60" rows="6" id="spacegg"><?=$addr[spacegg]?></textarea></td>
              </tr>
            </tbody>
          </table>
          <div class="pl78">
            <input type="submit" name="Submit" value="确定修改" class="button small gray">
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