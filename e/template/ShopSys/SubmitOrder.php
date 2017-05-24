<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//显示配送方式
function ShowPs($pid){
	global $empire,$dbtbpre,$shoppr,$totalr;
	$pid=(int)$pid;
	$r=$empire->fetch1("select pid,pname,price,psay from {$dbtbpre}enewsshopps where pid='$pid' and isclose=0");
	if(empty($r[pid]))
	{
		printerror('请选择配送方式','',1,0,1);
	}
	//$r['price']=ShopSys_PrePsTotal($r['pid'],$r['price'],$totalr['truetotalmoney'],$shoppr);
	
	echo"
	<ul>
	<li><label>".$r[pname]."</label><span class='f12 corg ml10'>费用:￥".$r['price']."</span><span class='ml10 f12 c999'>".$r[psay]."</span></li>
	</ul>";
	return $r['price'];
}

//显示支付方式
function ShowPayfs($payfsid,$r,$price){
	global $empire,$public_r,$dbtbpre,$totalr,$shoppr;
	$payfsid=(int)$payfsid;
	$add=$empire->fetch1("select payid,payname,payurl,paysay,userpay,userfen from {$dbtbpre}enewsshoppayfs where payid='$payfsid' and isclose=0");
	if(empty($add[payid]))
	{
		printerror('请选择支付方式','',1,0,1);
	}
	//总金额
	$buyallmoney=$totalr['totalmoney']+$price-$totalr['pretotal'];
	if($add[userfen]&&$r[fp])
	{
		printerror("FenNotFp","history.go(-1)",1);
	}
	//发票
	if($r[fp])
	{
		$fptotal=($totalr['totalmoney']-$totalr['pretotal'])*($shoppr[fpnum]/100);
		$afp="+发票费(".$fptotal.")";
		$buyallmoney+=$fptotal;
	}
	$buyallfen=$totalr['totalfen']+$price;
	$returntotal="采购总额(".$totalr['totalmoney'].")+配送费(".$price.")".$afp."-优惠(".$totalr['pretotal'].")=总额(<b>".$buyallmoney." 元</b>)";
	$mytotal="结算总金额为:<b><font color=red>".$buyallmoney." 元</font></b> 全部";
	//是否登陆
	if($add[userfen]||$add[userpay])
	{
		if(!getcvar('mluserid'))
		{
			printerror("NotLoginTobuy","history.go(-1)",1);
		}
		$user=islogin();
		//点数购买
		if($add[userfen])
		{
			if($buyallfen>$user[userfen])
			{
				printerror("NotEnoughFenBuy","history.go(-1)",1);
			}
			$returntotal="采购总点数(".$totalr['totalfen'].")+配送点数费(".$price.")=总点数(<b>".$buyallfen." 点</b>)";
			$mytotal="结算总点数为:<b><font color=red>".$buyallfen." 点</font></b> 全部";
		}
		else//扣除余额
		{
			if($buyallmoney>$user[money])
			{
				printerror("NotEnoughMoneyBuy","history.go(-1)",1);
			}
		}
	}
	echo "<table width='100%' border=0 align=center cellpadding=3 cellspacing=1><tr><td>".$add[payname]."</td></tr></table>";
	$return[0]=$returntotal;
	$return[1]=$mytotal;
	return $return;
}
$public_diyr['pagetitle']='订单确认';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;订单确认";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<form action="/e/extend/shopdd/zfb/alipayapi.php" method="post" name="myorder" id="myorder">
<input type=hidden name=enews value=AddDd>
<div class="hymain">
  <div class="block">
    <div id="buycar">
    	<div class="car2"></div>
        <h3>订单号: <?=$ddno?><input name="ddno" type="hidden" id="ddno" value="<?=$ddno?>"></h3>
        <div class="buyer">
          <div class="hedui">
            	<h4 class="f14 yh noBold">核对您的收货人信息</h4>
              <ul>
               	  <li><label>收 货 人:</label><?=$r[truename]?><input name="truename" type="hidden" id="truename" value="<?=$r[truename]?>"></li>
                  <li><label>收货地址:</label><?=$r[address]?>
              <input name="address" type="hidden" id="address" value="<?=$r[address]?>" size="60"></li>
                  <li><label>联系电话:</label><?=$r[phone]?>
              <input name="phone" type="hidden" id="phone" value="<?=$r[phone]?>"><input name="mycall" type="hidden" id="phone" value="<?=$r[phone]?>"></li>
                 <!-- <li><label>电子邮箱:</label><?=$r[email]?>
              <input name="email" type="hidden" id="email" value="<?=$r[email]?>"></li> -->
