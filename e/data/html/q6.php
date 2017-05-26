<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>

<div class="layui-form-item">
	<label class="layui-form-label">商品名称</label>
	<div class="layui-input-block">
		<input type="text" name="title" lay-verify="required" autocomplete="off" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">特殊属性</label>
	<div class="layui-input-inline">
		<input type="text" name="keyboard" value="<?= stripSlashes($r[keyboard]) ?>"  autocomplete="off" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>" class="layui-input">
	</div>
	<div class="layui-form-mid layui-word-aux">(多个请用&quot;,&quot;隔开)</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">商品缩略图</label>
	<div class="layui-input-block">
		<!--<input type="file" name="titlepicfile"  id="demo-upload-unwrap">-->
		<div id="container1" class="contain">
			<div class="imageInfo">
				<input type="hidden" id="imageUrl" name="titlepic" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>">
				<div id="ossfile"></div>
				<a id="selectfiles" href="javascript:void(0);" class='btn'>选择文件</a>
				<a id="postfiles" href="javascript:void(0);" class='btn'>开始上传</a>
			</div>
			<div class="imageWarp">
				<img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>" alt="">
			</div>
		</div>
	</div>
</div>
<div class="layui-form-item layui-form-text">
	<label class="layui-form-label">简单描述</label>
	<div class="layui-input-block">
		<textarea name="intro" cols="60" rows="6" id="intro" placeholder="请输入内容" class="layui-textarea"><?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'intro', stripSlashes($r[intro])) ?></textarea>
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">品牌</label>
	<div class="layui-input-block">
		<input type="text" name="brand" lay-verify="required" autocomplete="off" id="brand" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'brand', stripSlashes($r[brand])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">到期时间</label>
	<div class="layui-input-inline">
		<input class="layui-input" name="expday" id="expday" value="<?= $ecmsfirstpost == 1 ? "" : ehtmlspecialchars(stripSlashes($r[expday])) ?>"  onclick="layui.laydate({elem: this, istime: true,min: laydate.now() ,format: 'YYYY-MM-DD hh:mm'})">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">条形码</label>
	<div class="layui-input-block">
		<input type="text" name="bar_code" lay-verify="required" autocomplete="off" id="bar_code" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'bar_code', stripSlashes($r[bar_code])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">货号</label>
	<div class="layui-input-block">
		<input type="text" name="no" lay-verify="required" autocomplete="off" id="no" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'no', stripSlashes($r[no])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">过关单</label>
	<div class="layui-input-block">
		<!--<input type="file" name="titlepicfile"  id="demo-upload-unwrap">-->
		<div id="container2" class="contain">
			<div class="imageInfo">
				<input type="hidden" id="imageUrl2" name="bill_path" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[bill_path])) ?>">
				<div id="ossfile"></div>
				<a id="selectfiles2" href="javascript:void(0);" class='btn'>选择文件</a>
				<a id="postfiles2" href="javascript:void(0);" class='btn'>开始上传</a>
			</div>
			<div class="imageWarp">
				<img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[bill_path])) ?>" alt="">
			</div>
		</div>
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">税单</label>
	<div class="layui-input-block">
		<!--<input type="file" name="titlepicfile"  id="demo-upload-unwrap">-->
		<div id="container2" class="contain">
			<div class="imageInfo">
				<input type="hidden" id="imageUrl3" name="pass_customs_path" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[pass_customs_path])) ?>">
				<div id="ossfile"></div>
				<a id="selectfiles2" href="javascript:void(0);" class='btn'>选择文件</a>
				<a id="postfiles2" href="javascript:void(0);" class='btn'>开始上传</a>
			</div>
			<div class="imageWarp">
				<img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[bill_path])) ?>" alt="">
			</div>
		</div>
	</div>
</div>


