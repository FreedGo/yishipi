<?php
if(!defined('InEmpireCMS'))
{exit();}
?><table width='100%' align='center' cellpadding=3 cellspacing=1 bgcolor='#DBEAF5'><tr><td width='16%' height=25 bgcolor='ffffff'>公司名称</td><td bgcolor='ffffff'><input name="company" type="text" id="company" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[company]))?>" size="38">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>邀请人手机</td><td bgcolor='ffffff'>
<input name="yaophone" type="text" id="yaophone" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[yaophone]))?>" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>自己邀请码</td><td bgcolor='ffffff'>
<input name="yaoqingma" type="text" id="yaoqingma" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[yaoqingma]))?>" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>邀请人</td><td bgcolor='ffffff'>
<input name="yaoqingren" type="text" id="yaoqingren" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[yaoqingren]))?>" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>邀请总数</td><td bgcolor='ffffff'>
<input name="yaoqingall" type="text" id="yaoqingall" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[yaoqingall]))?>" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>商家状态</td><td bgcolor='ffffff'><select name="bus_tate" id="bus_tate"><option value="未认证"<?=$addr[bus_tate]=="未认证"||$ecmsfirstpost==1?' selected':''?>>未认证</option><option value="已认证"<?=$addr[bus_tate]=="已认证"?' selected':''?>>已认证</option><option value="待审核"<?=$addr[bus_tate]=="待审核"?' selected':''?>>待审核</option><option value="已审核"<?=$addr[bus_tate]=="已审核"?' selected':''?>>已审核</option></select></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>企业法人</td><td bgcolor='ffffff'>
<input name="truename" type="text" id="truename" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[truename]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>联系电话</td><td bgcolor='ffffff'><input name="mycall" type="text" id="mycall" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[mycall]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>手机</td><td bgcolor='ffffff'><input name="phone" type="text" id="phone" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[phone]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>会员头像</td><td bgcolor='ffffff'>	<script type="text/javascript">
    	window.onload=function(){
        xiuxiu.embedSWF("altContent",5,"100%","100%");
          <!-- /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/-->
        xiuxiu.setUploadURL("<?=$public_r['newsurl']?>e/member/pic/upload.php");//修改为您自己的上传接收图片程序
        xiuxiu.setUploadType (2,"altContent");
        xiuxiu.onInit = function ()
        {
            xiuxiu.loadPhoto("<?=$userpic?>"); <!--默认背景-->
        }	
        xiuxiu.onUploadResponse = function (data)
        {
			if(data!="上传成功"){ 
					swal({ 
					  title: "头像上传失败", 
					  text: "", 
					  type: "error", 
					  showCancelButton: false, 
					  confirmButtonColor: "#DD6B55", 
					  confirmButtonText: "确定", 
					  closeOnConfirm: false 
					});
			}else{
					swal({ 
					  title: "上传成功", 
					  text: "", 
					  type: "success", 
					  showCancelButton: false, 
					  confirmButtonColor: "#DD6B55", 
					  confirmButtonText: "确定", 
					  closeOnConfirm: false 
					});
			}
        }
    	}
    </script>
    
    <div align="center" style="position:relative;width:700px;height:450px;margin:0 auto;">
<div class="fugai"></div>
<div id="altContent">
	
</div>
</div></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>联系地址</td><td bgcolor='ffffff'><input name="address" type="text" id="address" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address]))?>" size="50">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>公司介绍</td><td bgcolor='ffffff'><textarea name="saytext" cols="65" rows="10" id="saytext"><?=$ecmsfirstpost==1?"":stripSlashes($addr[saytext])?></textarea>
</td></tr></table>