<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='提现申请';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;资金明细";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>提现申请</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      提示：您可以把帐户余额申请提现到自己的银行卡!。
	  </div>
      <div class="yuer f12 p20 pt5">会员名: <span class="csh"><?=$user[username]?></span> &nbsp;&nbsp;&nbsp;&nbsp;帐户余额: <span class="csh"><?=$user[money]?> 元</span></div>
      <div class="tab">
        <ul>
          <li><a href="/e/ecmsshop/withdrawal/">提现申请</a></li>
          <li class="tabhover"><a href="/e/ecmsshop/withdrawal/cashlist.php">提现记录</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="w180">提现时间</th>
        <th class="w70">提现金额</th>
        <th>银行卡</th>
        <th class="w70">处理状态</th>
        <th class="w70">回执凭证</th>
         </tr>
        </thead>
        <tbody>
		<?php
		if (mysql_num_rows($sql) < 1){echo '<tr><td colspan="5">暂无提现记录!</td></tr>';}
		while($r=$empire->fetch($sql))
		{
			$s=$empire->fetch1("select * from {$dbtbpre}tixian_bank where id='$r[cardid]'");
			$wh=substr($s[cardnum],strlen($s[cardnum])-4,4);
			$zt=$r[zt]?'<font color="green">已处理</font>':'<font color="red">未处理</font>';
			$pic=$r[picurl]?'<a href="'.$r[picurl].'" target="_blank"><img src="/e/ecmsshop/withdrawal/css/picture.png"></a>':'<img src="/e/ecmsshop/withdrawal/css/pichui.png">';
		?>
        <tr>
        <td><?=format_datetime($r[addtime],'Y-m-d H:i:s')?></td>
        <td><img src="/e/ecmsshop/withdrawal/css/credit.png"><?=$r[money]?>元</td>
        <td><?=$s[bankname]?> 尾号:<?=$wh?></td>
        <td><?=$zt?></td>
        <td><?=$pic?></td>
        </tr>
        <?php
		}
		?>
        <? if ($returnpage){?>
        <tr>
        <td colspan="5" class=""><?=$returnpage?></td>
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