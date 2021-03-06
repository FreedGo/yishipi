/*!
 * 用于个人中心-卖家订单-管理
 * Created by Freed on 2017/5/15.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */
// 主入口，引入需要使用的模块并初始化
layui.use(['layer', 'element', 'flow', 'laytpl','laypage','form'], function () {

	var layer   = layui.layer,     //弹出层
	    element = layui.element(), //元素操作
	    laytpl  = layui.laytpl,    //前端模板
	    flow    = layui.flow,      //流加载
	    form    = layui.form,
	    laypage = layui.laypage;   //分页加载

	$.ajax({
		url:"/e/extend/shopdd/index.php",
		type:'get',
		data:{
			buyType:'sell_order'
		},
		dataType:'json'
	}).done(function (msg) {
		var allOrders = {
        	status0:[],//all
        	status1:[],//待付款
        	status2:[],//待收货
        	status3:[],//售后
        	status4:[],//已完成
        	status5:[]
        };
		if (msg == ''||msg ==[]){
			allOrders.status0 = []
		}else{
			for(var i = 0; i<msg.length;i++){
				switch (msg[i].type){
					//微付款
					case 0:
						allOrders.status1.push(msg[i]);
						break;
						//取消订单
					case 1:
						allOrders.status4.push(msg[i]);
						break;
						//待确认收货
					case 2:
						allOrders.status2.push(msg[i]);
						break;
					//确认收货
					case 3:
						allOrders.status4.push(msg[i]);
						break;
					//申请退款
					case 4:
						allOrders.status3.push(msg[i]);
						break;
					//拒绝退款
					case 5:
						allOrders.status3.push(msg[i]);
						break;
					//申请售后
					case 6:
						allOrders.status3.push(msg[i]);
						break;
					//申请退款（已付款未发货）
					case 7:
						allOrders.status3.push(msg[i]);
						break;
				}
			}

		}
		var data0 = {
			"list":msg
		};
		var data1 = {
			"list":allOrders.status1
		};
		var data2 = {
			"list":allOrders.status2
		};
		var data3 = {
			"list":allOrders.status3
		};
		var data4 = {
			"list":allOrders.status4
		};

		// 渲染全部订单d
		var getTpl0 =allLists0.innerHTML;
		// var getTpl1 =allLists1.innerHTML;
		// var getTpl2 =allLists2.innerHTML;
		// var getTpl3 =allLists3.innerHTML;
		// var getTpl4 =allLists4.innerHTML;

		laytpl(getTpl0).render(data0, function(html){
			ddList0.innerHTML = html;
		});
		laytpl(getTpl0).render(data1, function(html){
			ddList1.innerHTML = html;
		});
		laytpl(getTpl0).render(data2, function(html){
			ddList2.innerHTML = html;
		});
		laytpl(getTpl0).render(data3, function(html){
			ddList3.innerHTML = html;
		});
		laytpl(getTpl0).render(data4, function(html){
			ddList4.innerHTML = html;
		});
	});

    // //测试数据
    // var data = [
    //     '北京',
    //     '上海',
    //     '广州',
    //     '深圳',
    //     '杭州',
    //     '长沙',
    //     '合肥',
    //     '宁夏',
    //     '成都',
    //     '西安',
    //     '南昌',
    //     '上饶',
    //     '沈阳',
    //     '济南',
    //     '厦门',
    //     '福州',
    //     '九江',
    //     '宜春',
    //     '赣州',
    //     '宁波',
    //     '绍兴',
    //     '无锡',
    //     '苏州',
    //     '徐州',
    //     '东莞',
    //     '佛山',
    //     '中山',
    //     '成都',
    //     '武汉',
    //     '青岛',
    //     '天津',
    //     '重庆',
    //     '南京',
    //     '九江',
    //     '香港',
    //     '澳门',
    //     '台北'
    // ];
    //
    // var nums = 5; //每页出现的数据量
    //
    // //模拟渲染
    // var render = function(data, curr){
    //     var arr = []
    //         ,thisData = data.concat().splice(curr*nums-nums, nums);
    //     layui.each(thisData, function(index, item){
    //         arr.push('<li>'+ item +'</li>');
    //     });
    //     return arr.join('');
    // };
    //
    // //调用分页
    // laypage({
    //     cont: $('.pages3')
    //     ,pages: Math.ceil(data.length/nums) //得到总页数
    //     ,jump: function(obj){
    //     	console.log(obj);
    //         document.getElementById('ddList3').innerHTML = render(data, obj.curr);
    //     }
    // });
	//调用一次时间转换函数，不然gulp个缺货不打包这个函数
	localAllTime(1494839192);
	confirmGood('');
	assess('');
	refund('');

});
/**
 * 时间戳转日期（年月日+时分秒）
 * 放置于全局作用域，以便html调用
 * @param time {string},时间戳，秒
 * @return {string}
 */
