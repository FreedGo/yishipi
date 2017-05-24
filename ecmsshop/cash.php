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
$s=$empire->fetch1("select * from {$dbtbpre}tixian_config limit 1");
?>
<script type="text/javascript" src="/e/ecmsshop/withdrawal/js/layer.js"></script>
<script type="text/javascript" src="/e/ecmsshop/withdrawal/js/withdrawal.js"></script>
<link href="/e/ecmsshop/withdrawal/css/withdrawal.css" rel="stylesheet" type="text/css" />

<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>提现申请</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i> 提示：您可以把帐户余额申请提现到自己的银行卡!。 </div>
      <div class="yuer f12 p20 pt5">会员名: <span class="csh">
        <?=$user[username]?>
        </span> &nbsp;&nbsp;&nbsp;&nbsp;帐户余额: <span class="csh">
        <?=$user[money]?>
        元</span></div>
      <div class="tab">
        <ul>
          <li class="tabhover"><a href="/e/ecmsshop/withdrawal/">提现申请</a></li>
          <li><a href="/e/ecmsshop/withdrawal/cashlist.php">提现记录</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<?
$r=$empire->fetch1("select * from {$dbtbpre}tixian_bank where userid='$user[userid]'");
if(!$r[id]){
?>
      <a href="/e/ecmsshop/withdrawal/cashbind.php" class="bangd" id="bangd">
            <i></i>您还未绑定提现账号， 
            <span class="c-b">立即绑定</span>
      </a>
<?
} else {
?>
        <input type="hidden" name="enews" value="EditInfo">
        <div id="edituserxx">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
              <tr>
                <td>选择银行卡</td>
                <td>
                    <dl class="select select-1 ecmsshoptab" id="Bank" inputname="cardid">
                      <dt class="">请选择绑定的银行卡</dt>
                      <dd style="display: none;">
                        <ul>
<?
$sql=$empire->query("select * from {$dbtbpre}tixian_bank where userid='$user[userid]' order by id desc");
while($r=$empire->fetch($sql))
{
	$wh=substr($r[cardnum],strlen($r[cardnum])-4,4);
?>
                          <li val="<?=$r[id]?>"><?=$r[bankname]?> 尾号:<?=$wh?></li>
<?
}
?>
                        </ul>
                      </dd>
                    </dl>
                  </td>
              </tr>
              <tr>
                <td>提现金额</td>
                <td><input name="money" type="text" id="money" value="" min="<?=$s[money]?>"></td>
              </tr>
            </tbody>
          </table>
          <div class="pl78">
            <input type="button" name="Submit" value="提交申请" class="button small green" onClick="tixian()">
          </div>
          <h3 class="mt20" style="color:#555; border-bottom:1px solid #ddd">提现须知</h3>
          <ul class="txxz">
                <li class="cred">1、提现金额最低<?=$s[money]?>元起。</li>
                <li>2、通过银行卡提现的每周发放两次（周二和周五）。</li>
                <li>3、提现时请确认自己的收款账号无误，支付后由于收款账号问题造成的资金退回、冻结、消失本站概不负责。</li>
            </ul>
        </div>
<?
}
?>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
