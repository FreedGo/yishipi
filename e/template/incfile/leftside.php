<?php
if(!defined('InEmpireCMS'))
{
	exit();
}

$selffile=eReturnSelfPage(0);
/*  <?=$ltgmenu?>  */
?>

<?php
$tmgetgroupid=(int)getcvar('mlgroupid');
if($tmgetgroupid==1)
{
?>
<div class="fl leftside">
      <h3>帐户管理</h3>
      <ul>
        <li><a href="/e/member/cp/">帐户信息</a></li>
        <li><a href="/e/member/EditInfo/EditSafeInfo.php">帐户安全</a></li>
        <li><a href="/e/member/msg/">站内消息</a></li>
        <li><a href="/e/member/EditInfo/">个人资料</a></li>
      </ul>

      <h3>我的交易</h3>
      <ul>
        <li><a href="/e/ShopSys/ListDd/">我的订单</a></li>
<!--        <li><a href="/e/member/fanli/">我的返利</a></li>-->
        <li><a href="/e/member/fava/">我的收藏</a></li>
        <li><a href="/e/ecmsshop/mycomments/">评价/晒单</a></li>
        <li><a href="/e/ShopSys/buycar/" target="_blank">我的购物车</a></li>
        <li><a href="/e/ShopSys/address/ListAddress.php">收货地址管理</a></li>
      </ul>
	  <h3>我的物流</h3>
	  <ul>
	  <li><a href="#">物流查询</a></li>
	  </ul>
      <h3>财务信息</h3>
      <ul>
        <li><a href="/e/payapi/">余额/充值</a></li>
        <li><a href="/e/member/buygroup/">购买会员组</a></li>
        <!--<li><a href="/e/member/togroup/">积分兑换会员组</a></li>-->
<!--        <li><a href="/e/member/card/">红包充值</a></li>-->
        <li><a href="/e/member/buybak/">充值记录</a></li>
      </ul>


      <div class="shousuo">展<br>开<br>菜<br>单</div>
</div>
<?php
}
elseif($tmgetgroupid==2)
{
?>
<div class="fl leftside">
      <h3>帐户管理</h3>
      <ul>
        <li><a href="/e/member/cp/">帐户信息</a></li>
        <li><a href="/e/member/EditInfo/EditSafeInfo.php">帐户安全</a></li>
        <li><a href="/e/member/msg/">站内消息</a></li>
        <li><a href="/e/member/EditInfo/">个人资料</a></li>
      </ul>
	  <h3>产品管理</h3>
      <ul>
<?=$ltgmenu?>
      </ul>
      <h3>我的交易</h3>
      <ul>
        <li><a href="/e/ShopSys/ListDd/">采购订单</a></li>
        <li><a href="/e/ShopS/ListDds/">买家订单</a></li>
<!--        <li><a href="/e/member/fanli/">我的返利</a></li>-->
        <li><a href="/e/member/fava/">我的收藏</a></li>
        <li><a href="/e/ecmsshop/mycomments/">评价/晒单</a></li>
        <li><a href="/e/ShopSys/buycar/" target="_blank">我的购物车</a></li>
        <li><a href="/e/ShopSys/address/ListAddress.php">收货地址管理</a></li>
      </ul>
	  <h3>我的物流</h3>
	  <ul>
	  <li><a href="#">物流查询</a></li>
	  </ul>
      <h3>财务信息</h3>
      <ul>
        <li><a href="/e/payapi/">余额/充值</a></li>
        <li><a href="/e/member/buygroup/">购买会员组</a></li>
       <!--  <li><a href="/e/member/togroup/">积分兑换会员组</a></li>-->
<!--        <li><a href="/e/member/card/">红包充值</a></li>-->
        <li><a href="/e/member/buybak/">充值记录</a></li>
      </ul>
      <h3>余额提现</h3>
      <ul>
        <li><a href="/e/ecmsshop/withdrawal/"<?=$cash?>>提现申请</a></li>
        <li><a href="/e/ecmsshop/withdrawal/cashbind.php"<?=$cashbind?>>绑定银行卡</a></li>
      </ul>
      <h3>我的店铺</h3>
      <ul>
        <li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$tmgetuserid?>">预览我的店铺</a></li>
        <li><a href="<?=$public_r['newsurl']?>e/member/mspace/SetSpace.php">设置我的店铺</a></li>
<!--        <li><a href="--><?//=$public_r['newsurl']?><!--e/member/mspace/ChangeStyle.php">选择店铺模板</a></li>-->
       <!--  <li><a href="<?=$public_r['newsurl']?>e/member/mspace/gbook.php">管理主页留言</a></li> 
        <li><a href="<?=$public_r['newsurl']?>e/member/mspace/feedback.php">管理主页反馈</a></li>-->
      </ul>
      <div class="shousuo">展<br>开<br>菜<br>单</div>
</div>

<?php
}
elseif($tmgetgroupid==3)
{
?>
<div class="fl leftside">
      <h3>帐户管理</h3>
      <ul>
        <li><a href="/e/member/cp/">帐户信息</a></li>
        <li><a href="/e/member/EditInfo/EditSafeInfo.php">帐户安全</a></li>
        <li><a href="/e/member/msg/">站内消息</a></li>
        <li><a href="/e/member/EditInfo/">个人资料</a></li>
      </ul>
	  <h3>产品管理</h3>
      <ul>
<?=$ltgmenu?>
      </ul>
      <h3>我的交易</h3>
      <ul>
        <li><a href="/e/ShopSys/ListDd/">采购订单</a></li>
        <li><a href="/e/ShopS/ListDds/">买家订单</a></li>
<!--        <li><a href="/e/member/fanli/">我的返利</a></li>-->
        <li><a href="/e/member/fava/">我的收藏</a></li>
        <li><a href="/e/ecmsshop/mycomments/">评价/晒单</a></li>
        <li><a href="/e/ShopSys/buycar/" target="_blank">我的购物车</a></li>
        <li><a href="/e/ShopSys/address/ListAddress.php">收货地址管理</a></li>
      </ul>
	  <h3>我的物流</h3>
	  <ul>
	  <li><a href="#">物流查询</a></li>
	  </ul>
      <h3>财务信息</h3>
      <ul>
        <li><a href="/e/payapi/">余额/充值</a></li>
        <li><a href="/e/member/buygroup/">购买会员组</a></li>
      <!--   <li><a href="/e/member/togroup/">积分兑换会员组</a></li>-->
<!--        <li><a href="/e/member/card/">红包充值</a></li>-->
        <li><a href="/e/member/buybak/">充值记录</a></li>
      </ul>
      <h3>余额提现</h3>
      <ul>
        <li><a href="/e/ecmsshop/withdrawal/"<?=$cash?>>提现申请</a></li>
        <li><a href="/e/ecmsshop/withdrawal/cashbind.php"<?=$cashbind?>>绑定银行卡</a></li>
      </ul>
      <h3>我的店铺</h3>
      <ul>
        <li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$tmgetuserid?>">预览我的店铺</a></li>
        <li><a href="<?=$public_r['newsurl']?>e/member/mspace/SetSpace.php">设置我的店铺</a></li>
<!--        <li><a href="--><?//=$public_r['newsurl']?><!--e/member/mspace/ChangeStyle.php">选择店铺模板</a></li>-->
<!--          <li><a href="--><?//=$public_r['newsurl']?><!--e/member/mspace/gbook.php">管理主页留言</a></li> -->
<!--        <li><a href="--><?//=$public_r['newsurl']?><!--e/member/mspace/feedback.php">管理主页反馈</a></li>-->
      </ul>
      <div class="shousuo">展<br>开<br>菜<br>单</div>
</div>


<?php
}
elseif($tmgetgroupid==4)
{
?>
<div class="fl leftside">
      <h3>帐户管理</h3>
      <ul>
        <li><a href="/e/member/cp/">帐户信息</a></li>
        <li><a href="/e/member/EditInfo/EditSafeInfo.php">帐户安全</a></li>
        <li><a href="/e/member/msg/">站内消息</a></li>
        <li><a href="/e/member/EditInfo/">个人资料</a></li>
      </ul>
	  <h3>产品管理</h3>
      <ul>
<?=$ltgmenu?>
      </ul>
      <h3>我的交易</h3>
      <ul>
        <li><a href="/e/ShopSys/ListDd/">采购订单</a></li>
        <li><a href="/e/ShopS/ListDds/">买家订单</a></li>
<!--        <li><a href="/e/member/fanli/">我的返利</a></li>-->
        <li><a href="/e/member/fava/">我的收藏</a></li>
        <li><a href="/e/ecmsshop/mycomments/">评价/晒单</a></li>
        <li><a href="/e/ShopSys/buycar/" target="_blank">我的购物车</a></li>
        <li><a href="/e/ShopSys/address/ListAddress.php">收货地址管理</a></li>
      </ul>
	  <h3>我的物流</h3>
	  <ul>
	  <li><a href="#">物流查询</a></li>
	  </ul>
      <h3>财务信息</h3>
      <ul>
        <li><a href="/e/payapi/">余额/充值</a></li>
        <li><a href="/e/member/buygroup/">购买会员组</a></li>
        <!-- <li><a href="/e/member/togroup/">积分兑换会员组</a></li>-->
<!--        <li><a href="/e/member/card/">红包充值</a></li>-->
        <li><a href="/e/member/buybak/">充值记录</a></li>
      </ul>
      <h3>余额提现</h3>
      <ul>
        <li><a href="/e/ecmsshop/withdrawal/"<?=$cash?>>提现申请</a></li>
        <li><a href="/e/ecmsshop/withdrawal/cashbind.php"<?=$cashbind?>>绑定银行卡</a></li>
      </ul>
      <h3>我的店铺</h3>
      <ul>
        <li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$tmgetuserid?>">预览我的店铺</a></li>
        <li><a href="<?=$public_r['newsurl']?>e/member/mspace/SetSpace.php">设置我的店铺</a></li>
<!--        <li><a href="--><?//=$public_r['newsurl']?><!--e/member/mspace/ChangeStyle.php">选择店铺模板</a></li>-->
       <!--  <li><a href="<?=$public_r['newsurl']?>e/member/mspace/gbook.php">管理主页留言</a></li> 
        <li><a href="<?=$public_r['newsurl']?>e/member/mspace/feedback.php">管理主页反馈</a></li>-->
      </ul>
      <div class="shousuo">展<br>开<br>菜<br>单</div>
</div>
<?php
}
?>

