<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php
$public_diyr['pagetitle'] = '商品评价/晒单';
$url = "<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;商品评价/晒单";
require(ECMS_PATH . 'e/template/incfile/header.php');
$dtjnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where haveprice='0' and checked='0' and payfsid<>'5' and userid='$user[userid]'");
$dshnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where outproduct='1' and checked<>'1' and userid='$user[userid]'");
$dthnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='3' and userid='$user[userid]'");
$ywcnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='1' and userid='$user[userid]'");
?>
	<script type="text/javascript" src="/e/extend/shoppl/js/layer.js"></script>
	<script type="text/javascript" src="/e/extend/shoppl/js/upload.min.js"></script>
	<script type="text/javascript" src="/e/extend/shoppl/js/shoppl.js"></script>
	<link href="/e/extend/shoppl/images/shoppl.css" rel="stylesheet" type="text/css"/>
	<div class="hymain">
		<div class="block">
			<? require(ECMS_PATH . 'e/template/incfile/leftside.php'); ?>
			<div class="fr rmain">
				<h3>商品评价/晒单</h3>

				<div id="pjbox" style="display:none;">
					<div class="shoppjbox">
						<form id="form1" name="form1" method="post">
							<input type="hidden" value="" name="tags" id="tags">
							<input type="hidden" value="60" name="classid" id="classid">
							<input type="hidden" value="" name="ddid" id="ddid">
							<input type="hidden" value="" name="id" id="id">
							<input type="hidden" value="0" name="num" id="num">
							<input type="hidden" value="<?= time() ?>" name="filepass" id="filepass">
							<div class="m-odit">
								<table style="width:100%" id="pjtable">
									<tbody>
									<tr>
										<td class="w1"><img width="50" height="50" src="/e/data/images/notimg.gif"></td>
										<td class="left"><a></a></td>
									</tr>
									</tbody>
								</table>
							</div>
							<ul>
								<li><span><em class="cred">*</em> 评分：</span>
									<p class="stars-grey"><i class="starts-red"></i></p> <b class="starsnum"></b>
									<input type="hidden" value="5" name="commentStar" id="commentStar">
									<br><span><em class="cred">*</em> 和描述相符度：</span>
									<p class="stars-grey"><i class="starts-red"></i></p> <b class="starsnum"></b>
									<input type="hidden" value="5" name="msfen" id="msfen">
									<br><span><em class="cred">*</em> 发货速度：</span>
									<p class="stars-grey"><i class="starts-red"></i></p> <b class="starsnum"></b>
									<input type="hidden" value="5" name="sdfen" id="sdfen">
									<br><span><em class="cred">*</em> 物流满意度：</span>
									<p class="stars-grey"><i class="starts-red"></i></p> <b class="starsnum"></b>
									<input type="hidden" value="5" name="wlfen" id="wlfen">
								</li>
								<li><span><em class="cred">*</em> 心得：</span>
									<textarea name="xinde" cols="65" rows="6" class="area xinde" tip="商品是否给力？快分享你的购买心得吧~"></textarea>
								</li>
								<li><span>晒单：</span>
									<div class="sdlist">
										<div id="shaidan"></div>
									</div>
								</li>
								<li>
									<span></span><input type="button" class="button small green" value="评论并继续" onClick="addshoppl()">
									<input id="anonymousFlag" checked="checked" type="checkbox" name="thirdShare">
									<label for="anonymousFlag" class="anon-l" title="匿名评价不会展示您的用户昵称，该评价也不会被第三方网站应用">匿名评价<span class="sign-icon"></span></label>
								</li>
							</ul>
						</form>
					</div>
				</div>
				<div class="tips">
					原创评价可以帮助其他用户做出购买参考，同时您也可以获得一定数量的积分奖励。<a href="#" class="c4095ce">[积分规则]</a><br>
					小积分大用处，快去看看您的积分都能兑换什么好东西吧。<a href="#" class="c4095ce">[去看看]</a>
				</div>
				<div class="tab">
					<div class="ddsearch fr">
						<!--<select name="commentsort" class="selt"><option value="0">全部商品</option><option value="1">待评价</option><option value="2">待晒单</option></select>-->
					</div>
					<ul>
						<li<? if (!$zt) {
							echo ' class="tabhover"';
						} ?>><a href="/e/ecmsshop/mycomments/">待评价</a></li>
						<li<? if ($zt == "1") {
							echo ' class="tabhover"';
						} ?>><a href="/e/ecmsshop/mycomments/?zt=1">已评价</a></li>
						<li<? if ($zt == "2") {
							echo ' class="tabhover"';
						} ?>><a href="/e/ecmsshop/mycomments/?zt=2">全部商品</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="bstable mt10">
					<table>
						<thead>
						<tr>
							<th class="">商品信息</th>
							<th class="w1">购买时间</th>
							<th class="w4">评价状态</th>
						</tr>
						</thead>
					</table>
				</div>
				<div id="alllist">
					<?
					$todaytime = time();
					$j = 0;
					if (mysql_num_rows($sql) < 1) {
						echo '<div class="center" style="padding:20px 0;">暂无商品待评价</div>';
					}
					while ($r = $empire->fetch($sql)) {
						$j++;
						$total = 0;
						//yecha新增

						$s = $empire->fetch1("select * from {$dbtbpre}enewsshopdd_add where ddid='$r[ddid]'");
						$record = "!";
						$field = "|";
						$totalmoney = 0;
						$totalfen = 0;
						$buycarr = explode($record, $s[buycar]);
						$bcount = count($buycarr);
						?>
						<div class="m-odit">
							<table>
								<thead>
								<tr>
									<th colspan="6"><span class="se">订单号：<?= $r[ddno] ?></span></th>
								</tr>
								</thead>
								<tbody>
								<?

									// echo $bcount;
								for ($i = 0; $i < $bcount - 1; $i++) {
								// for ($i = 0; $i < $bcount; $i++) {

									$pr = explode($field, $buycarr[$i]);
									$productid = $pr[1];
									$fr = explode(",", $pr[1]);
									$title = stripSlashes($pr[6]);
									$price = $pr[4];
									$pnum = (int)$pr[3];
									$thistotal = $price * $pnum;
									$total = $r[pstotal] + $r[alltotal] + $r[fptotal] - $r[pretotal];
									//ID
									$classid = (int)$fr[0];
									$id = (int)$fr[1];
									$shop = $empire->fetch1("select titlepic,titleurl,tprice from {$dbtbpre}ecms_shop where id='$id' and classid='$classid'");
									if (!$shop['titlepic']) {
										$shop['titlepic'] = "/e/data/images/notimg.gif";
									}
									$pj = $empire->fetch1("select * from {$dbtbpre}shoppj_list where id='$id' and classid='$classid' and ddid='$r[ddid]' and userid='$user[userid]'");
									if ($pj[pjid]) {
										$html = '<a href="javascript:void()" onClick="showpj(this,' . $r[ddid] . ',' . $i . ',' . $classid . ',' . $id . ')" rel="' . $title . '" rev="' . $shop['titlepic'] . '" style="color:#6ABB5B">查看评价</a>';
									} else {
										$html = '<a href="javascript:void()" onClick="shoppj(this,' . $r[ddid] . ',' . $i . ',' . $classid . ',' . $id . ')" rel="' . $title . '" rev="' . $shop['titlepic'] . '">发表评价</a>';
									}
									?>
									<tr>
										<td class="w1">
											<img width="50" height="50" src="<?= $shop['titlepic'] ?>" alt="<?= $title ?>">
										</td>
										<td class="left">
											<a href="<?= $shop[titleurl] ?>" target="_blank"><?= $title ?></a></td>
										<td class="w4"><?= substr($r[ddtime], 0, 10) ?></td>
										<td class="w4"><?= $html ?></td>
									</tr>
									<?
								}
								?>
								</tbody>
							</table>
						</div>
						<?
					}
					?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div id="showbox" style="display:none;">
		<div class="shoppjbox">
			<div class="m-odit">
				<table style="width:100%" id="pjtable">
					<tbody>
					<tr>
						<td class="w1"><img width="50" height="50" src="/e/data/images/notimg.gif"></td>
						<td class="left"><a></a></td>
					</tr>
					</tbody>
				</table>
			</div>
			<ul>
				<li><span>评分：</span>
					<p class="stars-grey"><i class="starts-red" id="pfnum"></i></p> <b class="starsnum"></b>
					<br><span>和描述相符度：</span>
					<p class="stars-grey"><i class="starts-red" id="msnum"></i></p> <b class="starsnum"></b>
					<br><span>发货速度：</span>
					<p class="stars-grey"><i class="starts-red" id="sdnum"></i></p> <b class="starsnum"></b>
					<br><span>物流满意度：</span>
					<p class="stars-grey"><i class="starts-red" id="wlnum"></i></p> <b class="starsnum"></b>
				</li>
				<li class="xindenr"><span>心得：</span></li>
				<li><span>晒单：</span>
					<div class="sdlist"></div>
				</li>
			</ul>
		</div>
	</div>

<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>