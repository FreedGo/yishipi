<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='注册会员';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;注册会员";
require(ECMS_PATH.'e/template/incfile/header.php');
?>

<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	/**
	 * 5.设置60s定时器
	 *
	 */
	function setTime60() {
		var btn    = $('.get-code-btn');
		var second = 60;
		timer      = setInterval(function () {
			btn.val(second + 's后可重发');
			second--;
			if (second < 0) {
				clearInterval(timer);
				$('.get-code-btn').removeClass('stop-mess').attr('disabled', false);
				btn.val('获取验证码');
			}
		}, 1000)
	}
	$(function () {
		//$('.get-code-btn').click(function(){
		//$('.get-code-btn').addClass('stop-mess').removeClass('start-mess').attr('disabled',false);
		//setTime60();
		//})
		var member={
			code:false
		};
		// 4.发送验证码
		$('.get-code-btn').click(function (event) {
			//防止ie低版本自动提交form
			event.preventDefault();
			var userName = $.trim($('.loginIput input[name=username]').val()),
			    phoneNum = $.trim($('.loginIput input[name=phone]').val());

			if (userName.length<=0){
				alert('请先填写用户名！')
			}else if (/\D/g.test(phoneNum)){
				alert('请填写正确的手机号码')
			}else{
				$.ajax({
					url : '/e/extend/message/index.php',
					type: 'get',
					data: {
						'phone'   : phoneNum,
						'username': userName
					}
				}).done(function (msg) {
					if (msg == 1) {
						//layer.msg('验证码发送成功');
						setTime60();
						$('.codeTips').html('验证码发送成功').show();
						$('.get-code-btn').addClass('stop-mess').attr('disabled', true);
					} else {
						//layer.msg('验证码发送失败',{icon: 5});
						$('.codeTips').html('验证码发送失败').show();

						$('.get-code-btn').removeClass('stop-mess').attr('disabled', false);
					}
					console.log(msg);
				}).fail(function () {
					//layer.msg('验证码发送失败',{icon: 5});
					//layer.msg('验证码发送失败',{icon: 5});
					$('.codeTips').html('验证码发送失败').show();

					$('.get-code-btn').removeClass('stop-mess').attr('disabled', false);
				});

			}




		});

		// 5 表单验证码
		$('#code').on('keyup',function () {
			$this = $(this);
			var code = $.trim($this.val());
			if (code.length>=6){
				if (code.length !=6||!/^\d{6}$/.test(code)){
					$('.codeTips').html('验证码为6位数字，请正确填写').show();
					$this.css('borderColor','red');
				}else {
					phoneNum = $.trim($('.loginIput input[name=phone]').val());
					$.ajax({
						url:'/e/extend/message/shenhe.php',
						type:'get',
						data:{
							'phone':phoneNum,
							'code':code
						},
						dataType:'html'
					}).done(function (msg) {
						if (msg== 1){
							$('.codeTips').html('验证码正确').show();
							$this.css('borderColor','#87AAAC');
							member.code=true;
						}else{
							$('.codeTips').html('验证码错误，请重新填写').show();
							$this.css('borderColor','red');
							member.code=false;
						}
					}).error(function (msg) {
						console.log(msg)
					})
				}
			}
		})

	$(".reFORM").submit(function(){
		if(!member.code){
			alert("验证码输入错误！！！");
			return false;
		}
	})
	
	})

	
</script>

<form name=userinfoform method=post class="reFORM" enctype="multipart/form-data" action=../doaction.php>
<input type=hidden name=enews value=register>
<input name="groupid" type="hidden" id="groupid" value="<?=$groupid?>">
<input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
<div class="loginbox">
    	<div class="block">
        	<div class="loginform">
            	<h1>注册帐号 	<? if($public_r['regkey_ok']){ ?><div class="third-login" style="display:inline-block; margin-left:10px;"> <a hidefocus="true" href="/e/memberconnect/?apptype=qq" class="qq" target="_blank">QQ</a> <a hidefocus="true" href="/e/memberconnect/?apptype=sina" class="sina" target="_blank">新浪微博</a></div><? } ?></h1>
                <ul>
						<ul class="loginIput">
							<li class="l_input">用户名称：</li>
							<li><input name='username' type='text' class="text" id='username' maxlength='30'></li>
						</ul>
						<ul class="loginIput">
							<li class="l_input">用户密码：</li>
							<li><input name='password' type='password' class="text" id='password' maxlength='20'></li>
						</ul>
						<ul class="loginIput">
							<li class="l_input">重复密码：</li>
							<li><input name='repassword' type='password' class="text" id='repassword' maxlength='20'></li>
						</ul>

						<ul class="loginIput">
							<li class="l_input">手机号码：</li>
							<li><input name='phone' type='text' class="text" id='phone' maxlength='50'></li>
						</ul>

						<ul class="loginIput">
							<li class="l_input">&nbsp;&nbsp;&nbsp;验证码：</li>
							<li><input name='code' type='text' class="text" id='code' maxlength='25' style="width:100px"> *
								<!--<input type="button" value="获得验证码" onclick="javascript:get_code();">-->
								<input type="button" value="获得验证码" class="get-code-btn mess" style="width:70px;">
								<span class="codeTips"></span>
							</li>
						</ul>
<? if($public_r['regkey_ok']){ ?>
                    <li style="height:20px; margin-bottom:0;" class="inputfont"><input type="text" class="input" name="key" value=""  style="width:80px; height:10px; padding:5px 15px; float:left; margin-right:5px;"><span class="inputreplace">验证码</span> <img src="../../ShowKey/?v=reg" onClick="this.src='../../ShowKey/?v=reg&'+Math.random();" alt="点击刷新验证码"></li>
<? } ?>
                    <li><input type="submit" class="loginbtn" value="立刻注册"></li>
                </ul>
<? if(!$public_r['regkey_ok']){ ?>
                <h1>使用第三方帐号注册</h1>
                <div class="third-login"> <a hidefocus="true" href="/e/memberconnect/?apptype=qq" class="qq" target="_blank">QQ</a> <a hidefocus="true" href="/e/memberconnect/?apptype=sina" class="sina" target="_blank">新浪微博</a></div>
<? } ?>
            </div>
        </div>
</div>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>