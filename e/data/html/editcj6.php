<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><tr><td bgcolor=ffffff>商品名称</td><td bgcolor=ffffff>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
<tr> 
  <td height="25" bgcolor="#FFFFFF">
	<?=$tts?"<select name='ttid'><option value='0'>标题分类</option>$tts</select>":""?>
	<input type=text name=title value="<?=ehtmlspecialchars(stripSlashes($r[title]))?>" size="60"> 
	<input type="button" name="button" value="图文" onclick="document.add.title.value=document.add.title.value+'(图文)';"> 
  </td>
</tr>
<tr> 
  <td height="25" bgcolor="#FFFFFF">属性: 
	<input name="titlefont[b]" type="checkbox" value="b"<?=$titlefontb?>>粗体
	<input name="titlefont[i]" type="checkbox" value="i"<?=$titlefonti?>>斜体
	<input name="titlefont[s]" type="checkbox" value="s"<?=$titlefonts?>>删除线
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name="titlecolor" type="text" value="<?=stripSlashes($r[titlecolor])?>" size="10"><a onclick="foreColor();"><img src="../data/images/color.gif" width="21" height="21" align="absbottom"></a>
  </td>
</tr>
</table>
</td></tr><tr><td bgcolor=ffffff>商品缩略片</td><td bgcolor=ffffff>
<input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"
":ehtmlspecialchars(stripSlashes($r[titlepic]))?>" size="60">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=titlepic<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>发布时间</td><td bgcolor=ffffff>
<input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="设为当前时间" onclick="document.add.newstime.value='<?=$todaytime?>'">
</td></tr><tr><td bgcolor=ffffff>简单描述</td><td bgcolor=ffffff><textarea name="intro" cols="80" rows="10" id="intro"><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[intro]))?></textarea>
</td></tr><tr><td bgcolor=ffffff>品牌</td><td bgcolor=ffffff>
<input name="brand" type="text" id="brand" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[brand]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>到期时间</td><td bgcolor=ffffff><input name="expday" type="text" id="expday" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[expday]))?>" size="12" onclick="setday(this);">
</td></tr><tr><td bgcolor=ffffff>条形码</td><td bgcolor=ffffff>
<input name="bar_code" type="text" id="bar_code" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[bar_code]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>货号</td><td bgcolor=ffffff>
<input name="no" type="text" id="no" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[no]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>过关单</td><td bgcolor=ffffff>
<input name="pass_customs_path" type="text" id="pass_customs_path" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[pass_customs_path]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=pass_customs_path<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>税单</td><td bgcolor=ffffff>
<input name="bill_path" type="text" id="bill_path" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[bill_path]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=bill_path<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>卫生检测证明</td><td bgcolor=ffffff>
<input name="health_detection_path" type="text" id="health_detection_path" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[health_detection_path]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=health_detection_path<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>包装方式</td><td bgcolor=ffffff>
<input name="pack_way" type="text" id="pack_way" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[pack_way]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>建议零售价</td><td bgcolor=ffffff><input name="dan_price" type="text" id="dan_price" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[dan_price]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>单价</td><td bgcolor=ffffff><input name="tprice" type="text" id="tprice" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[tprice]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>箱价</td><td bgcolor=ffffff><input name="price" type="text" id="price" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[price]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>价格浮动</td><td bgcolor=ffffff><style>
    * {
        margin: 0;
        paddling: 0;
    }
    .sell {
        paddling-top: 10px;
        paddling-bottom: 10px;
    }
    #dd11 {
        width: 100px;
        height: 20px;
        /*background-color: red;*/
        position: relative;
        border: 1px solid #ccc;
        border-radius: 10px;
        float: left;
        cursor: pointer;
    }
    #cc1{
        position: absolute;
        left: 0px;
        top: 0px;
        height: 20px;
        background-color: blue;
        width: 0px;
        border-radius: 10px;
    }
    i {
        display: block;
        width: 20px;
        height: 20px;
        background-color: #00cc99;
        float: left;
        cursor: pointer;
    }
    input {
        height: 20px;
        width: 100px;
    }
    .shuru3 {
        float: left;
    }
    #PriceFluctuation {
        float: left;
    }
