<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php
$public_diyr['pagetitle'] = '订单列表';
$url = "<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;订单列表";
require(ECMS_PATH . 'e/template/incfile/header.php');
$dtjnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where haveprice='0' and checked='0' and payfsid<>'5' and userid='$user[userid]'");
$dshnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where outproduct='1' and checked<>'1' and userid='$user[userid]' or payfsid='5'");
$dthnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='3' and userid='$user[userid]'");
$ywcnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='1' and userid='$user[userid]'");
?>
	<div class="hymain">
		<!--引用js/css-->
		<link rel="stylesheet" href="/skin/member/dist/layui/css/layui.css">
		<link rel="stylesheet" href="/skin/member/dist/css/listdd.min.css">
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="/skin/member/dist/layui/layui.js"></script>
		<script src="/skin/member/dist/js/listdd.min.js"></script>
		<!--/--引用js/css-->
		<div class="block">
			<? require(ECMS_PATH . 'e/template/incfile/leftside.php'); ?>
			<div class="fr rmain">
				<h3>我的订单</h3>
				<div class="tips">我的订单提醒：待提交<span>（<?= $dtjnum ?>）</span> 待收货<span>（<?= $dshnum ?>）</span>
					待退货<span>（<?= $dthnum ?>）</span> 已完成<span>（<?= $ywcnum ?>）</span></div>
				<!--<div class="tab">-->
				<!--	<div class="ddsearch fr">订单查询：-->
				<!--		<form name="form1" method="get" action="index.php">-->
				<!--			<input name="sear" type="hidden" id="sear2" value="1">-->
				<!--			<input type="text" name="keyboard" value="--><?//= $keyboard ? $keyboard : '请输入订单号' ?><!--" onBlur="if(this.value=='') this.value='请输入订单号';" onFocus="if(this.value=='请输入订单号') this.value='';">-->
				<!--			<input type="submit" value="" class="w-search">-->
				<!--		</form>-->
				<!--	</div>-->
				<!--	<ul>-->
				<!--		<li-->
				<!--			--><?// if (!$zt) {
				// 			echo ' class="tabhover"';
				// 		} ?>
				<!--		>-->
				<!--			<a href="/e/ShopSys/ListDd/">所有订单</a></li>-->
				<!--		<div class="clearfix"></div>-->
				<!--	</ul>-->
				<!--</div>-->
				<!--<div class="bstable mt10">-->
				<!--  <table>-->
				<!--    <thead>-->
				<!--      <tr>-->
				<!--        <th class="" style="white-space:nowrap;overflow:hidden;word-break:break-all;">商品</th>-->
				<!--        <th class="w1">单价(元)</th>-->
				<!--        <th class="w2">数量</th>-->
				<!--        <th class="w6">实付金额(元)</th>-->
				<!--        <th class="w4">订单操作</th>-->
				<!--      </tr>-->
				<!--    </thead>-->
				<!--  </table>-->
				<!--</div>-->
				<!--<div id="alllist">-->
				<!--	--><?//
				// 	$todaytime = time();
				// 	$j = 0;
				// 	while ($r = $empire->fetch($sql)) {
				// 		$j++;
				// 		//点数购买
				// 		$total = 0;
				// 		if ($r[payby] == 1) {
				// 			$total = $r[alltotalfen] + $r[pstotal];
				// 			$mytotal = "<a href='#ecms' title='商品额(" . $r[alltotalfen] . ")+运费(" . $r[pstotal] . ")'>" . $total . " 点</a>";
				// 		} else {
				// 			//发票
				// 			$fpa = '';
				// 			$pre = '';
				// 			if ($r[fp]) {
				// 				$fpa = "+发票费(" . $r[fptotal] . ")";
				// 			}
				// 			//优惠
				// 			if ($r['pretotal']) {
				// 				$pre = "-优惠(" . $r[pretotal] . ")";
				// 			}
				// 			$total = $r[alltotal] + $r[pstotal] + $r[fptotal] - $r[pretotal];
				// 			$mytotal = "<a href='#ecms' title='商品额(" . $r[alltotal] . ")+运费(" . $r[pstotal] . ")" . $fpa . $pre . "'>" . $total . " 元</a>";
				// 		}
				// 		//支付方式
				// 		if ($r[payby] == 1) {
				// 			$payfsname = $r[payfsname] . "<br>(点数购买)";
				// 		} elseif ($r[payby] == 2) {
				// 			$payfsname = $r[payfsname] . "<br>(余额购买)";
				// 		} else {
				// 			$payfsname = $r[payfsname];
				// 		}
				// 		//状态
				// 		if ($r['checked'] == 1) {
				// 			$ch = "已确认";
				// 		} elseif ($r['checked'] == 2) {
				// 			$ch = "取消";
				// 		} elseif ($r['checked'] == 3) {
				// 			$ch = "退货";
				// 		} else {
				// 			$ch = "<font color=red>未确认</font>";
				// 		}
				// 		if ($r['outproduct'] == 1) {
				// 			$ou = "已发货";
				// 		} elseif ($r['outproduct'] == 2) {
				// 			$ou = "备货中";
				// 		} else {
				// 			$ou = "<font color=red>未发货</font>";
				// 		}
				// 		if ($r['haveprice'] == 1) {
				// 			$ha = "已付款";
				// 		} else {
				// 			$ha = "<font color=red>未付款</font>";
				// 		}
				// 		//操作
				// 		$doing = '<a href="../doaction.php?enews=DelDd&ddid=' . $r[ddid] . '" class="s-fc9 j-cancel" onclick="return confirm(\'确认要取消？\');">取消订单</a><br>';
				// 		if ($r['checked'] || $r['outproduct'] || $r['haveprice']) {
				// 			$doing = '';
				// 		}
				// 		$dddeltime = $shoppr['dddeltime'] * 60;
				// 		if ($todaytime - $dddeltime > to_time($r['ddtime'])) {
				// 			$doing = '';
				// 		}
				// 		//yecha新增
				// 		$s = $empire->fetch1("select * from {$dbtbpre}enewsshopdd_add where ddid='$r[ddid]'");
				// 		$record = "!";
				// 		$field = "|";
				// 		$totalmoney = 0;
				// 		$totalfen = 0;
				// 		$buycarr = explode($record, $s[buycar]);
				// 		$bcount = count($buycarr);
				// 		?>
				<!--		<div class="m-odit">-->
				<!--			<table>-->
				<!--				<thead>-->
				<!--				<tr>-->
				<!--					<th colspan="6"><span class="se">订单号：--><?//= $r[ddno] ?><!--</span>-->
				<!--						<span class="se">订购日期：--><?//= $r[ddtime] ?><!--</span></th>-->
				<!--				</tr>-->
				<!--				</thead>-->
				<!--				<tbody>-->
				<!---->
				<!--				--><?//
				// 				//echo $bcount;
				// 				if ($bcount == "2") {
				// 					$pr = explode($field, $buycarr[0]);
				// 					$productid = $pr[1];
				// 					$fr = explode(",", $pr[1]);
				// 					$title = stripSlashes($pr[6]);
				// 					$price = $pr[4];
				// 					$pnum = (int)$pr[3];
				// 					$thistotal = $price * $pnum;
				// 					$total = $r[pstotal] + $r[alltotal] + $r[fptotal] - $r[pretotal];
				// 					//ID
				// 					$classid = (int)$fr[0];
				// 					$id = (int)$fr[1];
				// 					$shop = $empire->fetch1("select titlepic,titleurl,tprice from {$dbtbpre}ecms_shop where id='$id' and classid='$classid'");
				// 					if (!$shop['titlepic']) {
				// 						$shop['titlepic'] = "/e/data/images/notimg.gif";
				// 					}
				// 					?>
				<!--					<tr>-->
				<!--						<td class="w1">-->
				<!--							<img width="50" height="50" src="--><?//= $shop['titlepic'] ?><!--" alt="--><?//= $title ?><!--">-->
				<!--						</td>-->
				<!--						<td class="left">-->
				<!--							<a href="--><?//= $shop[titleurl] ?><!--" target="_blank">--><?//= $title ?><!--</a></td>-->
				<!--						<td class="w1">-->
				<!--							<span class="del">¥--><?//= $shop['tprice'] ?><!--</span><br><span class="csh">¥--><?//= $price ?><!--</span>-->
				<!--						</td>-->
				<!--						<td class="w2"><span class="c999">--><?//= $pnum ?><!--</span></td>-->
				<!--						<td class="w6" rowspan="1">-->
				<!--							<span class="bold">--><?//= number_format($total, 2) ?><!--</span><br>-->
				<!--							<span class="c999">(含运费--><?//= number_format($r[pstotal], 2) ?><!--)</span></td>-->
				<!--						<td class="w4" rowspan="1">-->
				<!--							--><?//
				// 							if ($r[payfsid] == "5") {
				// 								echo '<a href="javascript:void()" target="_blank" class="btn btn-red"><span class="inner">货到付款</span></a><br>';
				// 							} elseif ($r[haveprice] == "0") {
				// 								echo '<a href="/e/ShopSys/doaction.php?ddid=' . $r[ddid] . '&enews=ShopDdToPay" target="_blank" class="btn btn-red"><span class="inner">付&nbsp;&nbsp;&nbsp;&nbsp;款</span></a><br>';
				// 							} else {
				// 							};
				// 							if ($r[checked] == '1') {
				// 								echo "已完成<br>";
				// 							} elseif ($r[checked] == '2') {
				// 								echo "订单已取消<br>";
				// 							} elseif ($r[checked] == '3') {
				// 								echo "已申请退货<br>";
				// 							} else {
				// 							};
				// 							if ($r[outproduct] == '1' && $r[checked] != "1" && $r[checked] != "1") {
				// 								echo "已发货<br><div class='kdname'><span class='corg'>查看物流</span><div class='wuliu' title='" . $r[kdname] . "' num='" . $r[kdnum] . "'>快递名称: " . $r[kdname] . "<br>快递单号: " . $r[kdnum] . "<br>正在查询此快递信息..<p class='center'><img src='/eshop/skin/ajax-loader.gif'></p></div></div>";
				// 							} elseif ($r[outproduct] == '2') {
				// 								echo "备货中<br>";
				// 							} elseif ($r[outproduct] == '0' && $r[haveprice] == "1") {
				// 								echo "等待发货<br>";
				// 							} else {
				// 							};
				// 							?>
				<!--							--><?//= $doing ?>
				<!--							<a href="../ShowDd/?ddid=--><?//= $r[ddid] ?><!--" target="_blank" class="s-fc9">订单详情</a><br>-->
				<!--						</td>-->
				<!--					</tr>-->
				<!--				--><?// } else {
				// 					for ($i = 0; $i < $bcount - 1; $i++) {
				// 						$pr = explode($field, $buycarr[$i]);
				// 						$productid = $pr[1];
				// 						$fr = explode(",", $pr[1]);
				// 						$title = stripSlashes($pr[6]);
				// 						$price = $pr[4];
				// 						$pnum = (int)$pr[3];
				// 						$thistotal = $price * $pnum;
				// 						$total = $r[pstotal] + $r[alltotal] + $r[fptotal] - $r[pretotal];
				// 						//ID
				// 						$classid = (int)$fr[0];
				// 						$id = (int)$fr[1];
				// 						$shop = $empire->fetch1("select titlepic,titleurl,tprice from {$dbtbpre}ecms_shop where id='$id' and classid='$classid'");
				// 						if (!$shop['titlepic']) {
				// 							$shop['titlepic'] = "/e/data/images/notimg.gif";
				// 						}
				// 						if ($i == "0") {
				// 							?>
				<!--							<tr>-->
				<!--								<td class="w1">-->
				<!--									<img width="50" height="50" src="--><?//= $shop['titlepic'] ?><!--" alt="--><?//= $title ?><!--">-->
				<!--								</td>-->
				<!--								<td class="left">-->
				<!--									<a href="--><?//= $shop[titleurl] ?><!--" target="_blank">--><?//= $title ?><!--</a>-->
				<!--								</td>-->
				<!--								<td class="w1">-->
				<!--									<span class="del">¥--><?//= $shop['tprice'] ?><!--</span><br><span class="csh">¥--><?//= $price ?><!--</span>-->
				<!--								</td>-->
				<!--								<td class="w2"><span class="c999">--><?//= $pnum ?><!--</span></td>-->
				<!--								<td class="w6" rowspan="--><?//= $bcount - 1 ?><!--">-->
				<!--									<span class="bold">--><?//= number_format($total, 2) ?><!--</span><br>-->
				<!--									<span class="c999">(含运费--><?//= number_format($r[pstotal], 2) ?><!--)</span>-->
				<!--								</td>-->
				<!--								<td class="w4" rowspan="--><?//= $bcount - 1 ?><!--">--><?//
				// 									if ($r[payfsid] == "5") {
				// 										echo '<a href="javascript:void()" target="_blank" class="btn btn-red"><span class="inner">货到付款</span></a><br>';
				// 									} elseif ($r[haveprice] == "0") {
				// 										echo '<a href="/e/ShopSys/doaction.php?ddid=' . $r[ddid] . '&enews=ShopDdToPay" target="_blank" class="btn btn-red"><span class="inner">付&nbsp;&nbsp;&nbsp;&nbsp;款</span></a><br>';
				// 									} else {
				// 									};
				// 									if ($r[checked] == '1') {
				// 										echo "已完成<br>";
				// 									} elseif ($r[checked] == '2') {
				// 										echo "订单已取消<br>";
				// 									} elseif ($r[checked] == '3') {
				// 										echo "已申请退货<br>";
				// 									} else {
				// 									};
				// 									if ($r[outproduct] == '1' && $r[checked] != "1") {
				// 										echo "已发货<br><div class='kdname'><span class='corg'>查看物流</span><div class='wuliu' title='" . $r[kdname] . "' num='" . $r[kdnum] . "'>快递名称: " . $r[kdname] . "<br>快递单号: " . $r[kdnum] . "<br>正在查询此快递信息..</div></div>";
				// 									} elseif ($r[outproduct] == '2') {
				// 										echo "备货中<br>";
				// 									} elseif ($r[outproduct] == '0' && $r[haveprice] == "1") {
				// 										echo "等待发货<br>";
				// 									} else {
				// 									};
				// 									?>
				<!--									--><?//= $doing ?>
				<!--									<a href="../ShowDd/?ddid=--><?//= $r[ddid] ?><!--" target="_blank" class="s-fc9">订单详情</a><br>-->
				<!--								</td>-->
				<!--							</tr>-->
				<!--						--><?// } else { ?>
				<!--							<tr>-->
				<!--								<td class="w1">-->
				<!--									<img width="50" height="50" src="--><?//= $shop['titlepic'] ?><!--" alt="--><?//= $title ?><!--">-->
				<!--								</td>-->
				<!--								<td class="left">-->
				<!--									<a href="--><?//= $shop[titleurl] ?><!--" target="_blank">--><?//= $title ?><!--</a>-->
				<!--								</td>-->
				<!--								<td class="w1">-->
				<!--									<span class="del">¥--><?//= $shop['tprice'] ?><!--</span><br><span class="csh">¥--><?//= $price ?><!--</span>-->
				<!--								</td>-->
				<!--								<td class="w2"><span class="c999">--><?//= $pnum ?><!--</span></td>-->
				<!--							</tr>-->
				<!--						--><?// }
				// 					}
				// 				} ?>
				<!--				</tbody>-->
				<!--			</table>-->
				<!--		</div>-->
				<!--		--><?//
				// 	}
				// 	?>
				<!--</div>-->
				<script type="text/html" id="allLists0">
					<!--订单渲染模板-->
					{{#  layui.each(d.list, function(index, item){ }}
					<!--渲染整个订单的头部信息-->
					<li class="order-tiem" data-ddid="{{ item.ddid }}">
						<div class="order-head clearfix">
							<div class="order-head-item order-number f-l-l">订单:{{ item.ddid }}</div>
							<div class="order-head-item roder-time f-l-l">{{ localAllTime(item.ddtime) }}</div>
							<div class="order-head-item order-seller f-l-l">{{ item.seller }}</div>
							<div class="order-head-item order-seller-telnumber f-l-l">{{ item.phone }}</div>
						</div>
						<!--渲染订单的产品信息（多个）-->
						{{#  layui.each(item.products, function(index, subItem){ }}
						<!--如果当前渲染的是产品的第一个，要把状态，按钮，订单详情渲染出来-->
						{{#  if(index == 0){ }}
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-price f-l-l">￥{{ subItem.price }}</div>
							<div class="order-body-item product-total-price f-l-l">总额：￥{{ item.totalprice }}</div>
							<div class="order-body-item order-status order-statu f-l-l">{{ item.type1 }}</div>
							<div class="order-body-item order-Btn f-l-l"><span class="go-pay-order order-com-button go-send">去发货</span></div>
							<div class="order-body-item order-detaill f-l-l"><a class="look-order-detaill" href="javascript:;">订单详情</a></div>
						</div>
						{{#  }else{ }}
						<!--如果当前渲染的是产品的第二个已上，只要url，title,titlepic,num.price-->
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-total-price f-l-l">￥{{ subItem.price }}</div>
						</div>
						{{#  } }}
						<!--/--判断结束-->
						{{#  }); }}
						<!--产品循环结束-->
					</li>
					{{#  }); }}
					<!--订单循环结束-->

					{{#  if(d.list.length === 0){ }}
					你还没有订单
					{{#  } }}
				</script>
				<script type="text/html" id="allLists1">
					<!--订单渲染模板-->
					{{#  layui.each(d.list, function(index, item){ }}
					<!--渲染整个订单的头部信息-->
					<li class="order-tiem" data-ddid="{{ item.ddid }}">
						<div class="order-head clearfix">
							<div class="order-head-item order-number f-l-l">订单:{{ item.ddid }}</div>
							<div class="order-head-item roder-time f-l-l">{{ localAllTime(item.ddtime) }}</div>
							<div class="order-head-item order-seller f-l-l">{{ item.seller }}</div>
							<div class="order-head-item order-seller-telnumber f-l-l">{{ item.phone }}</div>
						</div>
						<!--渲染订单的产品信息（多个）-->
						{{#  layui.each(item.products, function(index, subItem){ }}
						<!--如果当前渲染的是产品的第一个，要把状态，按钮，订单详情渲染出来-->
						{{#  if(index == 0){ }}
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-price f-l-l">￥{{ subItem.price }}</div>
							<div class="order-body-item product-total-price f-l-l">总额：￥{{ item.totalprice }}</div>
							<div class="order-body-item order-status order-statu f-l-l">{{ item.type1 }}</div>
							<div class="order-body-item order-Btn f-l-l"><span class="go-pay-order order-com-button go-send">去发货</span></div>
							<div class="order-body-item order-detaill f-l-l"><a class="look-order-detaill" href="javascript:;">订单详情</a></div>
						</div>
						{{#  }else{ }}
						<!--如果当前渲染的是产品的第二个已上，只要url，title,titlepic,num.price-->
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-total-price f-l-l">￥{{ subItem.price }}</div>
						</div>
						{{#  } }}
						<!--/--判断结束-->
						{{#  }); }}
						<!--产品循环结束-->
					</li>
					{{#  }); }}
					<!--订单循环结束-->

					{{#  if(d.list.length === 0){ }}
					你还没有订单
					{{#  } }}
				</script>
				<script type="text/html" id="allLists2">
					<!--订单渲染模板-->
					{{#  layui.each(d.list, function(index, item){ }}
					<!--渲染整个订单的头部信息-->
					<li class="order-tiem" data-ddid="{{ item.ddid }}">
						<div class="order-head clearfix">
							<div class="order-head-item order-number f-l-l">订单:{{ item.ddid }}</div>
							<div class="order-head-item roder-time f-l-l">{{ localAllTime(item.ddtime) }}</div>
							<div class="order-head-item order-seller f-l-l">{{ item.seller }}</div>
							<div class="order-head-item order-seller-telnumber f-l-l">{{ item.phone }}</div>
						</div>
						<!--渲染订单的产品信息（多个）-->
						{{#  layui.each(item.products, function(index, subItem){ }}
						<!--如果当前渲染的是产品的第一个，要把状态，按钮，订单详情渲染出来-->
						{{#  if(index == 0){ }}
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-price f-l-l">￥{{ subItem.price }}</div>
							<div class="order-body-item product-total-price f-l-l">总额：￥{{ item.totalprice }}</div>
							<div class="order-body-item order-status order-statu f-l-l">{{ item.type1 }}</div>
							<div class="order-body-item order-Btn f-l-l"><span class="go-pay-order order-com-button go-send">去发货</span></div>
							<div class="order-body-item order-detaill f-l-l"><a class="look-order-detaill" href="javascript:;">订单详情</a></div>
						</div>
						{{#  }else{ }}
						<!--如果当前渲染的是产品的第二个已上，只要url，title,titlepic,num.price-->
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-total-price f-l-l">￥{{ subItem.price }}</div>
						</div>
						{{#  } }}
						<!--/--判断结束-->
						{{#  }); }}
						<!--产品循环结束-->
					</li>
					{{#  }); }}
					<!--订单循环结束-->

					{{#  if(d.list.length === 0){ }}
					你还没有订单
					{{#  } }}
				</script>
				<script type="text/html" id="allLists3">
					<!--订单渲染模板-->
					{{#  layui.each(d.list, function(index, item){ }}
					<!--渲染整个订单的头部信息-->
					<li class="order-tiem" data-ddid="{{ item.ddid }}">
						<div class="order-head clearfix">
							<div class="order-head-item order-number f-l-l">订单:{{ item.ddid }}</div>
							<div class="order-head-item roder-time f-l-l">{{ localAllTime(item.ddtime) }}</div>
							<div class="order-head-item order-seller f-l-l">{{ item.seller }}</div>
							<div class="order-head-item order-seller-telnumber f-l-l">{{ item.phone }}</div>
						</div>
						<!--渲染订单的产品信息（多个）-->
						{{#  layui.each(item.products, function(index, subItem){ }}
						<!--如果当前渲染的是产品的第一个，要把状态，按钮，订单详情渲染出来-->
						{{#  if(index == 0){ }}
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-price f-l-l">￥{{ subItem.price }}</div>
							<div class="order-body-item product-total-price f-l-l">总额：￥{{ item.totalprice }}</div>
							<div class="order-body-item order-status order-statu f-l-l">{{ item.type1 }}</div>
							<div class="order-body-item order-Btn f-l-l"><span class="go-pay-order order-com-button go-send">去发货</span></div>
							<div class="order-body-item order-detaill f-l-l"><a class="look-order-detaill" href="javascript:;">订单详情</a></div>
						</div>
						{{#  }else{ }}
						<!--如果当前渲染的是产品的第二个已上，只要url，title,titlepic,num.price-->
						<div class="order-body" data-cpid = {{ subItem.titleid }}>
							<div class="order-body-item product-img f-l-l">
								<a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
							<div class="order-body-item product-title f-l-l">
								<a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
							</div>
							<div class="order-body-item product-nums f-l-l">{{ subItem.num }}</div>
							<div class="order-body-item product-total-price f-l-l">￥{{ subItem.price }}</div>
						</div>
						{{#  } }}
						<!--/--判断结束-->
						{{#  }); }}
						<!--产品循环结束-->
					</li>
					{{#  }); }}
					<!--订单循环结束-->

					{{#  if(d.list.length === 0){ }}
					你还没有订单
					{{#  } }}
				</script>
				<div class="layui-tab" lay-filter="listdd">
					<ul class="layui-tab-title">
						<li class="layui-this" lay-id="dd-all">全部订单</li>
						<li lay-id="dd-1">用户管理</li>
						<li lay-id="dd-2">权限分配</li>
						<li lay-id="dd-3">商品管理</li>
						<li lay-id="dd-4">订单管理</li>
					</ul>
					<div class="layui-tab-content">
						<div class="layui-tab-item layui-show ">
							<table class="layui-table " lay-skin="nob">
								<colgroup>
									<col width="265">
									<col width="42">
									<col width="100">
									<col width="100">
									<col width="90">
									<col width="100">
									<col>
								</colgroup>
								<thead>
								<tr>
									<th>商品</th>
									<th>数量</th>
									<th>单价(元)</th>
									<th>实付金额(元)</th>
									<th>状态</th>
									<th>操作</th>
									<th>详情</th>
								</tr>
								</thead>
							</table>
							<ul class="dd-list " id="ddList0">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
						</div>
						<div class="layui-tab-item">
							<table class="layui-table " lay-skin="nob">
								<colgroup>
									<col width="265">
									<col width="42">
									<col width="100">
									<col width="100">
									<col width="90">
									<col width="100">
									<col>
								</colgroup>
								<thead>
								<tr>
									<th>商品</th>
									<th>数量</th>
									<th>单价(元)</th>
									<th>实付金额(元)</th>
									<th>状态</th>
									<th>操作</th>
									<th>详情</th>
								</tr>
								</thead>
							</table>
							<ul class="dd-list " id="ddList1">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
						</div>
						<div class="layui-tab-item">
							<table class="layui-table " lay-skin="nob">
								<colgroup>
									<col width="265">
									<col width="42">
									<col width="100">
									<col width="100">
									<col width="90">
									<col width="100">
									<col>
								</colgroup>
								<thead>
								<tr>
									<th>商品</th>
									<th>数量</th>
									<th>单价(元)</th>
									<th>实付金额(元)</th>
									<th>状态</th>
									<th>操作</th>
									<th>详情</th>
								</tr>
								</thead>
							</table>
							<ul class="dd-list " id="ddList2">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
						</div>
						<div class="layui-tab-item">
							<table class="layui-table " lay-skin="nob">
								<colgroup>
									<col width="265">
									<col width="42">
									<col width="100">
									<col width="100">
									<col width="90">
									<col width="100">
									<col>
								</colgroup>
								<thead>
								<tr>
									<th>商品</th>
									<th>数量</th>
									<th>单价(元)</th>
									<th>实付金额(元)</th>
									<th>状态</th>
									<th>操作</th>
									<th>详情</th>
								</tr>
								</thead>
							</table>
							<ul class="dd-list " id="ddList3">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
						</div>
						<div class="layui-tab-item">内容5</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>