function localAllTime(time) {
	time = parseInt(time) * 1000;//把秒转为毫秒
	if (time === time) {
		var date   = new Date(time);
		var hour   = date.getHours();
		var mins   = date.getMinutes();
		var second = date.getSeconds();
		return date.toLocaleDateString() + ' ' + hour + ':' + mins + ':' + second;
	}
	return '无';
}
function getListPage(index,nums) {
	$.ajax({
        url:"/skin/member/dist/js/data.json",
        type:'post',
        data:{
			type:index,
			num:nums
        },
        dataType:'json'
	}).done(function (msg) {
		var data = msg,
			template = document.getElementById('allLists'+index).innerHTML;
        laytpl(template).render(data, function(html){
            document.getElementById('ddList'+index).innerHTML = html;
        });
    })
}
/**
 * 确认收货
 * @param id{String}:订单id
 */
function confirmGood(id) {
	if (id == ''){
		return
	}
	var confirmIndex= layer.confirm('确认收货吗？确认收货将会把货款转入卖家账户。', {
		btn: ['确认','取消'] //按钮
	}, function(){
		// 调用确认弹窗
		var proIndex=layer.prompt(
				{title: '输入登录密码，并确认', formType: 1},
				function(pass, index){
					// loading动画
					var load = layer.load(2, {
						shade: [0.2,'#000'] //0.1透明度的黑色背景
					});
					// 向后台传递mima确认正确与否
					$.ajax({
						url:'',
						type:'post',
						data:{
							ddid:id
						},
						dataType:'text'
					}).done(function (msg) {
						//一旦ajax数据返回成功，不论失败与否，关闭动画
						layer.close(load);
						if(msg==1){
							// 关闭confirm
							layer.close(index);
							//提示结果
							layer.alert('确认收货成功');
						}else{
							//提示结果
							layer.alert('密码错误');
						}
					}).error(function (e) {
						layer.close(load);
						layer.alert('网络错误');
					})
				});
	}, function(){
		layer.close(confirmIndex);
	});
}
/**
 * 评价订单
 * @param id{String}:订单id
 */
function assess(id) {
	if (id == ''){
		return
	}
	layer.prompt({title: '请写下您的评价', formType: 2}, function(text, index){
		console.log(text);
		var load = layer.load(2, {
			shade: [0.2,'#000'] //0.1透明度的白色背景
		});
		$.ajax({
			url:'',
			type:'post',
			data:{
				ddid:text
			},
			dataType:'text'
		}).done(function (msg) {
			layer.close(load);
			if(msg==1){
				layer.close(index);
				layer.alert('评价成功');
			}else{
				layer.alert('网络错误');
			}
		}).error(function (e) {
			layer.alert('网络错误');
			layer.close(load);
		})
	});
}
/**
 * 确认收货
 * @param id{String}:订单id
 */
function confirmGood(id) {
	if (id == ''){
		return
	}
	var confirmIndex= layer.confirm('确认收货吗？确认收货将会把货款转入卖家账户。', {
		btn: ['确认','取消'] //按钮
	}, function(){
		// 调用确认弹窗
		var proIndex=layer.prompt(
			{title: '输入登录密码，并确认', formType: 1},
			function(pass, index){
				// loading动画
				var load = layer.load(2, {
					shade: [0.2,'#000'] //0.1透明度的黑色背景
				});
				// 向后台传递mima确认正确与否
				$.ajax({
					url:'',
					type:'post',
					data:{
						ddid:id
					},
					dataType:'text'
				}).done(function (msg) {
					//一旦ajax数据返回成功，不论失败与否，关闭动画
					layer.close(load);
					if(msg==1){
						// 关闭confirm
						layer.close(index);
						//提示结果
						layer.alert('确认收货成功');
					}else{
						//提示结果
						layer.alert('密码错误');
					}
				}).error(function (e) {
					layer.close(load);
					layer.alert('网络错误');
				})
			});
	}, function(){
		layer.close(confirmIndex);
	});
}
/**
 * 申请退款
 * @param id
 */
