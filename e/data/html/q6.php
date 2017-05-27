<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<style>
	.layui-btn-yi{
		background-color: #D94A4A;
		color: #fff!important;
	}
</style>
<div class="layui-form-item">
	<label class="layui-form-label">商品名称</label>
	<div class="layui-input-block">
		<input type="text" name="title" lay-verify="required" autocomplete="off" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">特殊属性</label>
	<div class="layui-input-inline">
		<input type="text" name="keyboard" value="<?= stripSlashes($r[keyboard]) ?>"  autocomplete="off" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>" class="layui-input">
	</div>
	<div class="layui-form-mid layui-word-aux">(多个请用&quot;,&quot;隔开)</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">优惠方案</label>
	<div class="layui-input-inline">
		<select name="youhui" lay-filter="youhui" id="youhui">
			<option value="无">无</option>
		</select>
	</div>
	<div class="layui-form-mid layui-word-aux"><a href="/e/ShopSys/discount/ListAddress.php">没有优惠方案,点击添加</a></div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">商品缩略图</label>
	<div class="layui-input-block">
		<!--<input type="file" name="titlepicfile"  id="demo-upload-unwrap">-->
		<div id="container1" class="contain">
			<div class="imageInfo">
				<input type="hidden" id="imageUrl" name="titlepic" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[title])) ?>">
				<div id="ossfile"></div>
				<a id="selectfiles" href="javascript:void(0);" class='layui-btn layui-btn-yi'>选择文件</a>
				<a id="postfiles" href="javascript:void(0);" class='layui-btn layui-btn-yi'>开始上传</a>
			</div>
			<div class="imageWarp">
				<img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[titlepic])) ?>" alt="">
			</div>
		</div>
	</div>
