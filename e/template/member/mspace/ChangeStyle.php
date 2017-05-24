<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='选择空间模板';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;选择空间模板";
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
        <ul>
          <li><a href="/e/member/mspace/SetSpace.php">设置我的主页</a></li>
          <li class="tabhover"><a href="/e/member/mspace/ChangeStyle.php">选择主页模板</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
        <div id="favlist" class="yh">
      		<ul>
<?
$sql=$empire->query($query);
$b=0;
$ti=0;
$tlistvar=$temp;
while($r=$empire->fetch($sql))
{
	$b=1;
	$ti++;
	if(empty($r[stylepic]))
	{
		$r[stylepic]="../../data/images/notemp.gif";
	}
	//当前模板
	if($r['styleid']==$addr[spacestyleid])
	{
		$r[stylename]='<b>'.$r[stylename].'</b>';
	}
?>
<li><img src='<?=$r[stylepic]?>' alt="<?=$r[stylesay]?>">
<span class='price mt5'><a href='index.php?enews=ChangeSpaceStyle&styleid=<?=$r[styleid]?>' class="button small green" title="<?=$r[stylesay]?>">选定</a></span> </li>
<?
	if($ti>=4)
	{
		$templist.=$tlistvar;
		$tlistvar=$temp;
		$ti=0;
	}
}
?>
                <div class="clearfix"></div>
            </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?=$templist?></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>