function refund(id) {
	if (id == ''){
		return
	}
	var confirmIndex= layer.confirm('确认要申请退款吗？', {
		btn: ['确认','取消'] //按钮
	}, function(){
		// 调用确认弹窗
		var proIndex=layer.prompt(
			{title: '请输入退款理由', formType: 2},
			function(text, index){
				// loading动画
				var load = layer.load(2, {
					shade: [0.2,'#000'] //0.1透明度的黑色背景
				});
				// 向后台传递mima确认正确与否
				$.ajax({
					url:'',
					type:'post',
					data:{
						ddid:text
					},
					dataType:'text'
				}).done(function (msg) {
					//一旦ajax数据返回成功，不论失败与否，关闭动画
					layer.close(load);
					if(msg==1){
						// 关闭confirm
						layer.close(index);
						//提示结果
						layer.alert('申请退款成功');
					}else{
						//提示结果
						layer.alert('申请退款失败');
					}
				}).error(function (e) {
					layer.close(load);
					layer.alert('网络错误');
				})
			});
	}, function(){
		layer.close(confirmIndex);
	});
}
/**
 * 申请人工客服
 * @param id
 */
function rengongkefu(id) {
	if (id == ''){
		return
	}
	var confirmIndex= layer.confirm('确认要申请人工客服介入吗？', {
		btn: ['确认','取消'] //按钮
	}, function(){
		// 调用确认弹窗
		var proIndex=layer.prompt(
			{title: '请输入理由', formType: 2},
			function(text, index){
				// loading动画
				var load = layer.load(2, {
					shade: [0.2,'#000'] //0.1透明度的黑色背景
				});
				// 向后台传递mima确认正确与否
				$.ajax({
					url:'',
					type:'post',
					data:{
						ddid:id,
						content:text
					},
					dataType:'text'
				}).done(function (msg) {
					//一旦ajax数据返回成功，不论失败与否，关闭动画
					layer.close(load);
					if(msg==1){
						// 关闭confirm
						layer.close(index);
						//提示结果
						layer.alert('申请人工客服成功');
					}else{
						//提示结果
						layer.alert('申请人工客服失败');
					}
				}).error(function (e) {
					layer.close(load);
					layer.alert('网络错误');
				})
			});
	}, function(){
		layer.close(confirmIndex);
	});
}

function agreeRefund(id){}

function refuseRefund(id){}
/**
 * 发货
 * @param id{String}:订单id
 */
function deliverGoods(id) {
	if (id == ''){
		return
	}
	var deliverIndex=layer.open({
		type: 1,
		title:'填写发货信息',
		skin: 'layui-layer-rim', //加上边框
		area: ['420px'], //宽高
		closeBtn: 1, //不显示关闭按钮
		anim: 2,
		shadeClose: true, //开启遮罩关闭
		content: $('#fahuo')
	});
	layui.use(['form'], function(){
			var form = layui.form();
		form.on('submit(demo1)', function(data){
			// loading动画
			var load = layer.load(2, {
				shade: [0.2,'#000'] //0.1透明度的黑色背景
			});
			$.ajax({
				url:'/e/extend/shopdd/index.php',
				type:'get',
				data:{
					buyType:'sell_deliver',
					ddno:id,
					psname:data.field.psname,//物流名称
					psddno:data.field.psddno//快递单号
				},
				dataType:'text'
			}).done(function (msg) {
				layer.close(load);
				if(msg==1){
					layer.close(deliverIndex);
					layer.alert('发货成功');
				}else{
					layer.alert('发货失败');
					window.location.reload();
				}
			}).error(function (e) {
				layer.close(load);
				layer.alert('网络错误');
				// layer.close(deliverIndex);
			});
			return false;
		});

	});
	//监听提交
	// layer.prompt({title: '请填写快递单号', formType: 0}, function(text, index){
	// 	console.log(text);
	// 	var load = layer.load(2, {
	// 		shade: [0.2,'#000'] //0.1透明度的白色背景
	// 	});
	// 	$.ajax({
	// 		url:'',
	// 		type:'post',
	// 		data:{
	// 			ddid:id,
	// 			content:text
	// 		},
	// 		dataType:'text'
	// 	}).done(function (msg) {
	// 		layer.close(load);
	// 		if(msg==1){
	// 			layer.close(index);
	// 			layer.alert('发货成功');
	// 		}else{
	// 			layer.alert('发货失败');
	// 		}
	// 	}).error(function (e) {
	// 		layer.alert('网络错误');
	// 		layer.close(load);
	// 	})
	// });
}
