<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='点卡充值记录';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;点卡充值记录";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>充值记录</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      在线充值,红包充值记录都可以在这里看到呦!
	  </div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="w6 phonehide">充值类型</th>
        <th class="left">充值卡号</th>
        <th class="w70 phonehide">充值金额</th>
        <th class="w70 phonehide">购买点数</th>
        <th class="w6 phonehide">有效期</th>
        <th class="row w6">购买(充值) 时间</th>
        </tr>
        </thead>
        <tbody>
		<?php
		while($r=$empire->fetch($sql))
		{
			//类型
			if($r['type']==0)
			{
				$type='红包充值';
			}
			elseif($r['type']==1)
			{
				$type='在线充值';
			}
			elseif($r['type']==2)
			{
				$type='充值点数';
			}
			elseif($r['type']==3)
			{
				$type='充值金额';
			}
			else
			{
				$type='';
			}
		?>
        <tr>
        <td class="phonehide"><?=$type?></td>
        <td class="left"><?=$r[card_no]?></td>
        <td class="phonehide"><?=$r[money]?></td>
        <td class="phonehide"><?=$r[cardfen]?></td>
        <td class="phonehide"><?=$r[userdate]?></td>
        <td class="row f-tar"><?=format_datetime($r[buytime],'Y-m-d')?></td>
        </tr>
        <?php
		}
		?>
        <? if ($returnpage){?>
        <tr>
        <td colspan="6" class=""><?=$returnpage?></td>
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