</div>
<div class="layui-form-item layui-form-text">
	<label class="layui-form-label">简单描述</label>
	<div class="layui-input-block">
		<textarea name="intro" cols="60" rows="6" id="intro"  lay-verify="required" placeholder="请输入内容" class="layui-textarea"><?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'intro', stripSlashes($r[intro])) ?></textarea>
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">品牌</label>
	<div class="layui-input-inline">
		<input type="text" name="brand" lay-verify="required" autocomplete="off" id="brand" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'brand', stripSlashes($r[brand])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">到期时间</label>
	<div class="layui-input-inline">
		<input class="layui-input" name="expday" id="expday" lay-verify="required" value="<?= $ecmsfirstpost == 1 ? "" : ehtmlspecialchars(stripSlashes($r[expday])) ?>"  onclick="layui.laydate({elem: this, istime: true,min: laydate.now() ,format: 'YYYY-MM-DD hh:mm'})">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">条形码</label>
	<div class="layui-input-inline">
		<input type="text" name="bar_code" lay-verify="required" autocomplete="off" id="bar_code" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'bar_code', stripSlashes($r[bar_code])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">货号</label>
	<div class="layui-input-inline">
		<input type="text" name="no" lay-verify="required" autocomplete="off" id="no" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'no', stripSlashes($r[no])) ?>" class="layui-input">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">过关单</label>
	<div class="layui-input-block">
		<!--<input type="file" name="titlepicfile"  id="demo-upload-unwrap">-->
		<div id="container2" class="contain">
			<div class="imageInfo">
				<input type="hidden" id="imageUrl2" name="bill_path" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[bill_path])) ?>">
				<div id="ossfile"></div>
				<a id="selectfiles2" href="javascript:void(0);" class='layui-btn layui-btn-yi'>选择文件</a>
				<a id="postfiles2" href="javascript:void(0);" class='layui-btn layui-btn-yi'>开始上传</a>
			</div>
			<div class="imageWarp">
				<img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[bill_path])) ?>" alt="">
			</div>
		</div>
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">税单</label>
	<div class="layui-input-block">
		<!--<input type="file" name="titlepicfile"  id="demo-upload-unwrap">-->
		<div id="container3" class="contain">
			<div class="imageInfo">
				<input type="hidden" id="imageUrl3" name="pass_customs_path" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[pass_customs_path])) ?>">
				<div id="ossfile"></div>
				<a id="selectfiles3" href="javascript:void(0);" class='layui-btn layui-btn-yi'>选择文件</a>
				<a id="postfiles3" href="javascript:void(0);" class='layui-btn layui-btn-yi'>开始上传</a>
			</div>
			<div class="imageWarp">
				<img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[pass_customs_path])) ?>" alt="">
			</div>
		</div>
	</div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">卫生检测证明</label>
    <div class="layui-input-block">
        <div id="container4" class="contain">
            <div class="imageInfo">
                <input type="hidden" id="imageUrl4" name="health_detection_path" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[health_detection_path])) ?>">
                <div id="ossfile"></div>
                <a id="selectfiles4" href="javascript:void(0);" class='layui-btn layui-btn-yi'>选择文件</a>
                <a id="postfiles4" href="javascript:void(0);" class='layui-btn layui-btn-yi'>开始上传</a>
            </div>
            <div class="imageWarp">
                <img class="imageShow" src="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'title', stripSlashes($r[health_detection_path])) ?>" alt="">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label class="layui-form-label">包装方式</label>
    <div class="layui-input-inline">
        <input type="text" name="pack_way" lay-verify="required" autocomplete="off" id="pack_way" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'pack_way', stripSlashes($r[pack_way])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">建议零售价</label>
    <div class="layui-input-inline">
        <input type="text" name="dan_price" lay-verify="required" autocomplete="off" id="dan_price" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'dan_price', stripSlashes($r[dan_price])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">单价</label>
    <div class="layui-input-inline">
        <input type="text" name="tprice" lay-verify="required" autocomplete="off" id="tprice" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'tprice', stripSlashes($r[tprice])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">箱价</label>
    <div class="layui-input-inline">
        <input type="text" name="price" lay-verify="required" autocomplete="off" id="price" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'price', stripSlashes($r[price])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">产地</label>
    <div class="layui-input-inline">
        <input type="text" name="chandi" lay-verify="required" autocomplete="off" id="chandi" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'chandi', stripSlashes($r[chandi])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">起批量</label>
    <div class="layui-input-inline">
        <input type="text" name="qipiliang" lay-verify="required" autocomplete="off" id="qipiliang" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'qipiliang', stripSlashes($r[qipiliang])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">箱规</label>
    <div class="layui-input-inline">
        <input type="text" name="xianggui" lay-verify="required" autocomplete="off" id="xianggui" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'xianggui', stripSlashes($r[xianggui])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">单品规格</label>
    <div class="layui-input-inline">
        <input type="text" name="danguige" lay-verify="required" autocomplete="off" id="danguige" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'danguige', stripSlashes($r[danguige])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">保质期</label>
    <div class="layui-input-inline">
        <input type="text" name="expried_time" lay-verify="required" autocomplete="off" id="expried_time" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'expried_time', stripSlashes($r[expried_time])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">类别</label>
    <div class="layui-input-inline">
        <input type="text" name="leibie" lay-verify="required" autocomplete="off" id="leibie" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'leibie', stripSlashes($r[leibie])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">储存方法</label>
    <div class="layui-input-inline">
        <input type="text" name="save_way" lay-verify="required" autocomplete="off" id="save_way" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'save_way', stripSlashes($r[save_way])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">价格上调</label>
    <div class="layui-input-inline">
        <input type="text" name="PriceIncrease" lay-verify="required" autocomplete="off" id="PriceIncrease" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'PriceIncrease', stripSlashes($r[PriceIncrease])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">库存</label>
    <div class="layui-input-inline">
        <input type="text" name="pmaxnum" lay-verify="required" autocomplete="off" id="pmaxnum" value="<?= $ecmsfirstpost == 1 ? "100" : DoReqValue($mid, 'pmaxnum', stripSlashes($r[pmaxnum])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">配送方式</label>
    <div class="layui-input-inline">
        <select name="express" lay-filter="express" id="express">
            <option value="运东西网"<?= $r[express] == "运东西网" || $ecmsfirstpost == 1 ? ' selected' : '' ?>>运东西网</option>
            <option value="快递鸟"<?= $r[express] == "快递鸟" ? ' selected' : '' ?>>快递鸟</option>
            <option value="自行取货"<?= $r[express] == "自行取货" ? ' selected' : '' ?>>自行取货</option>
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">体积</label>
    <div class="layui-input-inline">
        <input type="text" name="tiji" lay-verify="required" autocomplete="off" id="tiji" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'tiji', stripSlashes($r[tiji])) ?>" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">(单位:立方米/m³)</div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">重量</label>
    <div class="layui-input-inline">
        <input type="text" name="volume" lay-verify="required" autocomplete="off" id="volume" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'volume', stripSlashes($r[volume])) ?>" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux">(单位:千克/kg)</div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">服务</label>
    <div class="layui-input-inline">
        <input type="text" name="fuwu" lay-verify="required" autocomplete="off" id="fuwu" value="<?= $ecmsfirstpost == 1 ? "" : DoReqValue($mid, 'fuwu', stripSlashes($r[fuwu])) ?>" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">产品图</label>
    <div class="layui-input-block">
        <link rel="stylesheet" type="text/css" href="/zjk/oss/webuploader.css"/>
        <link rel="stylesheet" type="text/css" href="/zjk/oss/style.css"/>
        <input type="hidden" name="productpic" value="" id="photos"/>
        <div id="wrapper">
            <div id="container">
                <!--头部，相册选择和格式选择d -->

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
                        </div>
                        <div class="info"></div>
                        <div class="btns">
                            <div id="filePicker2"></div>
                            <div class="uploadBtn">开始上传</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/zjk/oss/webuploader.js"></script>
        <script type="text/javascript" src="/zjk/oss/upload.js"></script>
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">商品介绍</label>
    <div class="layui-input-block">
    </div>
