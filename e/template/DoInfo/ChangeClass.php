<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='增加信息';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=".$mid."'>管理信息</a>&nbsp;>&nbsp;增加信息&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>增加信息 <span class="f12 noBold c999">请注意遵守国家法律!</span></h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      您好, <span class="csh"><?=$musername?></span> 请选择要增加信息的栏目
	  </div>
      <div class="tab">
      	<div class="ddsearch fr">请选择蓝色背景的栏目</div>
        <ul>
          <li class="tabhover"><a href="#">选择栏目</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<form action="AddInfo.php" method="get" name="changeclass" id="changeclass" onsubmit="return CheckChangeClass();">
<input name="mid" type="hidden" id="mid" value="<?=$mid?>">
              <input name="enews" type="hidden" id="enews" value="MAddInfo">
      <div id="edituserxx">
            <select name=classid size="22" style="width:300px"  class="yh">
                <script src="<?=$classjs?>"></script>
              </select>
	  <div class="mt10"><input type="submit" name="Submit" value="发布信息" class="button small green"> <font color="#666666">(请选择终极栏目[蓝色条])</font></div>
      </div>
</form>    
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>