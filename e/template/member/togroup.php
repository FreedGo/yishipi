<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='积分兑换会员组';
require(ECMS_PATH.'e/template/incfile/header.php');
?>

<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>积分兑换会员组</h3>
      <div class="yuer f12 p20">会员等级: <span class="csh"><?=$tmgetgroupname?></span><span class="ml30">可用余额: <span class="csh f20">￥<?=number_format($user[money],2)?></span></span> <span class="ml30">剩余积分: <span class="csh f20"><?=$user[userfen]?> </span>点</span></div>
      <div class="tab">
        <div class="ddsearch fr"><a href="/e/payapi/" class="c4095ce">充值积分>></a></div>
        <ul>
          <li class="tabhover"><a href="/e/member/togroup/">兑换会员组</a></li>
          <li><a href="/e/member/togroup/list.php">兑换记录</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<form name="payform" method="post" action="/e/ecmsshop/fenTogroup/index.php">
      <div id="edituserxx" class="addresslist">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
          <thead>
        <tr>
        <th class="w30">选择</th>
        <th class="w6">会员组</th>
        <th class="w6">兑换到的会员组</th>
        <th class="w70">兑换时间</th>
        <th class="w70">所需点数</th>
        </tr>
        </thead>
            <tbody>
    </tr>
    <?
  while($r=$empire->fetch($sql))
  {
  ?>
              <tr>
                <td><input type="radio" name="id" value="<?=$r[id]?>"></td>
                <td><?=$grouparr[$r[groupid]]?></td>
                <td><?=$grouparr[$r[togroupid]]?></td>
                <td><?=$r[day]?>天</td>
                <td><?=$r[point]?>点</td>
              </tr>
    <?
  }
  ?>
            </tbody>
          </table>
        </div>
      <div id="chongzhi" class="pl20">
                <ul>
                    <li class="center"><input type="submit" name="Submit" value="确定兑换" class="rbutton"></li>
                </ul>
            
        </div>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>