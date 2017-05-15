/*!
 * 用于个人中心订单管理
 * Created by Freed on 2017/5/15.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */
// 主入口，引入需要使用的模块并初始化
layui.use(['layer', 'element', 'flow', 'laytpl'], function () {

	var layer   = layui.layer,     //弹出层
	    element = layui.element(), //元素操作
	    laytpl  = layui.laytpl,    //前端模板
	    flow    = layui.flow,      //流加载
	    laypage = layui.laypage;   //分页加载

	$.ajax({
		url:"/skin/member/dist/js/data.json",
		type:'post',
		data:{

		},
		dataType:'json'
	}).done(function (msg) {
		var allOrders = {
			status0:[],//all
			status1:[],//未处理
			status2:[],//处理中
			status3:[],//待确认
			status4:[],//已完成
			status5:[]
		};
		//遍历数组，根据status拆分数据
		for (i in msg){
			allOrders['status'+msg[i].type].push(msg[i]);
		}
		allOrders.status0 = msg;
		var data0 = {
			"list":allOrders.status0
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
		// 渲染全部订单
		var getTpl0 =allLists0.innerHTML;
		var getTpl1 =allLists1.innerHTML;
		var getTpl2 =allLists2.innerHTML;
		var getTpl3 =allLists3.innerHTML;

		laytpl(getTpl0).render(data, function(html){
			ddList0.innerHTML = html;
		});
		laytpl(getTpl1).render(data, function(html){
			ddList1.innerHTML = html;
		});
		laytpl(getTpl2).render(data, function(html){
			ddList2.innerHTML = html;
		});
		laytpl(getTpl3).render(data, function(html){
			ddList3.innerHTML = html;
		});
	});
	//调用一次时间转换函数，不然gulp个缺货不打包这个函数
	localAllTime(1494839192);















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
