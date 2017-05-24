<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='绑定银行卡';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;资金明细";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script type="text/javascript" src="/e/ecmsshop/withdrawal/js/layer.js"></script>
<script type="text/javascript" src="/e/ecmsshop/withdrawal/js/withdrawal.js"></script>
<link href="/e/ecmsshop/withdrawal/css/withdrawal.css" rel="stylesheet" type="text/css" />

<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>绑定银行卡</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i> 提示：绑定的银行卡姓名和您 <font color="#FF7600">注册时</font> 填写的真实姓名一致才可以进行转账。 </div>
      <div class="tab">
        <ul>
          <li class="tabhover"><a href="/e/ecmsshop/withdrawal/cashbind.php">绑定银行卡</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
        <input type="hidden" name="enews" value="addcard">
        <div id="edituserxx">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
              <tr>
                <td>真实姓名</td>
                <td>&nbsp;&nbsp;
                  <?
                    $truename=$add[truename]?$add[truename]:'<a href="/e/member/EditInfo/" class="c4095ce">设置姓名</a>';
					echo $truename;
				  ?></td>
              </tr>
              <tr>
                <td>银行</td>
                <td><dl class="select" id="Bank" inputname="bankname">
                    <dt class="">中国银行</dt>
                    <dd style="display: none;">
                      <ul>
                        <li val="中国工商银行">中国工商银行</li>
                        <li val="招商银行">招商银行</li>
                        <li val="中国银行" class="tab-nav">中国银行</li>
                        <li val="中国建设银行">中国建设银行</li>
                        <li val="中国农业银行">中国农业银行</li>
                        <li val="中国邮政储蓄银行">中国邮政储蓄银行</li>
                      </ul>
                    </dd>
                  </dl></td>
              </tr>
              <tr>
                <td>开户城市</td>
                <td><input name="city" type="text" id="city" value=""></td>
              </tr>
              <tr>
                <td>开户行</td>
                <td><input name="khbank" type="text" id="khbank" value="" size="40"></td>
              </tr>
              <tr>
                <td>银行卡号</td>
                <td><input name="card" type="text" id="card" value="" size="40"></td>
              </tr>
              <tr>
                <td>确认卡号</td>
                <td><input name="recard" type="text" id="recard" value="" size="40"></td>
              </tr>
            </tbody>
          </table>
          <div class="pl78">
            <input type="button" value="确定" class="button small green" onClick="addcard();">
          </div>
          <h3 class="mt20" style="color:#555; border-bottom:1px solid #ddd">已绑定的银行卡</h3>
          <div class="addresslist" style="margin:10px 0;">
            <table>
              <thead>
                <tr>
                  <th class="w70">姓名</th>
                  <th class="w180">银行</th>
                  <th>开户行</th>
                  <th class="w180">卡号</th>
                </tr>
              </thead>
              <tbody>
<?
$sql=$empire->query("select * from {$dbtbpre}tixian_bank where userid='$user[userid]' order by id desc");
if (mysql_num_rows($sql) < 1) {echo '<tr><td colspan="4">暂未绑定银行卡</td></tr>';}
while($r=$empire->fetch($sql))
{
?>
                <tr>
                  <td><?=$r[name]?></td>
                  <td><?=$r[bankname]?></td>
                  <td><?=$r[city]?> <?=$r[khbank]?></td>
                  <td><?=$r[cardnum]?></td>
                </tr>
<?
}
?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