<table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>商品名称</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input name="title" type="text" size="42" value="--><?//= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?><!--">-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>特殊属性</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input name="keyboard" type="text" size=42 value="--><?//= stripSlashes($r[keyboard]) ?><!--">-->
	<!--		<font color="#666666">(多个请用&quot;,&quot;隔开)</font>-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>商品缩略片</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input type="file" name="titlepicfile" size="60">-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>发布时间</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!---->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>简单描述</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<textarea name="intro" cols="60" rows="10" id="intro">--><?//= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'intro', stripSlashes($r[intro])) ?><!--</textarea>-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>品牌</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input name="brand" type="text" id="brand" value="--><?//= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'brand', stripSlashes($r[brand])) ?><!--" size="">-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>到期时间</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input name="expday" type="text" id="expday" value="--><?//= $ecmsfirstpost == 1 ? "" : ehtmlspecialchars(stripSlashes($r[expday])) ?><!--" size="12" onclick="setday(this);">-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>条形码</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input name="bar_code" type="text" id="bar_code" value="--><?//= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'bar_code', stripSlashes($r[bar_code])) ?><!--" size="">-->
	<!--	</td>-->
	<!--</tr>-->
	<!--<tr>-->
	<!--	<td width='16%' height=25 bgcolor='ffffff'>货号</td>-->
	<!--	<td bgcolor='ffffff'>-->
	<!--		<input name="no" type="text" id="no" value="--><?//= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'no', stripSlashes($r[no])) ?><!--" size="">-->
	<!--	</td>-->
	<!--</tr>-->
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>过关单</td>
		<td bgcolor='ffffff'>
			<input type="file" name="pass_customs_pathfile" size="45">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>税单</td>
		<td bgcolor='ffffff'>
			<input type="file" name="bill_pathfile" size="45">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>卫生检测证明</td>
		<td bgcolor='ffffff'>
			<input type="file" name="health_detection_pathfile" size="45">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>包装方式</td>
		<td bgcolor='ffffff'>
			<input name="pack_way" type="text" id="pack_way" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'pack_way', stripSlashes($r[pack_way])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>建议零售价</td>
		<td bgcolor='ffffff'>
			<input name="dan_price" type="text" id="dan_price" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'dan_price', stripSlashes($r[dan_price])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>单价</td>
		<td bgcolor='ffffff'>
			<input name="tprice" type="text" id="tprice" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'tprice', stripSlashes($r[tprice])) ?>" size="60">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>箱价</td>
		<td bgcolor='ffffff'>
			<input name="price" type="text" id="price" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'price', stripSlashes($r[price])) ?>" size="60">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>价格浮动</td>
		<td bgcolor='ffffff'>
			<style>
				* {
					margin: 0;
					paddling: 0;
				}

				.sell {
					paddling-top: 10px;
					paddling-bottom: 10px;
				}

				#dd11 {
					width: 100px;
					height: 20px;
					/*background-color: red;*/
					position: relative;
					border: 1px solid #ccc;
					border-radius: 10px;
					float: left;
					cursor: pointer;
				}

				#cc1 {
					position: absolute;
					left: 0px;
					top: 0px;
					height: 20px;
					background-color: blue;
					width: 0px;
					border-radius: 10px;
				}

				i {
					display: block;
					width: 20px;
					height: 20px;
					background-color: #00cc99;
					float: left;
					cursor: pointer;
				}

				input {
					height: 20px;
					width: 100px;
				}

				.shuru3 {
					float: left;
				}

				#PriceFluctuation {
					float: left;
				}
			</style>
			<div class="sell">
				<input name="PriceFluctuation" type="text" id="PriceFluctuation" value="" size="300">
				<div id="dd11">
					<div id="cc1"></div>
				</div>
				<div class="jaijian1">
					<i class="jia1">+</i>
					<i class="jian1">-</i>
				</div>
				<input type="text" class="shuru3">%
			</div>


			<script>
				function toDecimal1(x) {
					var f = parseFloat(x);
					if (isNaN(f)) {
						return;
					}
					f = Math.round(x * 100) / 100;
					return f;
				}
				$('#dd11').click(function (event) {
					var y = Math.ceil(event.offsetX / 10) * 10; //获取鼠标在父元素的y坐标
					console.log(y);
					console.log(event.clientX);
					var yy = $(this).width(); //当前元素长度
					var z  = (y / yy * 1000) / 10.00 + '%'; // 得到百分值
					var zx = y / yy * 100;
					$('#cc1').css('width', y + 'px') //设置子元素长度
					$('#PriceFluctuation')[0].value = toDecimal1((1 + Math.floor(zx) / 100) * Number($('#price').val()));
					$('.shuru3')[0].value           = Math.floor(zx);
				})
				$('.jia1').click(function () {

					var y = Math.ceil($('#cc1').width());//获取当前子元素的长度 除以10 向上取整
					if (y < 1010) {
						var s  = y++;  //点击长度加1
						var yy = $('#dd11').width();  //获取父元素长度
						var z  = (s / yy * 100) + '%'; // 获取百分比
						var zx = s / yy * 100;
						$('#cc1').css('width', y + 'px'); //设置子元素长度
					}
					$('#PriceFluctuation')[0].value = toDecimal1((1 + Math.floor(zx) / 100) * Number($('#price').val()));
					$('.shuru3')[0].value           = Math.floor(zx);
					console.log(1)
				})
				$('.jian1').click(function () {
					var y = Math.ceil($('#cc1').width());//获取当前子元素的长度 除以10 向上取整
					if (y > 0) {
						var s  = y--;  //点击长度加1
						var yy = $('#dd11').width();   // 获取百分比
						var zx = s / yy * 100;
						$('#cc1').css('width', y + 'px'); //设置子元素长度
					}

					$('#PriceFluctuation')[0].value = toDecimal1((1 + Math.floor(zx) / 100) * Number($('#price').val()));
					$('.shuru3')[0].value           = Math.floor(zx);
				})
				$('#price').keyup(function () {
					var y                           = (1 + Number($('.shuru3').val()) / 100);
					$('#PriceFluctuation')[0].value = toDecimal1((1 + y) * Number($('#price').val()));
				})
				$('.shuru3').keyup(function () {
					var y  = Number($('#price').val());
					var y1 = Number($('.shuru3').val());
					var z  = y1 / 100 * $('#dd11').width();
					console.log(y);
					$('#cc1').css('width', z + 'px');
					$('#PriceFluctuation')[0].value = toDecimal1(y * (1 + Number($('.shuru3').val()) / 100));
				})

			</script>

		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>产地</td>
		<td bgcolor='ffffff'>
			<input name="chandi" type="text" id="chandi" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'chandi', stripSlashes($r[chandi])) ?>" size="60">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>起批量</td>
		<td bgcolor='ffffff'>
			<input name="qipiliang" type="text" id="qipiliang" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'qipiliang', stripSlashes($r[qipiliang])) ?>" size="60">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>箱规</td>
		<td bgcolor='ffffff'>
			<input name="xianggui" type="text" id="xianggui" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'xianggui', stripSlashes($r[xianggui])) ?>" size="60">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>单品规格</td>
		<td bgcolor='ffffff'>
			<input name="danguige" type="text" id="danguige" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'danguige', stripSlashes($r[danguige])) ?>" size="60">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>保质期</td>
		<td bgcolor='ffffff'>
			<input name="expried_time" type="text" id="expried_time" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'expried_time', stripSlashes($r[expried_time])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>类别</td>
		<td bgcolor='ffffff'>
			<input name="leibie" type="text" id="leibie" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'leibie', stripSlashes($r[leibie])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>储存方法</td>
		<td bgcolor='ffffff'>
			<input name="save_way" type="text" id="save_way" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'save_way', stripSlashes($r[save_way])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>价格上调</td>
		<td bgcolor='ffffff'>
			<style>
				* {
					margin: 0;
					paddling: 0;
				}

				.sell {
					paddling-top: 10px;
					paddling-bottom: 10px;
				}

				#dd11 {
					width: 100px;
					height: 20px;
					/*background-color: red;*/
					position: relative;
					border: 1px solid #ccc;
					border-radius: 10px;
					float: left;
					cursor: pointer;
				}

				#cc1 {
					position: absolute;
					left: 0px;
					top: 0px;
					height: 20px;
					background-color: blue;
					width: 0px;
					border-radius: 10px;
				}

				i {
					display: block;
					width: 20px;
					height: 20px;
					background-color: #00cc99;
					float: left;
					cursor: pointer;
				}

				input {
					height: 20px;
					width: 100px;
				}

				.shuru3 {
					float: left;
				}

				#PriceIncrease {
					float: left;
				}
			</style>


			<div class="sell">
				<input name="PriceIncrease" type="text" id="PriceIncrease" value="" size="300">

			</div>

			<script>
				function toDecimal(x) {
					var f = parseFloat(x);
					if (isNaN(f)) {
						return;
					}
					f = Math.round(x * 100) / 100;
					return f;
				}
				$('#price').keyup(function () {
					$('#PriceIncrease')[0].value = toDecimal(Number($('#price').val()) * 1.05);
				})


			</script>

		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>库存</td>
		<td bgcolor='ffffff'>
			<input name="pmaxnum" type="text" id="pmaxnum" value="<?= $ecmsfirstpost == 1 ? "100" : DoReqValue($mid, 'pmaxnum', stripSlashes($r[pmaxnum])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>配送方式</td>
		<td bgcolor='ffffff'><select name="express" id="express">
				<option value="运东西网"<?= $r[express] == "运东西网" || $ecmsfirstpost == 1 ? ' selected' : '' ?>>运东西网</option>
				<option value="快递鸟"<?= $r[express] == "快递鸟" ? ' selected' : '' ?>>快递鸟</option>
				<option value="自行取货"<?= $r[express] == "自行取货" ? ' selected' : '' ?>>自行取货</option>
			</select></td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>体积</td>
		<td bgcolor='ffffff'>
			<input name="tiji" type="text" id="tiji" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'tiji', stripSlashes($r[tiji])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>服务</td>
		<td bgcolor='ffffff'>
			<input name="fuwu" type="text" id="fuwu" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'fuwu', stripSlashes($r[fuwu])) ?>" size="">
		</td>
	</tr>
	<tr>
		<td width='16%' height=25 bgcolor='ffffff'>产品图</td>
		<td bgcolor='ffffff'>
			<link rel="stylesheet" type="text/css" href="/zjk/oss/webuploader.css"/>
			<link rel="stylesheet" type="text/css" href="/zjk/oss/style.css"/>
			<input type="hidden" name="productpic" value="" id="photos"/>
			<div id="wrapper">
				<div id="container">
					<!--头部，相册选择和格式选择-->

					<div id="uploader">
						<div class="queueList">
							<div id="dndArea" class="placeholder">
								<div id="filePicker"></div>
								<!--<p>或将照片拖到这里，单次最多可选300张</p>-->
							</div>
						</div>
						<div class="statusBar" style="display:none;">
							<div class="progress">
								<span class="text">0%</span>
								<span class="percentage"></span>
							</div>
							<div class="info"></div>
							<div class="btns">
								<div id="filePicker2"></div>
								<div class="uploadBtn">开始上传</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="/zjk/oss/webuploader.js"></script>
			<script type="text/javascript" src="/zjk/oss/upload.js"></script>
		</td>
	</tr>
	<tr>
		<td height=25 colspan=2 bgcolor='ffffff'>
			<div align=left>商品介绍</div>
		</td>
	</tr>
