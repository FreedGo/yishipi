/*!
 * 用于个人中心订单管理
 * Created by Freed on 2017/5/15.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */
// 主入口，引入需要使用的模块并初始化
layui.use(['layer', 'element', 'flow', 'laytpl','laypage'], function () {

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
		// var allOrders = {
        // 	status0:[],//all
        // 	status1:[],//未处理
        // 	status2:[],//处理中
        // 	status3:[],//待确认
        // 	status4:[],//已完成
        // 	status5:[]
        // };
		//遍历数组，根据status拆分数据到不同分组
		// for (i in msg){
		// 	allOrders['status'+msg[i].type1].push(msg[i]);
		// }
		// allOrders.status0 = msg;

		//暂时循环不出来
		// for(var i = 0;i<4;i++){
         //    laytpl(document.getElementById('allLists'+i).innerHTML).render(allOrders.('status'+i), function(html){
		// 		('ddList'+i).innerHTML = html;
         //    });
		// }
		var data0 = {
			"list":msg
		};
		// var data1 = {
		// 	"list":allOrders.status1
		// };
		// var data2 = {
		// 	"list":allOrders.status2
		// };
		// var data3 = {
		// 	"list":allOrders.status3
		// };
		// 渲染全部订单
		var getTpl0 =allLists0.innerHTML;
		var getTpl1 =allLists1.innerHTML;
		var getTpl2 =allLists2.innerHTML;
		var getTpl3 =allLists3.innerHTML;

		laytpl(getTpl0).render(data0, function(html){
			ddList0.innerHTML = html;
		});
		// laytpl(getTpl1).render(data1, function(html){
		// 	ddList1.innerHTML = html;
		// });
		// laytpl(getTpl2).render(data2, function(html){
		// 	ddList2.innerHTML = html;
		// });
		// laytpl(getTpl3).render(data3, function(html){
		// 	ddList3.innerHTML = html;
		// });
	});

    //测试数据
    var data = [
        '北京',
        '上海',
        '广州',
        '深圳',
        '杭州',
        '长沙',
        '合肥',
        '宁夏',
        '成都',
        '西安',
        '南昌',
        '上饶',
        '沈阳',
        '济南',
        '厦门',
        '福州',
        '九江',
        '宜春',
        '赣州',
        '宁波',
        '绍兴',
        '无锡',
        '苏州',
        '徐州',
        '东莞',
        '佛山',
        '中山',
        '成都',
        '武汉',
        '青岛',
        '天津',
        '重庆',
        '南京',
        '九江',
        '香港',
        '澳门',
        '台北'
    ];

    var nums = 5; //每页出现的数据量

    //模拟渲染
    var render = function(data, curr){
        var arr = []
            ,thisData = data.concat().splice(curr*nums-nums, nums);
        layui.each(thisData, function(index, item){
            arr.push('<li>'+ item +'</li>');
        });
        return arr.join('');
    };

    //调用分页
    laypage({
        cont: $('.pages3')
        ,pages: Math.ceil(data.length/nums) //得到总页数
        ,jump: function(obj){
        	console.log(obj);
            document.getElementById('ddList3').innerHTML = render(data, obj.curr);
        }
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