</style>
<script src="http://news.yishipi.com.cn/skin/default/js/jquery/jquery.min.js"></script>





<div class="sell">
<input name="PriceFluctuation" type="text" id="PriceFluctuation" value="" size="300">
    <div id="dd11">
        <div id="cc1"></div>
    </div>
    <div class="jaijian1">
        <i class="jia1">+</i>
        <i class="jian1">-</i>
    </div>
    <input type="text" class="shuru3">%
</div>


<script>
    function toDecimal1(x) {
        var f = parseFloat(x);
        if (isNaN(f)) {
            return;
        }
        f = Math.round(x*100)/100;
        return f;
    }
    $('#dd11').click(function (event) {
        var y = Math.ceil(event.offsetX/10)*10; //获取鼠标在父元素的y坐标
        console.log(y);
        console.log(event.clientX);
        var yy = $(this).width(); //当前元素长度
        var z = (y/yy*1000)/10.00 + '%'; // 得到百分值
        var zx = y/yy*100;
        $('#cc1').css('width',y+'px') //设置子元素长度
        $('#PriceFluctuation')[0].value= toDecimal1((1+Math.floor(zx)/100)*Number($('#price').val()));
        $('.shuru3')[0].value = Math.floor(zx);
    })
    $('.jia1').click(function () {

        var y = Math.ceil($('#cc1').width());//获取当前子元素的长度 除以10 向上取整
        if (y < 1010) {
            var s = y++;  //点击长度加1
            var yy = $('#dd11').width();  //获取父元素长度
            var z = (s/yy*100) + '%'; // 获取百分比
            var zx = s/yy*100;
            $('#cc1').css('width',y+'px'); //设置子元素长度
        }
        $('#PriceFluctuation')[0].value=toDecimal1((1+Math.floor(zx)/100)*Number($('#price').val()));
        $('.shuru3')[0].value = Math.floor(zx);
        console.log(1)
    })
    $('.jian1').click(function () {
        var y = Math.ceil($('#cc1').width());//获取当前子元素的长度 除以10 向上取整
        if (y > 0) {
            var s = y--;  //点击长度加1
            var yy = $('#dd11').width();   // 获取百分比
            var zx = s/yy*100;
            $('#cc1').css('width',y+'px'); //设置子元素长度
        }

        $('#PriceFluctuation')[0].value=toDecimal1((1+Math.floor(zx)/100)*Number($('#price').val()));
        $('.shuru3')[0].value = Math.floor(zx);
    })
    $('#price').keyup(function () {
        var y = (1+Number($('.shuru3').val())/100);
        $('#PriceFluctuation')[0].value=toDecimal1((1+y)*Number($('#price').val()));
    })
    $('.shuru3').keyup(function () {
        var y = Number($('#price').val());
        var y1 = Number($('.shuru3').val());
        var z = y1/100*$('#dd11').width();
        console.log(y);
        $('#cc1').css('width',z+'px');
        $('#PriceFluctuation')[0].value=toDecimal1(y*(1+Number($('.shuru3').val())/100));
    })

</script>

