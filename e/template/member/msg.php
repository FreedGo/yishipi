<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='消息列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;消息列表&nbsp;&nbsp;(<a href='AddMsg/?enews=AddMsg'>发送消息</a>)";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script> 
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php'); ?>
    <div class="fr rmain">
      <h3>我的站内消息</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      <?
		if($num1){ echo '您有未读的消息哦!';} else {echo '暂时没有未读的消息!';}
	  ?>
	  </div>

      <div class="addresslist">
<form name="listmsg" method="post" action="../doaction.php" onsubmit="return confirm('确认要删除?');">
        <table>
        <thead>
        <tr>
        <th class="w10"></th>
        <th class="left">消息标题</th>
        <th class="w1">发送者</th>
        <th class="w6">发送时间</th>
        <th class="row w90">操作</th>
        </tr>
        </thead>
        <tbody>
            <?php
			while($r=$empire->fetch($sql))
			{
				$img="haveread";
				if(!$r[haveread])
				{$img="nohaveread";}
				//后台管理员
				if($r['isadmin'])
				{
					$from_username="<a title='后台管理员'><b>".$r[from_username]."</b></a>";
				}
				else
				{
					$from_username="<a href='../ShowInfo/?userid=".$r[from_userid]."' target='_blank'>".$r[from_username]."</a>";
				}
				//系统信息
				if($r['issys'])
				{
					$from_username="<b>系统消息</b>";
					$r[title]="<span class='cblue'>".$r[title]."</span>";
				}
			?>
        <tr>
        <td><input name="mid[]" type="checkbox" id="mid[]2" value="<?=$r[mid]?>"></td>
        <td class="left"><img src="../../data/images/<?=$img?>.gif" style="vertical-align:bottom;"> <a href="ViewMsg/?mid=<?=$r[mid]?>"><?=stripSlashes($r[title])?></a></td>
        <td><?=$from_username?></td>
        <td><?=format_datetime($r[msgtime],'Y-m-d')?></td>
        <td class="row f-tar"><a href="ViewMsg/?mid=<?=$r[mid]?>" class="cblue">查看</a>&nbsp;&nbsp;<a href="../doaction.php?enews=DelMsg&mid=<?=$r[mid]?>" onclick="return confirm('确认要删除?');" class="cblue">删除</a></td>
        </tr>
            <?php
			}
			?>
        <tr>
        <td><input type=checkbox name=chkall value=on onclick=CheckAll(this.form)></td>
        <td colspan="4" class="left"><input type="submit" name="Submit" value="删除选中" class="button small gray"><input name="enews" type="hidden" value="DelMsg_all"></td>
        </tr>
        <? if ($returnpage){?>
        <tr>
        <td colspan="5" class=""><?=$returnpage?></td>
        </tr>
        <? } ?>
        <tr>
        <td colspan="5" class="">说明： <img src="../../data/images/nohaveread.gif" style="vertical-align:bottom;"> 代表未阅读消息， <img src="../../data/images/haveread.gif" style="vertical-align:bottom;"> 代表已阅读消息.</td>
        </tr>
        </tbody>
        </table>
</form>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>