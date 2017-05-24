<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='管理留言';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;管理留言";
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
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>管理主页留言</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      您可以及时查看并回复有人给您的空间留言哦!
	  </div>
      <div class="tab">
        <ul>
          <li class="tabhover"><a href="#">留言列表</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<div class="addresslist">
<form name="gbookform" method="post" action="index.php" onsubmit="return confirm('确认要删除?');">
        <table>
        <thead>
        <tr>
        <th class="w10" style="white-space:nowrap;overflow:hidden;word-break:break-all;"></th>
        <th class="w70" style="white-space:nowrap;overflow:hidden;word-break:break-all;">留言者</th>
        <th class="left" style="white-space:nowrap;overflow:hidden;word-break:break-all;">留言内容</th>
        <th class="w6" style="white-space:nowrap;overflow:hidden;word-break:break-all;">留言时间</th>
        <th class="row w180">操作</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (mysql_num_rows($sql) < 1){echo '<tr><td colspan="5">暂无留言</td></tr>';}
		while($r=$empire->fetch($sql))
		{
			$i++;
			$bgcolor=" class='tableborder'";
			if($i%2==0)
			{
				$bgcolor=" bgcolor='#ffffff'";
			}
			$private='';
			if($r['isprivate'])
			{
				$private='*悄悄话* / ';
			}
			$msg='';
			if($r['uid'])
			{
				$msg="<a href='../msg/AddMsg/?username=$r[uname]' target='_blank' class='cgren'>消息回复</a>";
				$r['uname']="<b><a href='../../space/?userid=$r[uid]' target='_blank'>$r[uname]</a></b>";
			}
			$gbuname=$private.$r[uname]." / 留言于 ".$r[addtime]." / ip: ".$r[ip].$msg;
		?>
        <tr>
        <td><input name="gid[]" type="checkbox" id="gid[]" value="<?=$r[gid]?>"></td>
        <td><?=$r[uname]?></td>
        <td class="left"><span class="cgren"><?=$private?></span><?=nl2br($r['gbtext'])?></td>
        <td><?=format_datetime($r[addtime],'Y-m-d')?></td>
        <td class="row f-tar"><a href="#ecms" onclick="window.open('ReGbook.php?gid=<?=$r[gid]?>','','width=600,height=380,scrollbars=yes');">回复</a> | <a href="index.php?enews=DelMemberGbook&gid=<?=$r[gid]?>" onclick="return confirm('确认要删除?');">删除</a> | <?=$msg?></td>
        </tr>
        <?php
		}
		?>
        <tr>
        <td></td>
        <td colspan="4" class="left"><input type='submit' name='submit' value='批量删除' class="button small gray"><input name="enews" type="hidden" id="enews" value="DelMemberGbook_All"></td>
        </tr>
        <? if ($returnpage){?>
        <tr>
        <td colspan="5"><?=$returnpage?></td>
        </tr>
        <? } ?>
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