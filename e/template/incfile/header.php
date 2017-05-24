<?php
if(!defined('InEmpireCMS'))
{
	exit();
}

//--------------- 界面参数 ---------------

//会员界面附件地址前缀
$memberskinurl=$public_r['newsurl'].'skin/member/images/';

//LOGO图片地址
$logoimgurl=$memberskinurl.'logo.jpg';

//加减号图片地址
$addimgurl=$memberskinurl.'add.gif';
$noaddimgurl=$memberskinurl.'noadd.gif';

//上下横线背景色
$bgcolor_line='#4FB4DE';

//其它色调可修改CSS部分

//yecha新增
//输出可管理的模型
	$tmodsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
	while($tmodr=$empire->fetch($tmodsql))
	{
		$fontb="";
		$fontb1="";
		if($tmodr['mid']==$tgetmid)
		{
			$fontb="<b>";
			$fontb1="</b>";
		}
		$kjmenu.='<dl><dt><a href="#"><span></span>'.$fontb.'我的'.$tmodr[qmname].$fontb1.'</a></dt><dd><a href="'.$public_r[newsurl].'e/DoInfo/ListInfo.php?mid='.$tmodr[mid].'">'.$fontb.'管理'.$tmodr[qmname].$fontb1.'</a></dd><dd><a href="'.$public_r['newsurl'].'e/DoInfo/ChangeClass.php?mid='.$tmodr['mid'].'">'.$fontb.'发布'.$tmodr[qmname].$fontb1.'</a></dd><span class="clearfix"></span></dl>';	
		$ltgmenu.='<li><a href="'.$public_r[newsurl].'e/DoInfo/ListInfo.php?mid='.$tmodr[mid].'">'.$fontb.'我的'.$tmodr[qmname].$fontb1.'</a> <!-- span class="fr"><a href="#" class="cgren">发布</a></span --></li>';
}


//--------------- 界面参数 ---------------

//网页标题
$thispagetitle=$public_diyr['pagetitle']?$public_diyr['pagetitle']:'会员中心';
//会员信息
$tmgetuserid=(int)getcvar('mluserid');	//用户ID
$tmgetusername=RepPostVar(getcvar('mlusername'));	//用户名
$tmgetgroupid=(int)getcvar('mlgroupid');	//用户组ID
$tmgetgroupname='游客';
//会员组名称
if($tmgetgroupid)
{
	$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	if(!$tmgetgroupname)
	{
		include_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
		$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	}
}

//模型
$tgetmid=(int)$_GET['mid'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
<title><?=$thispagetitle?></title>
<link href="/eshop/skin/common.css" rel="stylesheet" type="text/css" />
<link href="/eshop/skin/yecha.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/eshop/js/jquery.js"></script>
<script type="text/javascript" src="/eshop/js/yecha.js"></script>
</head>
<body>
<div class="topnav">
    	<div class="block">
        	<div class="fl">
<?php
	if($tmgetuserid)	//已登录
	{
?>
    <span class="c666 welcome"></span> <a href="<?=$public_r['newsurl']?>e/member/my/"><?=$tmgetusername?></a> | <a href="<?=$public_r['newsurl']?>e/member/doaction.php?enews=exit" onclick="return confirm('确认要退出?');">退出</a>
<? } else { ?>
	<a href="/e/member/login/">登陆</a> | <a href="/e/member/register/index.php?tobind=0&groupid=1">注册</a>
<? } ?>
            </div>
            <div class="fr">
            	<ul>
                	<li><a href="/e/payapi/">充值</a></li>
                    <li>|</li>
                    <li class="dropdown"><span class="dropindex"><a href="/e/member/my/">我的帐户</a><span class="arrow"></span></span>
                    	<ul>
                        	<li><a href="/e/ShopSys/ListDd/">我的订单</a></li>
                            <li><a href="/e/payapi/">帐户余额</a></li>
                            <li><a href="/e/member/fava/">我的收藏</a></li>
                            <li><a href="/e/member/my/">会员/积分</a></li>
                            <li><a href="/e/member/EditInfo/">个人资料</a></li>
                        </ul>
                    </li>
                    <li>|</li>
<?
//顶部购物车参数
$total="5"; //最多显示多少个商品
$carnr=getcvar('mybuycar');
$record="!";
$field="|";
$cararr=explode($record,$carnr);
$carcount=count($cararr)-1;
?>
                    <li class="dropdown shopcar"><span class="dropindex"><a href="/e/ShopSys/buycar/">购物车</a><span><?=$carcount?></span>件<span class="arrow"></span></span>
                    	<ul>
<?php
if ($carcount<$total){
	$total=$carcount;
	$cartip='购物车共有 <span class="cred">'.$carcount.'</span> 件商品';
} else {
	$cartip='<a href="#">最多显示<span class="corg">'.$total.'</span>个商品,更多请点击查看</a>';	
}
for($i=0;$i<$total;$i++)
{
	$pr=explode($field,$cararr[$i]);
	$productid=$pr[1];
	$fr=explode(",",$pr[1]);
	//ID
	$carclassid=(int)$fr[0];
	$carid=(int)$fr[1];
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
	$productr=$empire->fetch1("select title,tprice,price,isurl,titleurl,classid,id,titlepic,buyfen from {$dbtbpre}ecms_shop where id='$carid' limit 1");
	if(!$productr['id']||$productr['classid']!=$carclassid)
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
	$thistotal=$productr[price]*$pnum;
	$totalmoney+=$thistotal;
?>
	<li><img src="<?=$productr[titlepic]?>" class="fl" width="50" height="50">
    <div class="fl w180"><a href="<?=$titleurl?>" target="_blank"><?=$productr[title]?></a><span class="cred pl10">¥<?=$productr[price]?></span><a class="rcart-del" classid="<?=$carclassid?>" spid="<?=$carid?>">×</a></div><div class="clearfix"></div>
    </li>
<?php
}
?>
                        	<li class="buy"><div><?=$cartip?></div><a href="/e/ShopSys/buycar/" class="car"></a></li>
                        </ul>
                    </li>
                    <li>|</li>
                    <li><a href="/e/ShopSys/ListDd/">我的订单</a></li>
                    <li>|</li>
                    <li><a href="#">帮助</a></li>
                </ul>
            </div>
        </div>
    </div>
	<div class="header">
    	<div class="block">
        	<div class="logo"><a href="<?=$public_r['newsurl']?>"></a></div>
            <div class="dhmenu">
            	<div class="morecp">
                	<span class="allfl">会员快捷操作</span>
                	<span class="more"></span>
                    <? require(ECMS_PATH.'e/template/incfile/fllist.php');?>
                </div>
            	<ul class="indexnav">
                	<li class="phonehide"><a href="<?=$public_r['newsurl']?>" target="_blank">首页</a></li>
                	<li class="phonelink"><a href="/e/member/cp/">会员中心</a></li>
                    <li><a href="/e/ShopSys/ListDd/">我的订单</a></li>
                    <li class="phonehide"><a href="/e/member/my/">我的信息</a></li>
                    <li><a href="/e/member/fava/" class="star">我的收藏</a></li>
                    <li><a href="/e/ShopSys/buycar/">我的购物车</a></li>
                </ul>
            </div>
        </div>
    </div>