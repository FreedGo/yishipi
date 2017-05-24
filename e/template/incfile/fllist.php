<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$tmgetgroupid=(int)getcvar('mlgroupid');
if($tmgetgroupid==1)
{
?>
<div class="morecpfl">
                    	<ul>
                        	<li><a href="/e/member/my/">我的帐号</a></li>
                            <li><a href="/e/member/msg/">站内消息</a></li>
                            <li><a href="/e/payapi/">财务信息</a></li>
                            <li><a href="/e/ShopSys/ListDd/">我的交易</a></li>
                        </ul>
</div>


<?php
}
elseif($tmgetgroupid==2)
{
?>


<div class="morecpfl">
    <ul>
        <li><a href="/e/member/my/">我的帐号</a></li>
        <li><a href="/e/member/msg/">站内消息</a></li>
        <li><span class="gt"></span><a href="#">管理商品</a><div><?=$kjmenu?></div></li>
        <li><a href="/e/member/mspace/SetSpace.php">会员店铺</a></li>
        <li><a href="/e/payapi/">财务信息</a></li>
        <li><a href="/e/ShopSys/ListDd/">我的交易</a></li>
    </ul>
</div>

<?php
}
elseif($tmgetgroupid==3)
{
?>


    <div class="morecpfl">
        <ul>
            <li><a href="/e/member/my/">我的帐号</a></li>
            <li><a href="/e/member/msg/">站内消息</a></li>
            <li><span class="gt"></span><a href="#">管理商品</a><div><?=$kjmenu?></div></li>
            <li><a href="/e/member/mspace/SetSpace.php">会员店铺</a></li>
            <li><a href="/e/payapi/">财务信息</a></li>
            <li><a href="/e/ShopSys/ListDd/">我的交易</a></li>
        </ul>
    </div>


    <?php
}
elseif($tmgetgroupid==4)
{
?>
<div class="morecpfl">
    <ul>
        <li><a href="/e/member/my/">我的帐号</a></li>
        <li><a href="/e/member/msg/">站内消息</a></li>
        <li><span class="gt"></span><a href="#">管理商品</a><div><?=$kjmenu?></div></li>
        <li><a href="/e/member/mspace/SetSpace.php">会员店铺</a></li>
        <li><a href="/e/payapi/">财务信息</a></li>
        <li><a href="/e/ShopSys/ListDd/">我的交易</a></li>
    </ul>
</div>
<?php
}
?>