</table>
<div style='background-color:#D0D0D0'><?php if (!isset($Field)) { ?>

		<script type="text/javascript" src="/e/extend/ueditor/ueditor.config.js"></script>

		<script type="text/javascript" src="/e/extend/ueditor/ueditor.all.js"></script>

	<?php } ?>

	<?php

	/**
	 * ECMS UEditor编辑器字段配置
	 * User:653186017 longzexiaofang@qq.com
	 */

	$Field = 'newstext'; //*字段名称

	$FieldVal = $ecmsfirstpost == 1 ? "" : stripSlashes($r[$Field]);

	$isadmin = 0;

	if ($enews == 'AddNews' || $enews == 'EditNews') {
		$isadmin = 1;
	} else {
		$FieldVal = empty($ecmsfirstpost) ? DoReqValue($mid, $Field, $FieldVal) : $r[$Field];
	}

	?>

	<script id="<?= $Field ?>" name="<?= $Field ?>" type="text/plain"><?= $FieldVal ?></script>

	<script type="text/javascript">

		var ue = UE.getEditor('<?=$Field?>', {

			pageBreakTag: '[!----------------empirenews.page--]' //分页符

			, serverUrl: "/e/extend/ueditor/php/controller.php?isadmin=<?=$isadmin?>"

			//,toolbars:[['FullScreen', 'Source', 'Undo', 'Redo','Bold']] //选择自己需要的工具按钮名称

		});

		ue.ready(function () {

			ue.execCommand('serverparam', {

				'classid': '<?=$classid?>',

				'filepass': '<?=$filepass?>',

				'userid': '<?=$isadmin ? $logininid : $muserid?>',

				'username': '<?=$isadmin ? $loginin : $musername?>',

				'rnd': '<?=$isadmin ? $loginrnd : $mrnd?>'

			});

		});

	</script>
</div>
<table width='100%' align=center cellpadding=3 cellspacing=1 bgcolor='#DBEAF5'></table>