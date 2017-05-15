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
$query = $empire->query("select * from phome_ecms_shop_gouwuche where userid=$user[userid] and status=2");

$totalmoney=0;	//商品总金额
$buytype=0;	//支付类型：1为金额,0为点数
$totalfen=0;	//商品总积分
$classids='';	//栏目集合

?>
<?php

while($buycar = $empire->fetch($query)){

	//取得产品信息
    $productr=$empire->fetch1("select * from phome_ecms_shop where id='$buycar[shop_id]' limit 1");
	
	//是否全部点数
	if(!$productr[buyfen])
	{
		$buytype=1;
	}else{
	    $buytype=$productr[buyfen];
	}
	$thistotalfen=$productr[buyfen]*$buycar['num'];
	$totalfen+=$thistotalfen;
	//产品图片
	if(empty($productr[titlepic]))
	{
		$productr[titlepic]="../../data/images/notimg.gif";
	}

	$thistotal=$productr[price]*$buycar['num'];
	$totalmoney+=$thistotal;

?>
	<input type="hidden" name="shangpid" value="<?=$productr['id']?>" />
<tr>
        <td class="left"><a href="<?=$buycar['titleurl']?>" target="_blank"><?=$buycar[title]?></a><?=$addatt?' - '.$addatt:''?></td>
        <td>￥<span class="price"><?=$productr[price]?></span><span class="c999">(<del>￥<?=$productr[tprice]?></del>)</span></td>
        <td><?=$buycar['num']?></td>
        <td><span class="csh">￥<span class="totalprice"><?=$thistotal?></span></span></td>
</tr>
<?php
}
?>
<?php

if(!$buytype)//点数付费
{
?>
<tr> 
    <td colspan="4"><div align="right">合计点数:<strong><?=$totalfen?></strong></div></td>
</tr>
<?php
}
else
{
?>
<tr> 
    <td colspan="4"><div align="right">合计:<strong>￥<?=$totalmoney?><input type="hidden" name="totalmoney" value="<?=$totalmoney?>"/></strong></div></td>
</tr>
<?php
}
?>
