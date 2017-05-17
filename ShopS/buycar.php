<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='我的购物车';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;我的购物车";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
<?php
include('buycar/buycar_form.php');
?>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>