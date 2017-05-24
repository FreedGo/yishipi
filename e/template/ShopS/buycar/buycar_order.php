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
if(empty($buycar))
{
	printerror('你的购物车没有商品','',1,0,1);
}
$record="!";
$field="|";
$totalmoney=0;	//商品总金额
$buytype=0;	//支付类型：1为金额,0为点数
$totalfen=0;	//商品总积分
$classids='';	//栏目集合
$cdh='';
$buycarr=explode($record,$buycar);
$bcount=count($buycarr);
?>
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
	$thistotalfen=$productr[buyfen]*$pnum;
	$totalfen+=$thistotalfen;
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
	//栏目集合
	$classids.=$cdh.$productr['classid'];
	$cdh=',';
?>
<tr>
        <td class="left"><a href="<?=$titleurl?>" target="_blank"><?=$productr[title]?></a><?=$addatt?' - '.$addatt:''?></td>
        <td>￥<span class="price"><?=$productr[price]?></span><span class="c999">(<del>￥<?=$productr[tprice]?></del>)</span></td>
        <td><?=$pnum?></td>
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
    <td colspan="4"><div align="right">合计:<strong>￥<?=$totalmoney?></strong></div></td>
</tr>
<?php
}
?>