</div>
<div class="layui-form-item">
	<div class="layui-input-block">

	<div style='background-color:#D0D0D0'><?php if (!isset($Field)) { ?>

            <script type="text/javascript" src="/e/extend/ueditor/ueditor.config.js"></script>

            <script type="text/javascript" src="/e/extend/ueditor/ueditor.all.js"></script>

        <?php } ?>

        <?php

        /**
         * ECMS UEditor编辑器字段配置
         * User:653186017 longzexiaofang@qq.com
         */

        $Field = 'newstext'; //*字段名称

        $FieldVal = $ecmsfirstpost == 1 ? "" : stripSlashes($r[$Field]);

        $isadmin = 0;

        if ($enews == 'AddNews' || $enews == 'EditNews') {
            $isadmin = 1;
        } else {
            $FieldVal = empty($ecmsfirstpost) ? DoReqValue($mid, $Field, $FieldVal) : $r[$Field];
        }

        ?>

        <script id="<?= $Field ?>" name="<?= $Field ?>" type="text/plain"><?= $FieldVal ?></script>

        <script type="text/javascript">

            var ue = UE.getEditor('<?=$Field?>', {

                pageBreakTag: '[!----------------empirenews.page--]' //分页符

                , serverUrl: "/e/extend/ueditor/php/controller.php?isadmin=<?=$isadmin?>"

                //,toolbars:[['FullScreen', 'Source', 'Undo', 'Redo','Bold']] //选择自己需要的工具按钮名称

            });

            ue.ready(function () {

                ue.execCommand('serverparam', {

                    'classid': '<?=$classid?>',

                    'filepass': '<?=$filepass?>',

                    'userid': '<?=$isadmin ? $logininid : $muserid?>',

                    'username': '<?=$isadmin ? $loginin : $musername?>',

                    'rnd': '<?=$isadmin ? $loginrnd : $mrnd?>'

                });

            });

        </script>
    </div>
	</div>

</div>
