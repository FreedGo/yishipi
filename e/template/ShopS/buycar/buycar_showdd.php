<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$record="!";
$field="|";
$totalmoney=0;
$totalfen=0;
$buycarr=explode($record,$buycar);
$bcount=count($buycarr);
?>
<table class="showdd">
          <thead>
            <tr>
              <th class="w30">序号</th>
              <th class="left">商品名称</th>
              <th class="w70">数量</th>
              <th class="w6">单价</th>
              <th class="w4">小计</th>
            </tr>
          </thead>
          <tbody>
<?php
$j=0;
for($i=0;$i<$bcount-1;$i++)
{
	$j++;
	$pr=explode($field,$buycarr[$i]);
	$productid=$pr[1];
	$fr=explode(",",$pr[1]);
	//ID
	$classid=(int)$fr[0];
	$id=(int)$fr[1];
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
	//单价
	$price=$pr[4];
	$thistotal=$price*$pnum;
	$buyfen=$pr[5];
	$thistotalfen=$buyfen*$pnum;
	if($payby==1)
	{
		$showprice=$buyfen." 点";
		$showthistotal=$thistotalfen." 点";
	}
	else
	{
		$showprice=$price." 元";
		$showthistotal=$thistotal." 元";
	}
	//产品名称
	$title=stripSlashes($pr[6]);
	//返回链接
	$titleurl="../../public/InfoUrl/?classid=$classid&id=$id";
	$totalmoney+=$thistotal;
	$totalfen+=$thistotalfen;
?>
<tr>
	<td><?=$j?></td>
	<td class="left"><a href="<?=$titleurl?>" target="_blank"><?=$title?></a><?=$addatt?' - '.$addatt:''?></td>
	<td><?=$pnum?></td>
	<td><b>￥<?=$showprice?></b></td>
	<td><?=$showthistotal?></td>
</tr>
<?php
}
?>
<?php
if($payby==1)//点数付费
{
?>
<tr> 
	<td colspan=5><div align=right>合计点数:<strong><?=$totalfen?></strong></div></td>
</tr>
<?php
}
else
{
?>
<tr> 
     <td colspan=5><div align=right>合计:<strong>￥<?=$totalmoney?></strong></div></td>
</tr>
<?php
}
?>
</tbody>
</table>
