<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='订单列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;订单列表";
require(ECMS_PATH.'e/template/incfile/header.php');
$dtjnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where haveprice='0' and checked='0' and payfsid<>'5' and userid='$user[userid]'");
$dshnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where outproduct='1' and checked<>'1' and userid='$user[userid]' or payfsid='5'");
$dthnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='3' and userid='$user[userid]'");
$ywcnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='1' and userid='$user[userid]'");
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>买家订单</h3>
       <div class="tips"><!--我的订单提醒：待提交<span>（<?=$dtjnum?>）</span> 待收货<span>（<?=$dshnum?>）</span> 待退货<span>（<?=$dthnum?>）</span> 已完成<span>（<?=$ywcnum?>）</span>--></div>
      <div class="tab">
        <div class="ddsearch fr">订单查询：
          <form name="form1" method="get" action="index.php">
          	<input name="sear" type="hidden" id="sear2" value="1">
            <input type="text" name="keyboard" value="<?=$keyboard?$keyboard:'请输入订单号'?>" onBlur="if(this.value=='') this.value='请输入订单号';" onFocus="if(this.value=='请输入订单号') this.value='';">
            <input type="submit" value="" class="w-search">
          </form>
        </div>
        <ul>
          <li<?if (!$zt){echo ' class="tabhover"';}?>><a href="/e/ShopSys/ListDd/">所有订单</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div class="bstable mt10">
        <table>
          <thead>
            <tr>
              <th class="" style="white-space:nowrap;overflow:hidden;word-break:break-all;">商品</th>
              <th class="w1">单价(元)</th>
              <th class="w2">数量</th>
              <th class="w6">实付金额(元)</th>
              <th class="w4">订单状态</th>
            </tr>
          </thead>
        </table>
      </div>
      <div id="alllist">
<div class="m-odit">
<?php
$uid=getcvar('mluserid');
$sql=$empire->query("select * from {$dbtbpre}enewsshopdd where shanguid='$uid'");
while($r=$empire->fetch($sql)){
	$shop=$empire->fetch1("select * from {$dbtbpre}ecms_shop where id='$r[shangpid]' and ismember=1");
?>
          <table>
            <thead>
              <tr>
                <th colspan="6"> <span class="se">订单号：<?=$r[ddno]?></span> <span class="se">订购日期：<?=$r[ddtime]?></span></th>
              </tr>
            </thead>
            <tbody>
              <!--<tr>
                <td class="w1"><img width="50" height="50" src="<?=$shop['titlepic']?>" alt="<?=$title?>"></td>
                <td class="left"><a href="<?=$shop[titleurl]?>" target="_blank"><?=$shop[title]?></a></td>
                <td class="w1"><span class="del">¥<?=$shop['tprice']?></span><br><span class="csh">¥<?=$shop[price]?></span></td>
                <td class="w2"><span class="c999"><?=$r['alltotal']?></span></td>
              </tr>-->
              <tr>
                <td class="w1"><img width="50" height="50" src="<?=$shop['titlepic']?>" alt="<?=$shop[title]?>"></td>
                <td class="left"><a href="<?=$shop[titleurl]?>" target="_blank"><?=$shop[title]?></a></td>
                <td class="w1"><span class="del">¥<?=$shop['tprice']?></span><br><span class="csh">¥<?=$shop[price]?></span></td>
                <td class="w2"><span class="c999"><?=$r[havecutnum]?></span></td>
                <td class="w6" rowspan="1"><span class="bold"><?=$r[alltotal]?></span><br>
                  <span class="c999">(含运费<?=$r[pstotal]?>)</span></td>
                <td class="w4" rowspan="1">
                <?
                	if ($r[payfsid]=="5"){echo '<a href="javascript:void()" target="_blank" class="btn btn-red"><span class="inner">货到付款</span></a><br>';} elseif ($r[haveprice]=="0"){echo '<a href="/e/ShopSys/doaction.php?ddid='.$r[ddid].'&enews=ShopDdToPay" target="_blank" class="btn btn-red"><span class="inner">付&nbsp;&nbsp;&nbsp;&nbsp;款</span></a><br>';} else{};
					if ($r[checked]=='1'){echo "已完成<br>";} elseif($r[checked]=='2'){echo "订单已取消<br>";} elseif($r[checked]=='3'){echo "已申请退货<br>";}else{};
					if ($r[outproduct]=='1' && $r[checked]!="1" && $r[checked]!="1"){echo "已发货<br><div class='kdname'><span class='corg'>查看物流</span><div class='wuliu' title='".$r[kdname]."' num='".$r[kdnum]."'>快递名称: ".$r[kdname]."<br>快递单号: ".$r[kdnum]."<br>正在查询此快递信息..<p class='center'><img src='/eshop/skin/ajax-loader.gif'></p></div></div>";} elseif($r[outproduct]=='2'){echo "备货中<br>";} elseif($r[outproduct]=='0' && $r[haveprice]=="1"){echo "等待发货<br>";}else{};
				?>
                  <?=$doing?>
                  <a href="../ShowDd/?ddid=<?=$r[ddid]?>" target="_blank" class="s-fc9">订单详情</a><br></td>
              </tr>


            </tbody>
          </table>
<?php
}
?>
        </div>

      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>