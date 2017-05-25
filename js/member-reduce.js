/**
 * 个人中心优惠方案
 * Created by Freed on 2017/5/25.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */

layui.use(['form','layer'],function (e) {
	var form = layui.form(),
	    layer = layui.layer;

	var reduceNum = 3;
	//自定义验证规则
	form.verify({
		price: [/^[1-9]\d*$/, '必须为整数，不能以0开头'],
		percent: [/^([1-9]|[1-9]\d)$/, '百分比必须为整数，不能超过99']

	});
	//监听提交
	form.on('submit(demo2)', function(data){

		var load = layer.load(2, {
			shade: [0.2,'#000'] //0.1透明度的黑色背景
		});
		console.log(data.field);
		var reduceList = [];
		for (var i = 0 ; i < 5 ;i ++){
			if (data.field['allPrice'+i] != undefined){
				var key = data.field['allPrice'+i] ;
				var value = data.field['reduce'+i] * 0.01 ;
				reduceList.push({price:key,reduce:value});
			}
		}
		var datas = {type:'added'};
		datas.title = data.field.addressname;
		reduceList = JSON.stringify(reduceList);
		datas.list = reduceList;
		// console.log(JSON.stringify(datas));

		$.ajax({
			url:'/e/ShopSys/discount/list.josn.php',
			type:'post',
			data:datas,
			dataType:'text',
			async:false
		}).done(function (msg) {
			if (msg == 1){
				layer.msg('增加成功');
				window.location.reload();
			}else{
				layer.close(load);
				layer.msg('失败');
			}

		}).error(function (e) {
			layer.close(load);
			layer.msg('网络错误')
		});
		return false;
	});
	$('#addform').on('click','.addReduce',function () {

		if (reduceNum>=5){
			layer.alert('一种方案最多添加5个满减');
			return false
		}
		reduceNum++;
		var str = '<div class="layui-form-item reduce"><div class="layui-inline">' +
			'<label class="layui-form-label">优惠' +reduceNum+
			'：</label> <div class="layui-form-mid">上月累计消费</div><div class="layui-input-inline"   style="width: 100px;">' +
			'<input lay-verify="price" type="text" name="allPrice' +reduceNum+
			'" placeholder="￥" autocomplete="off" class="layui-input">' +
			'</div><div class="layui-form-mid">总额优惠百分之</div><div class="layui-input-inline" style="width: 100px;">' +
			'<input type="text" name="reduce' +reduceNum+
			'" placeholder="%" autocomplete="off" class="layui-input" lay-verify="price"></div>' +
			'<span  class="layui-btn layui-btn-primary layui-btn-small layui-btn-radius addReduce">' +
			'<i class="layui-icon">&#xe654;</i></span><span class="delReduce layui-btn layui-btn-primary layui-btn-small layui-btn-radius"><i class="layui-icon">&#xe640;</i></span></div></div>';
		$('.reduce:last').after(str);
		form.render(); //更新全部
	});

	$('#addform').on('click','.delReduce',function () {
		$(this).parents('.reduce').remove();
		reduceNum--;
		form.render(); //更新全部
	});
	//纯调用，gulp打包
	delectReduce('');
})


/**
 * 删除优惠方案
 * @param reduceid
 * @return {boolean}
 */
function delectReduce(reduceid) {
	if(reduceid == ''){
		return false;
	}
	if (!reduceid){
		layer.close(load);
		layer.alert('参数错误,请重新刷新或联系管理员');
		return false;
	}
	var load = layer.load(2, {
		shade: [0.2,'#000'] //0.1透明度的黑色背景
	});
	$.ajax({
		url:'/e/ShopSys/discount/list.josn.php',
		type:'post',
		data:{
			id:reduceid
		},
		dataType:'text'
	}).done(function (msg) {
		// layer.close(load);
		if (msg == 1){
			layer.msg('删除成功');
			window.location.reload();
		}else{
			layer.close(load);
			layer.msg('删除失败，请重试');
		}

	}).error(function (e) {
		// layer.close(load);
		layer.msg('网络错误')
	});
}



