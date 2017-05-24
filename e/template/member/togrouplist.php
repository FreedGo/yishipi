<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员组兑换记录';
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>会员组兑换记录</h3>
            <div class="yuer f12 p20">会员等级: <span class="csh"><?=$tmgetgroupname?></span><span class="ml30">可用余额: <span class="csh f20">￥<?=number_format($user[money],2)?></span></span> <span class="ml30">剩余积分: <span class="csh f20"><?=$user[userfen]?> </span>点</span> </div>
      <div class="tab">
        <ul>
          <li><a href="/e/member/togroup/">兑换会员组</a></li>
          <li class="tabhover"><a href="/e/member/togroup/list.php">兑换记录</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      以下是您的会员组兑换记录
	  </div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="w6">原会员组</th>
        <th class="w6">兑换会员组</th>
        <th class="w70">兑换天数</th>
        <th class="w70">扣除点数</th>
        <th class="left">兑换时间</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (mysql_num_rows($sql) < 1) {echo '<tr><td colspan="5"><div class="center" style="padding:20px 0;">暂无兑换记录</div></td></tr>';}
		while($r=$empire->fetch($sql))
		{
		?>
        <tr>
        <td><?=$grouparr[$r[groupid]]?></td>
        <td><?=$grouparr[$r[togroupid]]?></td>
        <td><?=$r[day]?>天</td>
        <td><?=$r[point]?>点</td>
        <td class="left"><?=date('Y-m-d H:i:s',$r[dhtime])?></td>
        </tr>
        <?php
		}
		?>
        <? if ($returnpage){?>
        <tr>
        <td colspan="4" class=""><?=$returnpage?></td>
        </tr>
        <? } ?>
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