<!--                  <li><label>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编:</label>--><?//=$r[zip]?>
<!--              <input name="zip" type="hidden" id="zip" value="--><?//=$r[zip]?><!--" size="8"></li>-->
           		  <li><label>备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注:</label><?=nl2br($r[bz])?> <input name="bz" type="hidden" value="<?=$r[bz]?>" size="8"></li>
                  <div class="clearfix"></div>
              </ul>
            </div>
        </div>
        <h3>核对您的商品</h3>
        <div class="carlist mt10">
        <table>
        <thead>
        <tr>
        <th class="left">商品名称</th>
        <th class="w4">价格</th>
        <th class="w6">数量</th>
        <th class="w4">商品总计</th>
        </tr>
        </thead>
        <tbody>
		<?php
	  include('buycar/buycar_order.php');
	  $totalr=array();
	  $totalr['totalmoney']=$totalmoney;
	  $totalr['buytype']=$buytype;
	  $totalr['totalfen']=$totalfen;
	  //优惠码
	  $prer=array();
	  $pretotal=0;
	  $user[groupid]=getcvar('mlgroupid');
	  if($r['precode'])
	  {
		$prer=ShopSys_GetPre($r['precode'],$totalr['totalmoney'],$user,$classids);
		$pretotal=ShopSys_PreMoney($prer,$totalr['totalmoney']);
	  }
	  $totalr['pretotal']=$pretotal;
	  $totalr['truetotalmoney']=$totalr['totalmoney']-$pretotal;
	  ?>
        </tbody>
        </table>
        </div>
	<?php
	if($shoppr['shoppsmust'])
	{
	?>
    <input name="psid" type="hidden" id="psid" value="<?=$r[psid]?>" size="8">
        <h3>配送方式</h3>
        <div class="car-pay">
      <?
	  $price=ShowPs($r[psid]);
	  ?>
	  <input type="hidden" name="price" value="<?=$price?>"/>
        </div>
	<?php
	}
	?>
	<?php
	if($shoppr['shoppayfsmust'])
	{
	?>
    <input name="payfsid" type="hidden" id="payfsid" value="<?=$r[payfsid]?>" size="8">
        <h3>支付方式</h3>
        <div class="car-pay">
        	<ul>
            	<li>
				<?
	  			$total=ShowPayfs($r[payfsid],$r,$price);
	  			?>
                </li>
            </ul>
        </div>
	<?php
	}
	?>
    <?php
	if($shoppr[havefp]&&$r[fp])
	{
	?>
    <h3>发票信息</h3>
    <div class="car-pay">
    	<ul>
        	<li><label>发票费用:&nbsp;&nbsp;</label><?=$shoppr[fpnum]?>%</li>
            <li><label>发票抬头:&nbsp;&nbsp;</label><?=$r['fptt']?></li>
            <li><label>发票名称:&nbsp;&nbsp;</label><?=$r['fpname']?></li>
        </ul>
    </div>
    <input name="fp" type="hidden" id="fp" value="<?=$r[fp]?>">
    <input name="fptt" type="hidden" id="fptt" value="<?=$r[fptt]?>">
	<input name="fpname" type="hidden" id="fpname" value="<?=$r[fpname]?>">	
	<?php
	}
	?>
    <?
    if ($prer[precode]){
	?>
        <h3>优惠码</h3>
        <div class="car-pay">
        	<ul>
            	<li><label>优惠码:&nbsp;&nbsp;</label><span class="corg"><?=$prer[precode]?></span><input name="precode" type="hidden" id="precode" value="<?=$r[precode]?>"></li>
                <li><label>优惠金额:&nbsp;&nbsp;</label><span class="corg"><?=$pretotal?></span></li>
            </ul>
        </div>
   	<?php
	}
	?>
        <h3>结算信息</h3>
        <div class="car-pay center">
        	<ul>
            	<li><?=$total[0]?></li>
                <li><?=$total[1]?></li>
            </ul>
        </div>
        <div class="buynow right">
            	<input type="button" class="gocar" value="" onclick="history.go(-1);">
                <input type="submit" class="cart-tijiao" value="">
        </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>