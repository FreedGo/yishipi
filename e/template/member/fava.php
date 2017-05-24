<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='收藏夹';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;收藏夹";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<form name=favaform method=post action="../doaction.php" onsubmit="return confirm('确认要操作?');">
<input type=hidden value=DelFava_All name=enews>
<div class="hymain">
  <div class="block">
     <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>我的收藏</h3>
      <?
      if (!$num){
	  ?>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      您的收藏夹为空！
	  </div>
      <?
	  }
	  ?>
      <div class="tab" <? if ($num){echo 'style="margin-top:10px;"';}?>>
      	<div class="ddsearch fr"><a href="/e/member/fava/FavaClass/" class="c4095ce">管理收藏分类>></a></div>
        <ul>
          <li class="<? if(!$cid){echo 'tabhover';}?>"><a href="/e/member/fava/">全部收藏</a></li>
          <?=$select?>
          <div class="clearfix"></div>
        </ul>
      </div>
      <div id="favlist" class="yh">
      <div class="tips" style="position:relative;"> <a href="javascript:void();" class="favgl">批量管理</a>
            <div class="favtools" style="display:none;">
              <select name="cid">
                <option value="0">请选择要转移的目标分类</option>
                <?=$selectxx?>
              </select>
              <input type="submit" name="Submit" value="转移选中" onclick="document.favaform.enews.value='MoveFava_All'">
              <input type="submit" name="Submit" value="删除选中" onclick="document.favaform.enews.value='DelFava_All'">
            </div>
          </div>
      		<ul>
<?php
			while($fr=$empire->fetch($sql))
			{
				if(empty($class_r[$fr[classid]][tbname]))
				{continue;}
				$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$fr[classid]][tbname]." where id='$fr[id]' limit 1");
				//标题链接
				$titlelink=sys_ReturnBqTitleLink($r);
				if(!$r['id'])
				{
					$r['title']="此信息已删除";
					$titlelink="#EmpireCMS";
				}
				$tpic=$r[titlepic]?$r[titlepic]:"/e/data/images/notimg.gif";
			?>
            	<li>
                <?
                	if($class_r[$fr[classid]][tbname]=="shop"){
				?>
                    	<a href="/e/ShopSys/doaction.php?enews=AddBuycar&classid=<?=$r[classid]?>&id=<?=$r[id]?>" class="add-fav" title="加入购物车" target="_blank"></a>
                 <?}?>
                        <a href="/e/member/doaction.php?enews=DelFava&favaid=<?=$fr[favaid]?>" class="del-fav" title="删除" target="_blank" onclick="return confirm('确认要删除次收藏信息吗?');"></a>
                        <input name="favaid[]" type="checkbox" class="zyfav" value="<?=$fr[favaid]?>" style="display:none;">
                    	<a href="<?=$titlelink?>" target="_blank"><img src="<?=$tpic?>"></a>
                    	<h4><a href="<?=$titlelink?>" target="_blank"><?=stripSlashes($r[title])?></a></h4>
                <?
                	if($class_r[$fr[classid]][tbname]=="shop"){
				?>
                        <span class="price">¥<?=number_format($r[price],2)?><del>¥<?=number_format($r[tpprice],2)?></del></span>
                <?}?>
                </li>
            <?php
			}
			?>
                <div class="clearfix"></div>
            </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</form>
<style>
.tips {
margin: 15px;
line-height: 28px;
border: #F1F1F1 1px solid;
background-color: #F6F6F3;
color: #666666;
padding: 0 9px;
zoom: 1;
}
.zyfav {
position: absolute;
left: 3px;
top: 4px;}
.favtools {
display: inline;
margin-left: 10px;
}
.favtools select{height: 28px;
line-height: 28px;
font-family: microsoft yahei;}
.favgl {
display: inline-block;
width: 100px;
text-align: center;
border: 1px solid #C9C5C5;
background: #E9E9E9;
margin: 10px 0;
}
.favtools input{ height:28px; padding:0 10px;font-family: microsoft yahei;}
</style>
<script>
$(function(){
	$(".favgl").click(function(){
		var nr=$(this).text();
		if(nr=="批量管理"){
			$(this).text("取消管理");
			$(".zyfav").show();
			$(".favtools").show();
		}	
		if(nr=="取消管理"){
			$(this).text("批量管理");
			$(".zyfav").hide();
			$(".favtools").hide();
		}
	});	
})
</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>