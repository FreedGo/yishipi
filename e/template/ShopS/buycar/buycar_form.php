<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
require(ECMS_PATH.'e/ecmsshop/tehui/class.php');
require(ECMS_PATH.'e/ecmsshop/pricearr/class.php');
$user=isloginajax();
?>
<?php
$buycar=getcvar('mybuycar');
$record="!";
$field="|";
$totalmoney=0;	//商品总金额
$buytype=0;	//支付类型：1为金额,0为点数
$totalfen=0;	//商品总积分
$buycarr=explode($record,$buycar);
$bcount=count($buycarr);
?>
<div id="buycar">
    	<div class="car1"></div>
        <div class="epy-car f14" <? if($bcount>1){echo 'style="display:none;"';}?>>
        	您的购物车是空的，赶快行动吧！您可以：<br>
            <a href="/" class="c4095ce f12 noBold">去购物 ></a> <span class="f12 noBold c666">或者</span> <a href="/e/payapi/" class="c4095ce f12 noBold">去充值 ></a>
        </div>
        <div class="carlist mt10"<? if($bcount<=1){echo 'style="display:none;"';}?>>
  <form name=form1 method=post action='../doaction.php' id="carform">
  <input type=hidden name=enews value=EditBuycar>
        <table>
        <thead>
        <tr>
        <th class="w1"><label><input name="productcheckbox" type="checkbox" id="mark-all">全选</label></th>
        <th class="w60"></th>
        <th class="left">商品</th>
        <th class="w4">单价</th>
        <th class="w6">数量</th>
        <th class="w4">商品总计</th>
        <th class="row w4">操作</th>
        </tr>
        </thead>
        <tbody>
<?php
for($i=0;$i<$bcount-1;$i++)
{
	$pr=explode($field,$buycarr[$i]);
	$productid=$pr[1];
	$fr=explode(",",$pr[1]);
	//ID
	$classid=(int)$fr[0];
	$id=(int)$fr[1];
	if(empty($class_r[$classid][tbname]))
	{
		continue;
	}
	//属性
	$addatt='';
	if($pr[2])
	{
		$addatt=$pr[2];
	}
	//数量
	$pnum=(int)$pr[3];
	if($pnum<1)
	{
		$pnum=1;
	}
	//取得产品信息
$productr=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
	if(!$productr['id']||$productr['classid']!=$classid)
	{
		continue;
	}
	//是否全部点数
	if(!$productr[buyfen])
	{
		$buytype=1;
	}
	$totalfen+=$productr[buyfen]*$pnum;
	//产品图片
	if(empty($productr[titlepic]))
	{
		$productr[titlepic]="../../data/images/notimg.gif";
	}
	//返回链接
	$titleurl=sys_ReturnBqTitleLink($productr);
	if($productr[xsprice]){
		$price=getxsprice($productr[xsprice]);
		if($price){
			$productr[price]=$price;
		}
}
if($user[groupid]){
		$arr=getpricearr($productr[pricearr]);
		if (array_key_exists($user[groupid],$arr)) 
      {
          $price=$arr[$user[groupid]];
          $productr[price]=$price;
      }
}
	$thistotal=$productr[price]*$pnum;
	$totalmoney+=$thistotal;
?>
        <tr>
        <td><input type="checkbox" name="del[]" value="<?=$productid?>" class="delbox"></td>
	<input type="hidden" name="productid[]" value="<?=$productid?>">
	<input type="hidden" name="addatt[]" value="<?=$addatt?>"></td>
        <td><img src="<?=$productr[titlepic]?>" border="0" width="80" height="80"></td>
        <td class="left"><a href="<?=$titleurl?>"><?=$productr[title]?></a></td>
        <td>￥<span class="price"><?=$productr[price]?></span><br>(<del>￥<?=$productr[tprice]?></del>)</td>
        <td><div class="carnum"><a href="javascript:void(0);" class="numbutton numless">-</a><input maxlength="3" size="3" name="num[]" type="text" value="<?=$pnum?>" rel="<?=$pnum?>" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();"><a href="javascript:void(0);" class="numbutton numadd">+</a></div></td>
        <td><span class="csh">￥<span class="totalprice"><?=$thistotal?></span></span></td>
        <td class="row f-tar"><a href="/e/ShopSys/doaction.php?enews=delBuycar&classid=<?=$productr[classid]?>&id=<?=$productr[id]?>" class="cblue">删除</a></td>
        </tr>
<?php
}
?>
<?php
if(!$buytype)//点数付费
{
?>
		<tr>
        <td colspan="7" class="bgfa carjs">
        	<div class="fl"><input type="submit" class="delthis" value=""></div>
            <div class="fr mr30 f14 yh">合计点数 : <span class="csh f12"><span class="carjsprice bold f20"><?=$totalfen?></span></span></div>
            <div class="clearfix"></div>
        </td>
        </tr>
<?php
}
else
{
?>
		<tr>
        <td colspan="7" class="bgfa carjs">
        	<div class="fl"><input type="button" class="delthis" value="" onClick="window.location.href='/e/ShopSys/doaction.php?enews=ClearBuycar';"></div>
            <div class="fr mr30 f14 yh">总价(不包含运费) : <span class="csh f12">¥ <span class="carjsprice bold f20"><?=$totalmoney?></span></span></div>
            <div class="clearfix"></div>
            <?
            if ($public_r['add_cartip']){
			?>
            <div class="to-exp-free"><span class="tri"></span><?=$public_r['add_cartip']?></div> 
            <? } ?>          
        </td>
        </tr>
<?php
}
?>
        </tbody>
        </table>
</form>
         <div class="buynow right">
            	<input type="button" class="gono" value="" onclick="return function(){window.location.href='/';return false;}(this);">
                <input type="button" class="cart-buy" value="" onclick="">
        </div>
        </div>
    </div>
<script>
	$(function(){
		$(".cart-buy").click( function(){$("#carform input[name='enews']").val("Buycarsub");$("#carform").submit();});	
	})
</script>