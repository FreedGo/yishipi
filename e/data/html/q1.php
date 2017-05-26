<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5><tr><td width='16%' height=25 bgcolor='ffffff'>标题</td><td bgcolor='ffffff'><input name="title" type="text" size="42" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'title',stripSlashes($r[title]))?>"></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>副标题</td><td bgcolor='ffffff'><input name="ftitle" type="text" size=42 id="ftitle" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'ftitle',stripSlashes($r[ftitle]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>特殊属性</td><td bgcolor='ffffff'><input name="keyboard" type="text" size=42 value="<?=stripSlashes($r[keyboard])?>">
<font color="#666666">(多个请用&quot;,&quot;隔开)</font></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>标题图片</td><td bgcolor='ffffff'><input type="file" name="titlepicfile" size="45"></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>内容简介</td><td bgcolor='ffffff'><textarea name="smalltext" cols="60" rows="10" id="smalltext"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'smalltext',stripSlashes($r[smalltext]))?></textarea>
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>作者</td><td bgcolor='ffffff'><input name="writer" type="text" id="writer" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'writer',stripSlashes($r[writer]))?>" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>信息来源</td><td bgcolor='ffffff'><input name="befrom" type="text" id="befrom" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'befrom',stripSlashes($r[befrom]))?>" size="">
</td></tr><tr><td height=25 colspan=2 bgcolor='ffffff'><div align=left>新闻正文</div></td></tr></table><div style='background-color:#D0D0D0'><?php if(!isset($Field)){ ?>

<script type="text/javascript" src="/e/extend/ueditor/ueditor.config.js"></script>

<script type="text/javascript" src="/e/extend/ueditor/ueditor.all.js"></script>

<?php } ?>

<?php

/**

* ECMS UEditor编辑器字段配置

* User:653186017 longzexiaofang@qq.com

*/

$Field    = 'newstext'; //*字段名称

$FieldVal = $ecmsfirstpost==1?"":stripSlashes($r[$Field]);

$isadmin  = 0;

if($enews=='AddNews'||$enews=='EditNews')

{ $isadmin=1; }

else

{ $FieldVal  = empty($ecmsfirstpost)?DoReqValue($mid,$Field,$FieldVal):$r[$Field]; }

?>

<script id="<?=$Field?>" name="<?=$Field?>" type="text/plain"><?=$FieldVal?></script>

<script type="text/javascript">

var ue = UE.getEditor('<?=$Field?>',{

    pageBreakTag:'[!----------------empirenews.page--]' //分页符

    , serverUrl: "/e/extend/ueditor/php/controller.php?isadmin=<?=$isadmin?>"

    //,toolbars:[['FullScreen', 'Source', 'Undo', 'Redo','Bold']] //选择自己需要的工具按钮名称

});

ue.ready(function(){

    ue.execCommand('serverparam', {

        'classid' : '<?=$classid?>',

        'filepass': '<?=$filepass?>',

        'userid'  : '<?=$isadmin?$logininid:$muserid?>',

        'username': '<?=$isadmin?$loginin:$musername?>',

        'rnd'     : '<?=$isadmin?$loginrnd:$mrnd?>'

    });

});

</script></div><table width='100%' align=center cellpadding=3 cellspacing=1 bgcolor='#DBEAF5'></table>