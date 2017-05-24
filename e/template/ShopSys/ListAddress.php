<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='配送地址列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;配送地址列表&nbsp;&nbsp;(<a href='AddAddress.php?enews=AddAddress'>增加配送地址</a>)";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script type="text/javascript" src="/eshop/js/jquery.cityselect.js"></script>
<script>
$(function(){
	$("#city").citySelect({
		nodata:"none",
		required:false
	}); 
})
</script>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>我的收货地址簿</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      您定购产品时，可以方便地从地址簿中选择收货地址。
	  </div>
      <div class="yuer f14 pl20 bold"><span class="csh">收货地址列表</span></div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="w1" style="white-space:nowrap;overflow:hidden;word-break:break-all;">收货人</th>
        <th class="left" style="white-space:nowrap;overflow:hidden;word-break:break-all;">详细地址</th>
        <th class="w6" style="white-space:nowrap;overflow:hidden;word-break:break-all;">电话/手机</th>
        <th class="row w180">操作</th>
        </tr>
        </thead>
        <tbody>
    <?php
	while($r=$empire->fetch($sql))
	{
		if ($r['isdefault']){
			$class="byellow";
			$mr='<a class="corg">当前默认</a>';	
		} else {
			$class="";	
			$mr='<a href="../doaction.php?enews=DefAddress&addressid='.$r['addressid'].'" onclick="return confirm(\'确认要设为默认?\');" class="cblue">设为默认</a>';
		}
	?>
        <tr class="<?=$class?>">
        <td><?=$r[truename]?></td>
        <td class="left"><?=$r[address]?></td>
        <td class="f-tac"><?=$r[phone]?></td>
        <td class="row f-tar"><?=$mr?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void();" class="editaddress cblue">编辑<div class="editAddressnr" style="display:none"><ul><li rel="addressid"><?=$r[addressid]?></li><li rel="addressname"><?=$r[addressname]?></li><li rel="truename"><?=$r[truename]?></li><li rel="address"><?=$r[address]?></li><li rel="email"><?=$r[email]?></li><li rel="phone"><?=$r[phone]?></li><li rel="zip"><?=$r[zip]?></li></ul></div></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../doaction.php?enews=DelAddress&addressid=<?=$r['addressid']?>" onclick="return confirm('确认要删除?');" class="cblue">删除</a>
        </td>
        </tr>
    <?php
	}
	?>
        <tr>
        <td colspan="4" class="">最多保存10个有效地址</td>
        </tr>
        </tbody>
        </table>
      </div>
      <div class="yuer f14 pl20 bold"><span class="csh">添加收货地址</span></div>
      <div id="edituserxx">
        <form action="../doaction.php" method="post" name="addform" id="addform">
        <input name="enews" type="hidden" id="enews" value="AddAddress">
        <input name="addressid" type="hidden" id="addressid" value="0">
        <input name="ecmsfrom" type="hidden" value="9">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tbody>
    <tr bgcolor="#FFFFFF">
      <td width="22%" height="25">地址名称：</td>
      <td width="78%" height="25"><input name="addressname" type="text" id="title2" value="例如: 家里地址" onBlur="if(this.value=='') this.value='例如: 家里地址';" onFocus="if(this.value=='例如: 家里地址') this.value='';" size="60"><span class="csh">*</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">收&nbsp;货&nbsp;人：</td>
      <td height="25"><input name="truename" type="text" id="addressname" value="" size="42"><span class="csh">*</span></td>
    </tr>
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
    <tr bgcolor="#FFFFFF">
      <td width="22%" height="25">详细地址：</td>
      <td width="78%" height="25"><input name="address" type="text" id="title2" value="" size="60"><span class="csh">*</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">电子邮箱：</td>
      <td height="25"><input name="email" type="text" id="truename" value="" size="42"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">联系电话：</td>
      <td height="25"><input name="phone" type="text" id="mycall" value="" size="42"><span class="csh">*</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">邮编：</td>
      <td height="25"><input name="zip" type="text" id="address" value="" size="42"></td>
    </tr>
</tbody></table>
	  <div class="pl78"><input type="submit" name="Submit" value="添加这个地址" class="button small gray"></div>
      </form>
      </div>
      
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>