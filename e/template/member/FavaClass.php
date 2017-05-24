<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='收藏夹分类';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../fava/>收藏夹</a>&nbsp;>&nbsp;管理分类";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function DelFavaClass(cid)
{
var ok;
ok=confirm("确认要删除?");
if(ok)
{
self.location.href='../../doaction.php?enews=DelFavaClass&cid='+cid;
}
}
</script>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>我的收藏分类</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      合理设置收藏商品分类,更容易找到您收藏过的商品。
	  </div>
            <div class="yuer f14 pl20 bold"><span class="csh">增加收藏夹分类</span></div>
      <div id="edituserxx">
        <form name="form1" method="post" action="../../doaction.php">
        <input name="enews" type="hidden" id="enews" value="AddFavaClass">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tbody>
    <tr bgcolor="#FFFFFF">
      <td width="22%" height="25">分类名称：</td>
      <td width="78%" height="25"><input name="cname" type="text" value="" size="60"></td>
    </tr>
</tbody></table>
	  <div class="pl78"><input type="submit" name="Submit" value="确定增加" class="button small gray"></div>
      </form>
      </div>
      <div class="yuer f14 pl20 bold"><span class="csh">收藏分类列表</span></div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="w1">ID</th>
        <th class="left">分类名称</th>
        <th class="row w180">操作</th>
        </tr>
        </thead>
        <tbody>
		<?php
		while($r=$empire->fetch($sql))
		{
		?>
          <form name=form method=post action=../../doaction.php>
          <input name="enews" type="hidden" id="enews" value="EditFavaClass">
          <input name="cid" type="hidden" value="<?=$r[cid]?>">
          <tr>
          <td><?=$r[cid]?></td>
          <td class="left"><input name="cname" type="text" id="cname" value="<?=$r[cname]?>" size="40" class="input_text"></td>
          <td class="row f-tar"><input type="submit" name="Submit2" value="修改" class="button green small"><input type="button" name="Submit3" value="删除" onclick="javascript:DelFavaClass(<?=$r[cid]?>);" class="button blue small"></td>
          </tr>
          </form>
		<?php
		}
		?>
        </tbody>
        </table>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>