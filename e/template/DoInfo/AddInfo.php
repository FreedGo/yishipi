<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php
$public_diyr['pagetitle'] = $word;
$url = "<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=" . $mid . "'>管理信息</a>&nbsp;>&nbsp;" . $word . "&nbsp;(" . $mr[qmname] . ")";
require(ECMS_PATH . 'e/template/incfile/header.php');
?>
	<div class="hymain">
		<div class="block">
			<? require(ECMS_PATH . 'e/template/incfile/leftside.php'); ?>
			<div class="fr rmain">
				<link rel="stylesheet" href="/skin/member/dist/layui/css/layui.css">
				<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
				<script src="/skin/member/dist/layui/layui.js"></script>
				<link rel="stylesheet" href="/zjk/ossupload/style.css">
				<script type="text/javascript" src="/zjk/ossupload/lib/plupload-2.1.2/js/plupload.full.min.js"></script>
				<script type="text/javascript" src="/zjk/ossupload/upload-product.js"></script>
				<script>
					layui.use(['form','layer','laydate'],function () {
						var form = layui.form(),
						    layer= layui.layer,
						    laydate = layui.laydate;
					})
				</script>
				<h3><?= $word ?></h3>
				<div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
					提交者: <span class="csh"><?= $musername ?></span> 发布到的栏目: <span class="csh"><?= $postclass ?></span>
				</div>
				<div class="tab">
					<ul>
						<li class="tabhover"><a href="/e/member/EditInfo/">信息内容</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<form class="layui-form" name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'<?= $mid ?>');">
					<input type=hidden value=<?= $enews ?> name=enews>
					<input type=hidden value=<?= $classid ?> name=classid>
					<input name=id type=hidden id="id" value=<?= $id ?>>
					<input type=hidden value="<?= $filepass ?>" name=filepass>
					<input name=mid type=hidden id="mid" value=<?= $mid ?>>
					<div id="edituserxx">
						<?php
						@include($modfile);
						?>
						<div class="mt10"><input type="submit" name="Submit" value="提交" class="button small green">
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>