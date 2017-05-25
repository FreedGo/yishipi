<?php

if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php

$public_diyr['pagetitle'] = '优惠方案列表';
$url = "<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;配送地址列表&nbsp;&nbsp;(<a href='AddAddress.php?enews=AddAddress'>优惠方案</a>)";
require(ECMS_PATH . 'e/template/incfile/header.php');
?>
	<!--引用js/css-->
	<link rel="stylesheet" href="/skin/member/dist/layui/css/layui.css">
	<style>
		.reduce:last-child .delReduce,.reduce:last-child .addReduce{
			display: inline-block;
		}
		.addReduce,.delReduce{
			font-size: 22px;
			cursor: pointer;
			transition:all 0.1s ease 0s;
		}
		.addReduce:hover{
			color: #5FB878;
		}
		.delReduce:hover{
			color: red;

		}
		.addReduce,.delReduce{
			display: none;
		}

	</style>
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="/skin/member/dist/layui/layui.js"></script>
	<script src="/skin/member/dist/js/member-reduce.min.js"></script>
	<div class="hymain">
		<div class="block">
			<? require(ECMS_PATH . 'e/template/incfile/leftside.php'); ?>
			<div class="fr rmain">
				<h3>我的优惠方案</h3>
				<div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
					您发布产品时，可以方便地从方案簿中选择优惠方案。
				</div>
				<div class="yuer f14 pl20 bold"><span class="csh">优惠方案列表</span></div>
				<div class="addresslist">
					<table class="layui-table">
						<thead>
						<tr>
							<th class="w1" style="white-space:nowrap;overflow:hidden;word-break:break-all;">方案名称</th>
							<th class="left" style="white-space:nowrap;overflow:hidden;word-break:break-all;">方案内容</th>
							<th class="w6" style="white-space:nowrap;overflow:hidden;word-break:break-all;">添加时间</th>
							<th class="w1">操作</th>
						</tr>
						</thead>
						<tbody>

						<?php

						while ($r = $empire->fetch($sql)) {

							if ($r['isdefault']) {
								$class = "byellow";
								$mr = '<a class="corg">当前默认</a>';
							} else {
								$class = "";
								$mr = '<a href="../doaction.php?enews=DefAddress&addressid=' . $r['addressid'] . '" onclick="return confirm(\'确认要设为默认?\');" class="cblue">设为默认</a>';
							}
							?>
							<tr class="<?= $class ?>">
								<td><?= $r[list_name] ?></td>
								<td class="left">上月累计消费：
									<?
									$i = 0;
									$arrListText = explode("\r\n",$r[listtext]);
									$arrLength = count($arrListText);
									foreach ($arrListText as $text){
										$i++;
										if ($i<$arrLength){
											$arrText = explode(":::",$text);
											// print_r($arrText);
											echo '满'.$arrText[0].'元，减'.$arrText[1].'%,';
										}
									}
									?>
								</td>
								<td class="f-tac"><?= date('Y-m-d H:i',$r[list_time])?></td>
								<td class="row f-tar">
									<a href="javascript:void(0);" onclick="delectReduce('<?= $r[id] ?>')"  class="cblue">删除</a>
								</td>
							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan="4" class="">最多保存10个有效方案</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="yuer f14 pl20 bold"><span class="csh">添加方案</span></div>
				<div id="edituserxx">

					<form class="layui-form" action="../doaction.php" method="post" name="addform" id="addform">
						<input name="enews" type="hidden" id="enews" value="AddAddress">
						<input name="addressid" type="hidden" id="addressid" value="0">
						<input name="ecmsfrom" type="hidden" value="9">
						<div class="layui-form-item">
							<label class="layui-form-label">方案名称：</label>
							<div class="layui-input-block">
								<input type="text" name="addressname"  maxlength="20" required  lay-verify="required" placeholder="方案名称" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="reduce-warp">
							<div class="layui-form-item reduce">
								<div class="layui-inline">
									<label class="layui-form-label">优惠1：</label>
									<div class="layui-form-mid">上月累计消费</div>
									<div class="layui-input-inline" style="width: 100px;">
										<input type="text" name="allPrice1" placeholder="￥" autocomplete="off" class="layui-input" lay-verify="price">
									</div>
									<div class="layui-form-mid">总额优惠百分之</div>
									<div class="layui-input-inline" style="width: 100px;">
										<input type="text" name="reduce1" placeholder="%" autocomplete="off" class="layui-input" lay-verify="percent">
									</div>
									<span class=" addReduce layui-btn layui-btn-primary layui-btn-small layui-btn-radius" >
									<i class="layui-icon">&#xe654;</i>
								</span>
								</div>
							</div>
							<div class="layui-form-item reduce">
								<div class="layui-inline">
									<label class="layui-form-label">优惠2：</label>
									<div class="layui-form-mid">上月累计消费</div>
									<div class="layui-input-inline" style="width: 100px;">
										<input type="text" name="allPrice2" placeholder="￥" autocomplete="off" class="layui-input" lay-verify="price">
									</div>
									<div class="layui-form-mid">总额优惠百分之</div>
									<div class="layui-input-inline" style="width: 100px;">
										<input type="text" name="reduce2" placeholder="%" autocomplete="off" class="layui-input" lay-verify="percent">
									</div>
									<span class=" addReduce layui-btn layui-btn-primary layui-btn-small layui-btn-radius" >
									<i class="layui-icon">&#xe654;</i>
								</span>
									<span  class="delReduce layui-btn layui-btn-primary layui-btn-small layui-btn-radius">
									<i class="layui-icon">&#xe640;</i>
								</span>
								</div>
							</div>
							<div class="layui-form-item reduce">
								<div class="layui-inline">
									<label class="layui-form-label">优惠3：</label>
									<div class="layui-form-mid">上月累计消费</div>
									<div class="layui-input-inline" style="width: 100px;">
										<input type="text" name="allPrice3" placeholder="￥" autocomplete="off" class="layui-input" lay-verify="price">
									</div>
									<div class="layui-form-mid">总额优惠百分之</div>
									<div class="layui-input-inline" style="width: 100px;">
										<input type="text" name="reduce3" placeholder="%" autocomplete="off" class="layui-input" lay-verify="percent">
									</div>
									<span class="addReduce layui-btn layui-btn-primary layui-btn-small layui-btn-radius" >
									<i class="layui-icon">&#xe654;</i>
								</span>
									<span  class="delReduce layui-btn layui-btn-primary layui-btn-small layui-btn-radius">
									<i class="layui-icon">&#xe640;</i>
								</span>
								</div>
							</div>
						</div>


						<!--<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">-->
							<!--<tbody>-->
							<!--<tr bgcolor="#FFFFFF">-->
							<!--	<td width="22%" height="25">方案名称：</td>-->
							<!--	<td width="78%" height="25">-->
							<!--		<input name="addressname" type="text" id="title2" value="" placeholder="例如: 家里地址"><span class="csh">*</span>-->
							<!--	</td>-->
							<!--</tr>-->
							<!--<tr bgcolor="#FFFFFF">-->
							<!--	<td height="25">方案类型：</td>-->
							<!--	<td height="25">-->
							<!--		<input name="truename" type="text" id="addressname" value="" size="42"><span class="csh">*</span>-->
							<!--	</td>-->
							<!--</tr>-->
							<!--<tr bgcolor="#FFFFFF">
							  <td height="25">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;区：</td>
							  <td height="25" style="padding-left:9px;">
							  <div id="city">
							  <select class="prov"></select>
								<select class="city" disabled="disabled"></select>
								<select class="dist" disabled="disabled"></select>
							  </div>
							</td>
							</tr>-->
							<!--<tr bgcolor="#FFFFFF">-->
							<!--	<td width="22%" height="25">详细地址：</td>-->
							<!--	<td width="78%" height="25">-->
							<!--		<input name="address" type="text" id="title2" value="" size="60"><span class="csh">*</span>-->
							<!--	</td>-->
							<!--</tr>-->
							<!--<tr bgcolor="#FFFFFF">-->
							<!--	<td height="25">电子邮箱：</td>-->
							<!--	<td height="25"><input name="email" type="text" id="truename" value="" size="42"></td>-->
							<!--</tr>-->
							<!--<tr bgcolor="#FFFFFF">-->
							<!--	<td height="25">联系电话：</td>-->
							<!--	<td height="25">-->
							<!--		<input name="phone" type="text" id="mycall" value="" size="42"><span class="csh">*</span>-->
							<!--	</td>-->
							<!--</tr>-->
							<!--<tr bgcolor="#FFFFFF">-->
							<!--	<td height="25">邮编：</td>-->
							<!--	<td height="25"><input name="zip" type="text" id="address" value="" size="42"></td>-->
							<!--</tr>-->
						<!--	</tbody>-->
						<!--</table>-->
						<div class="pl78"><input type="submit" name="Submit" value="确认无误，添加" lay-submit="" lay-filter="demo2" class="layui-btn layui-btn-warm">
						</div>
					</form>
				</div>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>

<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>