<?php

if (!defined('InEmpireCMS')) {
    exit();
}
?>
<?
$public_diyr['pagetitle'] = '订单详情';
require(ECMS_PATH . 'e/template/incfile/header.php');

?>
    <div class="hymain">
        <!--引用js/css-->
        <link rel="stylesheet" href="/skin/member/dist/layui/css/layui.css">
        <link rel="stylesheet" href="/skin/member/dist/css/listdd.min.css">
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="/skin/member/dist/layui/layui.js"></script>
        <script src="/skin/member/dist/js/showdd.min.js"></script>
        <div class="block">
            <? require(ECMS_PATH . 'e/template/incfile/leftside.php'); ?>
            <div class="fr rmain">
                <h3>订单详情</h3>
                <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>当前订单号: <span
                            class="f12 st cred"><?= $r[ddno] ?></span> 下单时间: <span
                            class="f12 st cred"><?= $r[ddtime] ?></span></div>
                <div class="tab">
                    <div class="ddsearch fr">订单查询：
                        <form name="form1" method="get" action="index.php">
                            <input name="sear" type="hidden" id="sear2" value="1">
                            <input type="text" name="keyboard" value="<?= $keyboard ? $keyboard : '请输入订单号' ?>"
                                   onBlur="if(this.value=='') this.value='请输入订单号';"
                                   onFocus="if(this.value=='请输入订单号') this.value='';">
                            <input type="submit" value="" class="w-search">
                        </form>
                    </div>
                    <ul>
                        <li class="tabhover"><a href="javascript:void(0);">商品信息</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="bstable mt10">
                    <div class="m-odit">
                        <?php
                        $buycar = $addr['buycar'];
                        $payby = $r['payby'];
                        include('buycar/buycar_showdd.php');
                        ?>
                    </div>
                </div>
                <h3>订单信息 <span class="f12 noBold c999">此订单的具体详情</span></h3>
                <div class="m-odit">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="12%" height="25">
                                <div align="right">订单号：</div>
                            </td>
                            <td width="32%"><strong>
                                    <?= $r[ddno] ?>
                                </strong></td>
                            <td width="14%">
                                <div align="right">订单状态：</div>
                            </td>
                            <td width="41%"><strong>
                                    <?= $ha ?>
                                </strong>/<strong>
                                    <?= $ou ?>
                                </strong>/<strong>
                                    <?= $ch ?>
                                </strong>
                                <?= $topay ?>          </td>
                        </tr>
                        <tr>
                            <td height="25">
                                <div align="right">下单时间：</div>
                            </td>
                            <td><strong>
                                    <?= $r[ddtime] ?>
                                </strong></td>
                            <td>
                                <div align="right">商品总金额：</div>
                            </td>
                            <td><strong>
                                    <?= $alltotal ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td height="25">
                                <div align="right">配送方式：</div>
                            </td>
                            <td><strong>
                                    <?= $r[psname] ?>
                                </strong></td>
                            <td>
                                <div align="right">+ 商品运费：</div>
                            </td>
                            <td><strong>
                                    <?= $pstotal ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td height="25">
                                <div align="right">支付方式：</div>
                            </td>
                            <td><strong>
                                    <?= $payfsname ?>
                                </strong></td>
                            <td>
                                <div align="right">+ 发票费用：</div>
                            </td>
                            <td><?= $r[fptotal] ?></td>
                        </tr>
                        <tr>
                            <td height="25">
                                <div align="right">需要发票：</div>
                            </td>
                            <td><?= $fp ?></td>
                            <td>
                                <div align="right">- 优惠：</div>
                            </td>
                            <td><?= $r[pretotal] ?></td>
                        </tr>
                        <tr>
                            <td height="25">
                                <div align="right">发票抬头：</div>
                            </td>
                            <td><strong>
                                    <?= $r[fptt] ?>
                                </strong></td>
                            <td>
                                <div align="right">订单总金额：</div>
                            </td>
                            <td><strong>
                                    <?= $mytotal ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td height="25">
                                <div align="right">发票名称：</div>
                            </td>
                            <td colspan="3"><strong>
                                    <?= $r[fpname] ?>
                                </strong></td>
                        </tr>
                    </table>
                </div>
                <h3>物流信息</h3>
                <div class="m-odit">
                    <table width="100%%" border="0" cellspacing="1" cellpadding="3">
                        <tr>
                            <td width="15%" height="25">发货状态:</td>
                            <td width="35%">
                                <?= $r[truename] ?>
                            </td>
                            <td width="15%">物流公司:</td>
                            <td width="35%"><?= $r[phone] ?></td>
                        </tr>
                        <tr>
                            <td>物流单号:</td>
                            <td><?= $r[email] ?></td>
                            <td >发货时间:</td>
                            <td><?= $r[address] ?></td>
                        </tr>
                    </table>
                    <div class="detaill-msg-mon">
                        <span class="detaill-msg-mon-name ">物流跟踪:</span>
                        <span class="detaill-msg-mon-val ">
                            <!--在js内部插入订单号-->
                            <!--<a onclick="getWuliu('<?= $r[wuliudanhao] ?>')" class="get-wuliu-msg">点击查询</a>-->
                            <a onclick="getWuliu(421410773991)" class="get-wuliu-msg">点击查询</a>
                        </span>
                    </div>
                    <div class="wuliu-msg-warp">
                        <div class="wuliu-msg-show">
                            <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-icon-loading">&#xe63d;</i>
                        </div>
                    </div>
                </div>
                <h3>收货人信息</h3>
                <div class="m-odit">
                    <table width="100%%" border="0" cellspacing="1" cellpadding="3">
                        <tr>
                            <td width="20%" height="25">真实姓名:</td>
                            <td width="80%">
                                <?= $r[truename] ?>          </td>
                        </tr>
                        <!-- 以下个人觉得没必要显示
        <tr> 
          <td height="25">QQ:</td>
          <td> 
            <?= $r[oicq] ?>          </td>
        </tr>
        <tr> 
          <td height="25">MSN:</td>
          <td> 
            <?= $r[msn] ?>          </td>
        </tr>
        <tr> 
          <td height="25">固定电话:</td>
          <td> 
            <?= $r[mycall] ?>          </td>
        </tr>
        -->
                        <tr>
                            <td height="25">移动电话:</td>
                            <td>
                                <?= $r[phone] ?>          </td>
                        </tr>
                        <tr>
                            <td height="25">联系邮箱:</td>
                            <td>
                                <?= $r[email] ?>          </td>
                        </tr>
                        <tr>
                            <td height="25">联系地址:</td>
                            <td>
                                <?= $r[address] ?>          </td>
                        </tr>
                        <tr>
                            <td height="25">邮编:</td>
                            <td>
                                <?= $r[zip] ?>          </td>
                        </tr>
                        <!-- 以下个人觉得没必要显示
        <tr>
          <td height="25">标志建筑:</td>
          <td><?= $r[signbuild] ?></td>
        </tr>
        <tr>
          <td height="25">最佳送货地址:</td>
          <td><?= $r[besttime] ?></td>
        </tr>
        -->
                        <tr>
                            <td height="25">备注:</td>
                            <td>
                                <?= nl2br($addr[bz]) ?>          </td>
                        </tr>
                    </table>
                </div>
                <h3>管理员备注信息 <span class="f12 noBold c999">管理员给您的留言信息</span></h3>
                <div class="m-odit">
                    <table width="100%%" border="0" cellspacing="1" cellpadding="3">
                        <tr>
                            <td width="20%" height="25">备注内容:</td>
                            <td width="80%">
                                <?= nl2br($addr['retext']) ?>          </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>