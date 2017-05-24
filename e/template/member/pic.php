<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<!---- 头部开始 ---->
<?php
require(ECMS_PATH.'e/template/incfile/header.php');
?>


<!--- 中间部分结束 --->
	<script src="xiuxiu.js" type="text/javascript"></script>
	<script type="text/javascript">
    	window.onload=function(){
        xiuxiu.embedSWF("altContent",5,"100%","100%");
           /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
        xiuxiu.setUploadURL("<?=$public_r['newsurl']?>e/member/pic/upload.php");//修改为您自己的上传接收图片程序
        xiuxiu.setUploadType (2,"altContent");
        xiuxiu.onInit = function ()
        {
            xiuxiu.loadPhoto("<?=$userpic?>"); //默认背景
        }	
        xiuxiu.onUploadResponse = function (data)
        {
            //alert(data);
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
    
    <div align="center" style="width:915px;height:600px;margin:0 auto;">

<div id="altContent">
	
</div>
</div>
<!---底部开始--->
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>
</body>
</html>
