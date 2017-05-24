<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='取回密码';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;取回密码";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
$(function(){
	$("#questionqh").click(function(){$("#mailqhbox").hide();$("#mailqh").removeClass("tabhover");$(this).addClass("tabhover");$("#questionqhbox").show();});
	$("#mailqh").click(function(){$("#questionqhbox").hide();$("#questionqh").removeClass("tabhover");$(this).addClass("tabhover");$("#mailqhbox").show();});
})
</script>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>取回密码</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>忘记了密码了吗? 可以使用您注册时候填写的邮箱取回哦! </div>
      <div class="tab">
        <div class="ddsearch fr"><a href="/e/member/login/" class="c4095ce">会员登陆>></a></div>
        <ul>
          <li class="tabhover" id="mailqh"><a href="javascript:void();">邮箱取回密码</a></li>
          <li id="questionqh"><a href="javascript:void();">安全问题找回</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div id="mailqhbox" class="edituserxx">
      <form name="GetPassForm" method="POST" action="../doaction.php">
      <input name="enews" type="hidden" id="enews" value="SendPassword">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
              <tr>
                <td width="100" height="25" bgcolor="">用户名</td>
                <td bgcolor="" width=""><input name="username" type="text" id="username" size="38"></td>
              </tr>
              <tr>
                <td width="" height="25" bgcolor="">手机</td>
                <td bgcolor="" width=""><input name='phone' type='text' id='phone' value='' size="38" maxlength='50'></td>
              </tr>
			  	<tr> 
				  <td height="25" bgcolor="#FFFFFF"> <div align='left'>认证码</div></td>
				  <td height="25" bgcolor="#FFFFFF"> <input name='rzm' type='text' id='rzm' maxlength='30'>
					*<input  type="button" style="font-size: 12px; height: 22px; line-height: 19px;" value="发送验证码" onclick="sendrzm()" id="sendag"  ></td>
				</tr>
              <tr>
                <td width="" height="25" bgcolor="">验证码</td>
                <td bgcolor="" width=""><input name="key" type="text" id="key" size="6"> <img src="../../ShowKey/?v=getpassword" style="vertical-align:middle;"></td>
              </tr>
            </tbody>
          </table>
          <div class="pl78">
            <input type="submit" name="Submit" value="确认提交" class="button small gray">
          </div>
          </form>
          </div>
          <div id="questionqhbox" class="edituserxx" style="display:none;">
      		<form name="GetPassForm" method="POST" action="../doaction.php">
   <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr bgcolor="#FFFFFF"> 
      <td width="100">用 户 名</td>
      <td><input name="username" type="text" id="username" size="38"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">安全问题</td>
      <td><select name="question">
  <?=$public_r['add_question']?>
</select></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">安全回答</td>
      <td><input name="answer" type="text" id="answer" size="38"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">验 证 码</td>
      <td><input name="key" type="text" id="key" size="6"> <img src="../../ShowKey/?v=getpassword" style="vertical-align:middle;"></td>
    </tr>
</table>
		<div class="pl78">
        	<input name="enews" type="hidden" id="enews" value="SendhdPassword">
            <input type="submit" name="Submit" value="确认提交" class="button small gray">
          </div>
      </form>
    </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<SCRIPT language=javascript>
<!--
var secs = 120;
function sendrzm(){
     var tel=$("#phone").val();
	 var un=$("#username").val();
     $.getJSON('/e/member/doaction.php?enews=Rzsjq&phone=' + tel + '&username=' + un,
        function(data) {
            if(data.d=='2'){
			    alert(data.n);
			}else{
			    document.GetPassForm.sendag.disabled=true;
                for(i=1;i<=secs;i++) {
                 window.setTimeout("update(" + i + ")", i * 1000);
                }
			}
           
        });
		
  
}
function update(num) {
 if(num == secs) {
 document.GetPassForm.sendag.value ="重新发送认证码";
 document.GetPassForm.sendag.disabled=false;
 }
else {
 printnr = secs-num;
 document.GetPassForm.sendag.value = "(" + printnr +")重新发送认证码";
 }
}
//-->
</SCRIPT>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>