<?php
if(!defined('InEmpireCMS'))
{exit();}
?><table width='100%' align='center' cellpadding=3 cellspacing=1 bgcolor='#DBEAF5'><tr><td width='16%' height=25 bgcolor='ffffff'>商家名称</td><td bgcolor='ffffff'><input name="company" type="text" id="company" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[company]))?>" size="38">
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
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>简介</td><td bgcolor='ffffff'><textarea name="saytext" cols="65" rows="10" id="saytext"><?=$ecmsfirstpost==1?"":stripSlashes($addr[saytext])?></textarea>
</td></tr></table>