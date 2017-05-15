<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//显示配送方式
function ShowPs(){
	global $empire,$dbtbpre;
	$sql=$empire->query("select pid,pname,price,psay,isdefault from {$dbtbpre}enewsshopps where isclose=0 order by pid");
	$str='<select name="psid">';
	while($r=$empire->fetch($sql))
	{
		$checked=$r[isdefault]==1?' selected':'';
		$str.='<option value="'.$r[pid].'"'.$checked.'>'.$r[pname].'&nbsp;(￥'.$r[price].')</option>';
	}
	$str.='</select>';
	return $str;
}

//显示支付方式
function ShowPayfs($pr,$user){
	global $empire,$dbtbpre;
	$str='';
	$sql=$empire->query("select payid,payname,payurl,paysay,userpay,userfen,isdefault from {$dbtbpre}enewsshoppayfs where isclose=0 order by payid");
	while($r=$empire->fetch($sql))
	{
		$checked=$r[isdefault]==1?' checked':'';
		$dis="";
		$words="";
		//扣点数
		if($r[userfen])
		{
			if($pr['buytype'])
			{
				$dis=" disabled";
				$words='<span class="f12 c999">(您选择的商品有部分不支持此购买方式)</span>';
			}
			else
			{
				if(getcvar('mluserid'))
				{
					if($user[userfen]<$pr['totalfen'])
					{
						$dis=" disabled";
						$words="&nbsp;<span class='f12 c999'>(您的帐号点数不足,不能使用此支付方式)</span>";
					}
				}
				else
				{
					$dis=" disabled";
					$words="&nbsp;<span class='f12 c999'>(您未登录,不能使用此支付方式)</span>";
				}
			}
		}
		//余额扣除
		elseif($r[userpay])
		{
			if(getcvar('mluserid'))
			{
				if($user[money]<$pr['totalmoney'])
				{
					$dis=" disabled";
					$words="&nbsp;<span class='f12 c999'>(您的帐号余额不足,不能使用此支付方式)</span>";
				}
			}
			else
			{
				$dis=" disabled";
				$words="&nbsp;<span class='f12 c999'>(您未登录,不能使用此支付方式)</span>";
			}
		}
		//网上支付
		elseif($r[payurl])
		{
			$words="";
		}
		else
		{}
		$str.="<li><label><input type=radio name=payfsid value='".$r[payid]."'".$checked."".$dis.">".$r[payname]."</label><span class='ml10 f12 corg'>".$words."</span><span class='ml10 f12 corg'>".$r[paysay]."</span></li>";
	}
	return $str;
}

//提交地址
if($shoppr['buystep']==0)
{
	$formaction='../SubmitOrder/index.php';
	$formconfirm='';
	$formsubmit='<input type="submit" name="Submit" value=" 下一步 " class="rbutton">';
	$enewshidden='';
	$ddno='';
}
else
{
	$formaction='../doaction.php';
	$formconfirm=' onsubmit="return confirm(\'确认提交?\');"';
	$formsubmit='<input type="submit" name="Submit" value=" 提交订单 " class="rbutton">';
	$enewshidden='<input type=hidden name=enews value=AddDd>';
	$ddno=ShopSys_ReturnDdNo();//订单ID
}
$public_diyr['pagetitle']='确认订单信息';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;确认订单信息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<form action="<?=$formaction?>" method="post" name="myorder" id="myorder"<?=$formconfirm?>>
<input name="ddno" type="hidden" id="ddno" value="<?=$ddno?>">
<div class="hymain">
  <div class="block">
    <div id="buycar">
    	<div class="car2"></div>
        <h3>收货人信息<a href="/e/ShopSys/address/ListAddress.php" class="f12 cblue fr noBold st" target="_blank">收货地址管理</a></h3>
        <div class="buyer">
<?php
			if($user['userid'])
			{
				$addresssql=$empire->query("select addressid,addressname,truename,address,phone,isdefault from {$dbtbpre}enewsshop_address where userid='$user[userid]'");
?>
            <div class="dzlist">
            	<ul>
<?php
				while($chaddressr=$empire->fetch($addresssql))
				{
					$class="";
					if (!$addressid){
						if ($chaddressr[isdefault]=="1"){
						$class="checked";
						}
					} else{
						if ($chaddressr['addressid']==$addressid){
							$class="checked";
						}	
					}
?>
                	<li class="<?=$class?>"><label><input name="r-consign" type="radio" class="mark-input" value="<?=$chaddressr['addressid']?>" <?=$class?>><?=$chaddressr['truename']?> <?=$chaddressr['address']?> ( 联系电话:<?=$chaddressr['phone']?> )</label></li>
<?php
				}
?>
                    <li class="mt10"><a href="javascript:void(0);" class="addnewaddress"></a><span class="c666">添加好收货地址,可以更方便您的选择!</span></li>
                </ul>
            </div>
<?php
			 }
