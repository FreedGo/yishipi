/*!
 * 用于个人中心订单管理
 * Created by Freed on 2017/5/15.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */
// 主入口，引入需要使用的模块并初始化
layui.use(['layer', 'element', 'flow', 'laytpl','laypage'], function () {

	var layer   = layui.layer;    //弹出层



});
function getWuliu(kdid) {
        var load = load = layer.load(2, {
            shade: [0.2,'#000'] //0.1透明度的黑色背景
        });
        if (kdid !=''&&/\d/g.test(parseInt(kdid))) {

            var companyCode;//快递公司代码
            var expTrace;//即时物流信息
            companyCode = getCompanyCode(kdid);
            companyCode = companyCode.Shippers[0].ShipperCode;
            expTrace    = getExpressTrace(kdid, companyCode);
            if (expTrace.Success) {
                $('.wuliu-msg-show').empty();
                $.each(expTrace.Traces, function (index, val) {
                    $('.wuliu-msg-show').prepend('<div class="msg-item"><p class="msg-dec">' + val.AcceptStation +
                        '</p><p class="msg-time">' + val.AcceptTime +
                        '</p></div>')
                })
	            $('.wuliu-msg-warp').show();
	            layer.close(load);
            } else {
	            layer.close(load);
	            $('.wuliu-msg-show').html('<div class="msg-item"><p class="msg-dec">查询失败</p></div>')
            }
        } else {
	        layer.close(load);

	        $('.wuliu-msg-warp').show();
            $('.wuliu-msg-show').html('<div class="msg-item"><p class="msg-dec">暂无物流信息</p></div>')
        }
}
/**
 * 根据运单号获取快递公司的信息
 * @param expressNum
 * @return msg ;
 * msg.Success {boolean} 是否查询成功
 * msg.Shippers[0].ShipperName 是快递公司名称e
 * msg.Shippers[0].ShipperCode 快递公司代码
 */
function getCompanyCode(expressNum) {
    var getMsg;
    $.ajax({
        url  : '/e/template/ShopSys/KdApiOrderDistinguish.php',
        type : 'post',
        async: false,
        data : {'LogisticCode': expressNum}
    }).done(function (msg) {
        msg = eval('(' + msg + ')');
        getMsg = msg;
    });
    return getMsg;
}

/**
 * 获取物流信息
 * @param expressCode {string},快递单号
 * @param ShipperCode {string},快递公司代码
 */
function getExpressTrace(expressCode, ShipperCode) {
    var getETMsg;
    $.ajax({
        url  : '/e/template/ShopSys/KdApiSearchDemo.php',
        type : 'post',
        async: false,
        data : {
            'LogisticCode': expressCode,
            'ShipperCode' : ShipperCode
        }
    }).done(function (data) {
        data     = eval('(' + data + ')');
        getETMsg = data;
    });
    return getETMsg;
}
