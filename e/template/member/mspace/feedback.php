<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='管理反馈';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;管理反馈";
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
      <h3>管理主页反馈</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      以下是您的空间会员反馈信息!
	  </div>
      <div class="tab">
        <ul>
          <li class="tabhover"><a href="#">反馈列表</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<div class="addresslist">
<form name="feedbackform" method="post" action="index.php" onsubmit="return confirm('确认要删除?');">
        <table>
        <thead>
        <tr>
        <th class="w10" style="white-space:nowrap;overflow:hidden;word-break:break-all;"><input type='checkbox' name='chkall' value='on' onClick='CheckAll(this.form)'></th>
        <th class="w70" style="white-space:nowrap;overflow:hidden;word-break:break-all;">反馈者</th>
        <th class="left" style="white-space:nowrap;overflow:hidden;word-break:break-all;">标题(点击查看)</th>
        <th class="w6" style="white-space:nowrap;overflow:hidden;word-break:break-all;">提交时间</th>
        <th class="row w180" style="white-space:nowrap;overflow:hidden;word-break:break-all;">操作</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (mysql_num_rows($sql) < 1){echo '<tr><td colspan="5">暂无留言</td></tr>';}
		while($r=$empire->fetch($sql))
		{
			if($r['uid'])
			{
				$r['uname']="<a href='../../space/?userid=$r[uid]' target='_blank'>$r[uname]</a>";
			}
			else
			{
				$r['uname']='游客';
			}
		?>        <tr>
        <td><input name="fid[]" type="checkbox" value="<?=$r[fid]?>"></td>
        <td><?=$r['uname']?></td>
        <td class="left"><a href="#ecms" onclick="window.open('ShowFeedback.php?fid=<?=$r[fid]?>','','width=650,height=600,scrollbars=yes,top=70,left=100');"><?=$r[title]?></a></td>
        <td><?=format_datetime($r[addtime],'Y-m-d')?></td>
        <td class="row f-tar"><a href="index.php?enews=DelMemberFeedback&fid=<?=$r[fid]?>" onclick="return confirm('确认要删除?');">删除</a></td>
        </tr>
        <?php
		}
		?>
        <tr>
        <td></td>
        <td colspan="4" class="left"><input type='submit' name='submit' value='批量删除' class="button small gray"><input name="enews" type="hidden" id="enews" value="DelMemberFeedback_All"></td>
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