?>
          <div class="hedui">
            	<h4 class="f14 yh noBold">核对您的收货信息</h4>
              <ul>
               	  <li><label>收 货 人:</label><input name="truename" type="text" id="truename" value="<?=$useraddr[truename]?>" size="65"><?=stristr($shoppr['ddmust'],',truename,')?'*':''?></li>
                  <li><label>收货地址:</label><input name="address" type="text" id="address" value="<?=$useraddr[address]?>" size="65">
              <?=stristr($shoppr['ddmust'],',address,')?'*':''?></li>
                  <li><label>联系电话:</label><input name="phone" type="text" id="phone" value="<?=$useraddr[phone]?>" size="65"><input name="mycall" type="hidden" id="phone" value="<?=$useraddr[phone]?>" size="65">
			  <?=stristr($shoppr['ddmust'],',phone,')?'*':''?></li>
                  <li><label>电子邮箱:</label><input name="email" type="text" id="email" value="<?=$email?>" size="65">
<!--              --><?//=stristr($shoppr['ddmust'],',email,')?'*':''?><!--</li>-->
<!--                  <li><label>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编:</label><input name="zip" type="text" id="zip" value="--><?//=$useraddr[zip]?><!--" size="65">-->
			  <?=stristr($shoppr['ddmust'],',zip,')?'*':''?></li>
           		  <li><label>备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注:</label><textarea name="bz" cols="65" rows="6" id="bz"></textarea>
			  <?=stristr($shoppr['ddmust'],',bz,')?'*':''?></li>
              </ul>
            </div>
        </div>
        <h3>核对您的商品</h3>
        <div class="carlist mt10">
        <table>
        <thead>
        <tr>
        <th class="left">商品名称</th>
        <th class="w180">价格</th>
        <th class="w6">数量</th>
        <th class="w4">商品总计</th>
        </tr>
        </thead>
        <tbody>
		<?php
	  include('buycar/buycar_order.php');
	  $pr=array();
	  
	  $pr['totalmoney']=$totalmoney;
	  $pr['buytype']=$buytype;
	  $pr['totalfen']=$totalfen;
	
	  ?>
        </tbody>
        </table>
        </div>
	<?php
	if($shoppr['shoppsmust'])
	{
	$showps=ShowPs();
	if($showps)
	{
	?>
        <h3>选择配送方式</h3>
        <div class="car-pay">
        <?=$showps?>
        </div>
	<?php
	}
	}
	?>
	<?php
	if($shoppr['shoppayfsmust'])
	{
	$showpayfs=ShowPayfs($pr,$user);
	if($showpayfs)
	{
	?> 
        <h3>选择支付方式</h3>
        <div class="car-pay">
        	<ul>
            	<?=$showpayfs?>
            </ul>
        </div>
	<?php
	}
	}
	?>
        <h3>使用优惠码</h3>
        <div class="car-pay">
        	<label>优惠码:&nbsp;&nbsp;</label> <input name="precode" type="text" id="precode" size="35" class="input_text"> <span class="c4095ce" id="yhprice"></span>
        </div>
	<?
	//提供发票
	if($shoppr[havefp])
	{
	?>
    <h3>开具发票</h3>
    <div class="car-pay">
    	<ul>
        	<li><label>需要开票:&nbsp;&nbsp;</label><input name="fp" type="checkbox" id="fp" value="1"> 是(需增加 <span class="corg"><?=$shoppr[fpnum]?>%</span> 的费用)</li>
            <li><label>发票抬头:&nbsp;&nbsp;</label><input name="fptt" type="text" id="fptt" size="35" class="input_text"></li>
            <li><label>发票名称:&nbsp;&nbsp;</label><select name="fpname" id="fpname">
			<?php
			$fpnamer=explode("\r\n",$shoppr['fpname']);
			$fncount=count($fpnamer);
			for($i=0;$i<$fncount;$i++)
			{
			?>
			<option value="<?=$fpnamer[$i]?>"><?=$fpnamer[$i]?></option>
			<?php
			}
			?>
            </select></li>
        </ul>
    </div>
	<?
	}
	?>

        <div class="buynow right">
        		<?=$enewshidden?>
        		<input name="alltotal" type="hidden" id="alltotal" value="<?=$pr['totalmoney']?>">
          		<input name="alltotalfen" type="hidden" id="alltotalfen" value="<?=$pr['totalfen']?>">
            	<input type="button" class="gocar" value="" onclick="return function(){window.location.href='/e/ShopSys/buycar/';return false;}(this);">
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