</td></tr><tr><td bgcolor=ffffff>产地</td><td bgcolor=ffffff>
<input name="chandi" type="text" id="chandi" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[chandi]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>起批量</td><td bgcolor=ffffff>
<input name="qipiliang" type="text" id="qipiliang" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[qipiliang]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>箱规</td><td bgcolor=ffffff>
<input name="xianggui" type="text" id="xianggui" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[xianggui]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>单品规格</td><td bgcolor=ffffff>
<input name="danguige" type="text" id="danguige" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[danguige]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>保质期</td><td bgcolor=ffffff>
<input name="expried_time" type="text" id="expried_time" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[expried_time]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>类别</td><td bgcolor=ffffff>
<input name="leibie" type="text" id="leibie" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[leibie]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>储存方法</td><td bgcolor=ffffff>
<input name="save_way" type="text" id="save_way" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[save_way]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>价格上调</td><td bgcolor=ffffff><style>
    * {
        margin: 0;
        paddling: 0;
    }
    .sell {
        paddling-top: 10px;
        paddling-bottom: 10px;
    }
    #dd11 {
        width: 100px;
        height: 20px;
        /*background-color: red;*/
        position: relative;
        border: 1px solid #ccc;
        border-radius: 10px;
        float: left;
        cursor: pointer;
    }
    #cc1{
        position: absolute;
        left: 0px;
        top: 0px;
        height: 20px;
        background-color: blue;
        width: 0px;
        border-radius: 10px;
    }
    i {
        display: block;
        width: 20px;
        height: 20px;
        background-color: #00cc99;
        float: left;
        cursor: pointer;
    }
    input {
        height: 20px;
        width: 100px;
    }
    .shuru3 {
        float: left;
    }
    #PriceIncrease {
        float: left;
    }
</style>
<script src="/yishipi/skin/default/js/jquery/jquery.min.js"></script>

	



<div class="sell">
<input name="PriceIncrease" type="text" id="PriceIncrease" value="" size="300">

</div>

<script>
function toDecimal(x) {
    var f = parseFloat(x);
    if (isNaN(f)) {
        return;
    }
    f = Math.round(x * 100) / 100;
    return f;
}
$('#price').keyup(function(){
        $('#PriceIncrease')[0].value = toDecimal(Number($('#price').val())*1.05);
})

	
</script>

</td></tr><tr><td bgcolor=ffffff>库存</td><td bgcolor=ffffff><input name="pmaxnum" type="text" id="pmaxnum" value="<?=$ecmsfirstpost==1?"100":ehtmlspecialchars(stripSlashes($r[pmaxnum]))?>" size="60">
</td></tr><tr><td bgcolor=ffffff>配送方式</td><td bgcolor=ffffff><select name="express" id="express"><option value="运东西网"<?=$r[express]=="运东西网"||$ecmsfirstpost==1?' selected':''?>>运东西网</option><option value="快递鸟"<?=$r[express]=="快递鸟"?' selected':''?>>快递鸟</option><option value="自行取货"<?=$r[express]=="自行取货"?' selected':''?>>自行取货</option></select></td></tr><tr><td bgcolor=ffffff>体积</td><td bgcolor=ffffff>
<input name="tiji" type="text" id="tiji" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[tiji]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>服务</td><td bgcolor=ffffff>
<input name="fuwu" type="text" id="fuwu" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[fuwu]))?>" size="">
</td></tr><tr><td bgcolor=ffffff>产品图</td><td bgcolor=ffffff><link rel="stylesheet" type="text/css" href="/zjk/oss/webuploader.css" />
<link rel="stylesheet" type="text/css" href="/zjk/oss/style.css" />
<input type="hidden" name="productpic" value="" id="photos" />
  <div id="wrapper">
        <div id="container">
            <!--头部，相册选择和格式选择-->

            <div id="uploader">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <!--<p>或将照片拖到这里，单次最多可选300张</p>-->
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div><div class="info"></div>
                    <div class="btns">
                        <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/zjk/oss/jquery.js"></script>
    <script type="text/javascript" src="/zjk/oss/webuploader.js"></script>
    <script type="text/javascript" src="/zjk/oss/upload.js"></script></td></tr><tr><td bgcolor=ffffff>产品图2</td><td bgcolor=ffffff><input name="imgtwo" type="text" id="imgtwo" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[imgtwo]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=imgtwo<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>产品图3</td><td bgcolor=ffffff><input name="imgthree" type="text" id="imgthree" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[imgthree]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=imgthree<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>产品图4</td><td bgcolor=ffffff><input name="imgfore" type="text" id="imgfore" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[imgfore]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=imgfore<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>商品介绍</td><td bgcolor=ffffff><?php if(!isset($Field)){ ?>

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

</script></td></tr>