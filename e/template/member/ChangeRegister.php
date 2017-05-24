<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='注册会员';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;选择注册会员类型";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
  <form name="ChRegForm" method="GET" action="index.php">
  <input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
<div class="loginbox">
    	<div class="block">
        	<div class="loginform">
            	<h1>选择注册会员类型</h1>
                <ul>
                	<?php
		while($r=$empire->fetch($sql))
		{
			$checked='';
			if($r[groupid]==eReturnMemberDefGroupid())
			{
				$checked=' checked';
			}
		?>
          <li>
			<input type="radio" name="groupid" id="group<?=$r[groupid]?>" value="<?=$r[groupid]?>"<?=$checked?>>
              <label for="group<?=$r[groupid]?>"><span class="c666"><?=$r[groupname]?></span></label>
          </li>
		<?php
		}
		?>
                    <li><input type="submit" class="loginbtn" value="下一步"></li>
                </ul>
                <h1>使用第三方帐号注册</h1>
                <div class="third-login"> <a hidefocus="true" href="/e/memberconnect/?apptype=qq" class="qq" target="_blank">QQ</a> <a hidefocus="true" href="/e/memberconnect/?apptype=sina" class="sina" target="_blank">新浪微博</a></div>
            </div>
        </div>
</div>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>