<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='我的返利记录';
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<link href="/e/extend/fanli/css/fanli.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/e/extend/fanli/js/invite.js"></script>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>我的返利</h3>
      <div class="yuer f12 p20">会员等级: <span class="csh"><?=$tmgetgroupname?></span><span class="ml30">可用余额: <span class="csh f20">￥<?=number_format($user[money],2)?></span></span> <span class="ml30">剩余积分: <span class="csh f20"><?=$user[userfen]?></span></span></div>
      <div class="tab">
        <ul>
          <li><a href="/e/member/fanli/">我的推广链接</a></li>
          <li class="tabhover"><a href="/e/member/fanli/list.php">返利记录</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <!--下面改为返利宣传图-->
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      您推广的会员购买商品,您获得的返利信息明细!
	  </div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="left">返利订单号</th>
        <th class="w70">返利金额</th>
        <th class="w70">返利点数</th>
        <th class="row w6">返利状态</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (mysql_num_rows($sql) < 1) {echo '<tr><td colspan="4">暂无返利记录</td></tr>';}
		while($r=$empire->fetch($sql))
		{
			$zt=$r[isfanli]?"<font color='green'>已返利</font>":"待返利";
		?>
        <tr> 
              <td height="25" class="left"><?=$r[ddno]?></td>
              <td> <div align="center"><?=$r[flmoney]?>元</div></td>
              <td><div align="center"><?=$r[fljifen]?>点</div></td>
              <td> <div align="center"><?=$zt?></div></td>
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