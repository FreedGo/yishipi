<?php
if(!defined('InEmpireCMS'))
{

    exit();
}

require(ECMS_PATH.'e/ecmsshop/tehui/class.php');
require(ECMS_PATH.'e/ecmsshop/pricearr/class.php');
$user=isloginajax();

?>
<?php
$totalmoney=0;
$sql="select * from phome_ecms_shop_gouwuche where userid='".$user['userid']."'";
$query = $empire->query($sql);
?>
<div id="buycar">
    <div class="car1"></div>
    <div class="epy-car f14" <? if($user['userid']>0){echo 'style="display:none;"';}?>>
        您的购物车是空的，赶快行动吧！您可以：<br>
        <a href="/" class="c4095ce f12 noBold">去购物 ></a> <span class="f12 noBold c666">或者</span> <a href="/e/payapi/" class="c4095ce f12 noBold">去充值 ></a>
    </div>
    <div class="carlist mt10"<? if($user['userid']<=0){echo 'style="display:none;"';}?>>
        <form name=form1 method=post action='../doaction.php' id="carform">
            <input type=hidden name=enews value=ClearBuycar>
            <table>
                <thead>
                <tr>
                    <th class="w1"><label><input name="productcheckbox" type="checkbox" id="mark-all">全选</label></th>
                    <th class="w60"></th>
                    <th class="left">商品</th>
                    <th class="w4">单价</th>
                    <th class="w6">数量</th>
                    <th class="w4">商品总计</th>
                    <th class="row w4">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                while($r=$empire->fetch($query)){
                    //取得产品信息
                    $productr=$empire->fetch1("select * from phome_ecms_shop where id='$r[shop_id]' limit 1");
       
                    
                    //是否全部点数
                    if(!$productr[buyfen])
                    {
                        $buytype=1;
                    }else{
                        $buytype=$productr[buyfen];
                    }
                    
                    $thistotalfen=$productr[buyfen]*$buycar['num'];
                    $totalfen+=$thistotalfen;
                    
                    if(empty($r[titlepic])){
                    		$r[titlepic]="../../data/images/notimg.gif";
                    }
                    if(!$r[buyfen])
                    {
                        $buytype=1;
                    }
                    
                    
                    if($user['groupid'] == 1){
                        $thistotal = $productr['PriceFluctuation']*$r['num'];
                    }else{
                        $thistotal = $productr['PriceIncrease']*$r['num'];
                    }
                    
                    $totalmoney += $thistotal;
                   
                ?>
                    <tr>
                        <input type="hidden" name="id[]" value="<?=$r['id']?>">
                        <input type="hidden" name="shop_id[]" value="<?=$r['shop_id']?>">
                        <input type="hidden" name="title[]" value="<?=$r['title']?>">
                        <input type="hidden" name="titleurl[]" value="<?=$r['titleurl']?>">
                        <input type="hidden" name="userid[]" value="<?=$r['userid']?>">
                        <input type="hidden" name="classid[]" value="<?=$r['classid']?>">
                        <input type="hidden" name="titlepic[]" value="<?=$r['titlepic']?>">
                        <input type="hidden" name="PriceFluctuation[]" value="<?=$productr[PriceFluctuation]?>">
                        <input type="hidden" name="PriceIncrease[]" value="<?=$productr[PriceIncrease]?>">
                        <input type="hidden" name="price[]" value="<?=$r[price]?>">
                        <input type="hidden" name="tprice[]" value="<?=$productr[tprice]?>">
                        
                        
                        
                        <td><input type="checkbox" name="del[]" value="<?=$r['shop_id']?>" class="delbox" checked="checked"></td>
                        
                        <input type="hidden" name="addatt[]" value="<?=$addatt?>"></td>
                        <td><img src="<?=$r[titlepic]?>" border="0" width="80" height="80"></td>
                        <td class="left"><a href="<?=$r['titleurl']?>"><?=$r[title]?></a></td>
                        
                        <?php if($user['groupid'] == 1){?>
                          <td>￥<span class="price"><?=$productr[PriceFluctuation]?></span><br>(<del>￥<?=$productr[PriceFluctuation]?></del>)</td>
                        <?php }else{?>
                          <td>￥<span class="price"><?=$productr[PriceIncrease]?></span><br>(<del>￥<?=$productr[PriceIncrease]?></del>)</td>
                        <?php }?>
                        <td><div class="carnum"><a href="javascript:void(0);" class="numbutton numless">-</a><input maxlength="3" size="3" name="num[]" type="text" value="<?=$r['num']?>" rel="<?=$r['num']?>" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();"><a href="javascript:void(0);" class="numbutton numadd">+</a></div></td>
                        <td><span class="csh">￥<span class="totalprice"><?=$thistotal?></span></span></td>
                        <td class="row f-tar"><a href="/e/ShopSys/doaction.php?enews=delBuycar&classid=<?=$r[classid]?>&id=<?=$r[id]?>&shop_id=<?=$r[shop_id]?>" class="cblue">删除</a></td>
                    </tr>
                <?php 
                  }
                ?>
               
                <?php
                
                if(!$buytype)//点数付费
                {
                    ?>
                    <tr>
                        <td colspan="7" class="bgfa carjs">
                            <div class="fl"><input type="submit" class="delthis" value=""></div>
                            <div class="fr mr30 f14 yh">合计点数 : <span class="csh f12"><span class="carjsprice bold f20"><?=$totalfen?></span></span></div>
                            <div class="clearfix"></div>
                        </td>
                    </tr>
                    <?php
                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="7" class="bgfa carjs">
                            <div class="fl"><input type="button" class="delthis" value="" onClick="window.location.href='/e/ShopSys/doaction.php?enews=ClearBuycar';"></div>
                            <div class="fr mr30 f14 yh">总价(不包含运费) : <span class="csh f12">¥ <span class="carjsprice bold f20"><input type="hidden" name="totalmoney" value="<?=$totalmoney?>"/><?=$totalmoney?></span></span></div>
                            <div class="clearfix"></div>
                            <?
                            if ($public_r['add_cartip']){
                                ?>
                                <div class="to-exp-free"><span class="tri"></span><?=$public_r['add_cartip']?></div>
                            <? } ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </form>
        <div class="buynow right">
            <input type="button" class="gono" value="" onclick="return function(){window.location.href='/';return false;}(this);">
            <input type="button" class="cart-buy" value="" onclick="">
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".cart-buy").click( function(){$("#carform input[name='enews']").val("Buycarsub");$("#carform").submit();});
    })
</script>
