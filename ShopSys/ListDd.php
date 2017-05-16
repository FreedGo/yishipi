<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php
$public_diyr['pagetitle'] = '订单列表';
$url = "<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;订单列表";
require(ECMS_PATH . 'e/template/incfile/header.php');
$dtjnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where haveprice='0' and checked='0' and payfsid<>'5' and userid='$user[userid]'");
$dshnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where outproduct='1' and checked<>'1' and userid='$user[userid]' or payfsid='5'");
$dthnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='3' and userid='$user[userid]'");
$ywcnum = $empire->gettotal("select count(*) as total from {$dbtbpre}enewsshopdd where checked='1' and userid='$user[userid]'");
?>
	<div class="hymain">
		<!--引用js/css-->
		<link rel="stylesheet" href="/skin/member/dist/layui/css/layui.css">
		<link rel="stylesheet" href="/skin/member/dist/css/listdd.min.css">
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="/skin/member/dist/layui/layui.js"></script>
		<script src="/skin/member/dist/js/listdd.min.js"></script>
        <script type="text/html" id="allLists0">
            <!--订单渲染模板,勿动-->
            {{#  layui.each(d.list, function(index, item){ }}
            <li class="order-tiem" data-ddid="{{ item.ddid }}">
                <!--渲染整个订单的头部信息-->
                <table class="layui-table" lay-skin="nob">
                    <!--宽度设置-->
                    <colgroup>
                        <col width="200">
                        <col width="200">
                        <col width="200">
                        <col width="200">
                    </colgroup>
                    <thead>
                    <tr>
                        <!--订单号-->
                        <th>订单:{{ item.ddid }}</th>
                        <!--订单生成时间-->
                        <th>{{ item.ddtime }}</th>
                        <!--卖家-->
                        <th data-sellerid = "{{ item.sell_id }}">{{ item.seller }}</th>
                        <!--卖家联系方式-->
                        <th>电话：{{ item.phone }}</th>
                    </tr>
                    </thead>
                </table>
                <!--/--渲染整个订单的头部信息-->
                <!--渲染订单的产品信息（多个）-->
                <table class="layui-table" >
                    <!--宽度设置-->
                    <colgroup>
                        <col width="300">
                        <col width="50">
                        <col width="100">
                        <col width="140">
                        <col width="120">
                        <col width="120">
                    </colgroup>
                    <!--/--宽度设置-->
                    <tbody>
                    <!--渲染订单信息-->
                    {{#  layui.each(item.products, function(index, subItem){ }}
                    <!--如果当前渲染的是产品的第一个，要把状态，按钮，订单详情渲染出来-->
                    {{#  if(index == 0){ }}
                    <!--订单的第一行-->
                    <tr class="order-body" data-cpid = {{ subItem.titleid }}>
                        <!--第一列，商品图片与标题-->
                        <td>
                            <div class="title-warp">
                                <!--图片-->
                                <div class="order-body-item product-img f-l-l">
                                    <a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a>
                                </div>
                                <!--标题-->
                                <div class="order-body-item product-title f-l-l">
                                    <a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
                                </div>
                            </div>
                        </td>
                        <!--第二列，数量-->
                        <td class="order-body-item product-nums ">×{{ subItem.num }}</td>
                        <!--第三列，单价-->
                        <td class="order-body-item product-price ">￥{{ subItem.price }}</td>
                        <!--第四列，订单总价-->
                        <td class="order-body-item product-total-price" rowspan="{{item.products.length}}">
                            <p>总额：￥{{ item.totalprice }}</p>
                            <p>(含运费:￥{{ item.youfei }})</p>
                        </td>
                        <!--第五列：订单状态-->
                        <td class="order-body-item order-status order-statu " rowspan="{{item.products.length}}">
                            <!--<p>{{ item.type }}</p>-->
                            <p><a class="look-order-detaill" href="/e/ShopSys/ShowDd/index.php?ddid={{item.ddid}}">订单详情</a></p>
                        </td>
                        <!--第六列，订单操作-->
                        <td class="order-body-item order-Btn " rowspan="{{item.products.length}}">
                            {{#  if(item.type== 0){ }}
                                <!--type == 0,未付款-->
                                <a href="" class="go-pay-order order-com-button go-send">去付款</a>
                            {{#  }else if(item.type== 1){ }}
                                <!--type == 1,已取消订单-->
                                <p class="go-pay-order order-com-button go-send">已取消</p>
                            {{#  }else if(item.type== 2){ }}
                                <!--type == 2,等待确认收货-->
                                <p onclick="confirmGood({{item.ddid}})" class="go-pay-order order-com-button go-send">确认收货</p>
                            {{#  }else if(item.type== 3){ }}
                                <!--type == 3,已经确认收货-->
                                <p onclick="assess({{item.ddid}})" class="go-pay-order order-com-button go-send">评价</p>
                                <p onclick="refund({{item.ddid}})" class="go-pay-order order-com-button go-send">申请退款</p>
                            {{#  }else if(item.type== 4){ }}
                                <!--type == 4,已经申请退款(未确认)-->
                                <a  class="go-pay-order order-com-button-gray go-send">已申请退款</a>
                            {{#  }else if(item.type==5){ }}
                                <!--type == 5,已经拒绝退款-->
                                <a  class="go-pay-order order-com-button-gray go-send">卖家拒绝退款</a>
                                <p onclick="rengongkefu({{item.ddid}})" class="go-pay-order order-com-button go-send">申请人工介入</p>
                            {{#  }else if(item.type==6){ }}
                                <!--type == 6,申请身后-->
                            {{#  }else if(item.type==7){ }}
                                <!--type == 5,已经申请退款（已付款，未发货）-->
                                <a  class="go-pay-order order-com-button-gray go-send">已申请退款</a>
                            {{#  } }}
                            <!--<p onclick="confirmGood({{item.ddid}})" class="go-pay-order order-com-button go-send">确认收货</p>-->
                            <!--<p onclick="assess({{item.ddid}})" class="go-pay-order order-com-button go-send">评价</p>-->
                        </td>
                    </tr>
                    {{#  }else{ }}
                    <!--如果当前渲染的是产品的第二个已上，只要url，title,titlepic,num.price-->
                    <tr class="order-body" data-cpid = {{ subItem.titleid }}>
                        <!--第一列，商品图片与标题-->
                        <td>
                            <div class="title-warp">
                                <div class="order-body-item product-img f-l-l">
                                    <a href="{{ subItem.titleurl }}"><img src="{{ subItem.titlepic}}" alt="{{ subItem.title }}"></a></div>
                                <div class="order-body-item product-title f-l-l">
                                    <a href="{{ subItem.titleurl }}">{{ subItem.title }}</a>
                                </div>
                            </div>
                        </td>
                        <!--第二列，数量-->
                        <td class="order-body-item product-nums">×{{ subItem.num }}</td>
                        <!--第三列，单价-->
                        <td class="order-body-item product-total-price ">￥{{ subItem.price }}</td>
                    </tr>
                    {{#  } }}
                    <!--/--判断结束-->
                    {{#  }); }}
                    </tbody>
                </table>
                <!--产品循环结束-->
            </li>
            {{#  }); }}
            <!--订单循环结束-->
            {{#  if(d.list.length === 0){ }}
            你还没有订单
            {{#  } }}
            <!--订单模板结束-->
        </script>
        <!--/--引用js/css-->
		<div class="block">
			<? require(ECMS_PATH . 'e/template/incfile/leftside.php'); ?>
			<div class="fr rmain">
				<h3>我的订单</h3>
				<div class="tips">我的订单提醒：待提交<span>（<?= $dtjnum ?>）</span> 待收货<span>（<?= $dshnum ?>）</span>
					待退货<span>（<?= $dthnum ?>）</span> 已完成<span>（<?= $ywcnum ?>）</span></div>
				<div class="layui-tab" lay-filter="listdd">
					<ul class="layui-tab-title">
						<li class="layui-this" lay-id="dd-all">全部订单</li>
						<li lay-id="dd-1">待付款</li>
						<li lay-id="dd-2">待收货</li>
						<li lay-id="dd-3">售后中</li>
						<li lay-id="dd-4">已完成</li>
					</ul>
					<div class="layui-tab-content">
						<!--所有订单-->
						<div class="layui-tab-item layui-show ">
                            <!--列表头部的标题-->
							<table class="layui-table " lay-skin="nob">
								<colgroup>
									<col width="300">
									<col width="50">
									<col width="100">
									<col width="140">
									<col width="120">
									<col width="120">
								</colgroup>
								<thead>
								<tr>
									<th>商品</th>
									<th>数量</th>
									<th>单价(元)</th>
									<th>实付金额(元)</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
								</thead>
							</table>
                            <!--列表-->
                            <ul class="dd-list " id="ddList0">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
                            <!--/--列表-->
                            <!--分页-->
                            <div class="pages0"></div>
                            <!--分页-->
                        </div>
						<!--未付款-->
						<div class="layui-tab-item">
                            <!--列表头部的标题-->
                            <table class="layui-table " lay-skin="nob">
                                <colgroup>
                                    <col width="300">
                                    <col width="50">
                                    <col width="100">
                                    <col width="140">
                                    <col width="120">
                                    <col width="120">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>商品</th>
                                    <th>数量</th>
                                    <th>单价(元)</th>
                                    <th>实付金额(元)</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                            </table>
							<ul class="dd-list " id="ddList1">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
                            <div class="pages1"></div>
                        </div>
						<!--待收货-->
						<div class="layui-tab-item">
                            <!--列表头部的标题-->
                            <table class="layui-table " lay-skin="nob">
                                <colgroup>
                                    <col width="300">
                                    <col width="50">
                                    <col width="100">
                                    <col width="140">
                                    <col width="120">
                                    <col width="120">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>商品</th>
                                    <th>数量</th>
                                    <th>单价(元)</th>
                                    <th>实付金额(元)</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                            </table>
							<ul class="dd-list " id="ddList2">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
                            <div class="pages2"></div>
                        </div>
						<!--待评价-->
						<div class="layui-tab-item">
                            <!--列表头部的标题-->
                            <table class="layui-table " lay-skin="nob">
                                <colgroup>
                                    <col width="300">
                                    <col width="50">
                                    <col width="100">
                                    <col width="140">
                                    <col width="120">
                                    <col width="120">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>商品</th>
                                    <th>数量</th>
                                    <th>单价(元)</th>
                                    <th>实付金额(元)</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                            </table>
							<ul class="dd-list " id="ddList3">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
                            <div class="pages3"></div>
                        </div>
						<!--预留的-->
						<div class="layui-tab-item">
							<table class="layui-table " lay-skin="nob">
								<colgroup>
									<col width="265">
									<col width="42">
									<col width="100">
									<col width="100">
									<col width="90">
									<col width="100">
									<col>
								</colgroup>
								<thead>
								<tr>
									<th>商品</th>
									<th>数量</th>
									<th>单价(元)</th>
									<th>实付金额(元)</th>
									<th>状态</th>
									<th>操作</th>
									<th>详情</th>
								</tr>
								</thead>
							</table>
							<ul class="dd-list " id="ddList4">
								<li>
									<!--加载动画..-->
									<i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
								</li>
							</ul>
							<div class="pages4"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>