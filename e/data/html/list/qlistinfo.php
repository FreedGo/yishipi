<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select id,classid,isurl,titleurl,isqf,havehtml,istop,isgood,firsttitle,ismember,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlefont,titlepic,title from ".$infotb." where ".$yhadd."userid='$user[userid]' and ismember=1".$add." order by newstime desc limit $offset,$line";
$sql=$empire->query($query);
//返回头条和推荐级别名称
$ftnr=ReturnFirsttitleNameList(0,0);
$ftnamer=$ftnr['ftr'];
$ignamer=$ftnr['igr'];

$public_diyr['pagetitle']='管理商品';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid".$addecmscheck."'>管理商品</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hymain">
  <div class="block">
    <? require(ECMS_PATH.'e/template/incfile/leftside.php');?>
    <div class="fr rmain">
      <h3>管理商品</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      发布商品请遵循国家法律!
	  </div>
      <div class="yuer f12 p20 pt5"><div class="fr"><form name="searchinfo" method="GET" action="ListInfo.php">搜索： 
          <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
          <select name="show">
            <option value="0" selected>标题</option>
          </select>
          <input type="submit" name="Submit2" value="搜索" class="button small gray">
          <input name="sear" type="hidden" id="sear" value="1">
          <input name="mid" type="hidden" value="<?=$mid?>">
		  <input name="ecmscheck" type="hidden" id="ecmscheck" value="<?=$ecmscheck?>">
  </form></div><a href="ChangeClass.php?mid=<?=$mid?><?=$addecmscheck?>" class="button small">增加商品</a></span></div>
      <div class="tab">
        <div class="ddsearch fr"><a href="ChangeClass.php?mid=<?=$mid?><?=$addecmscheck?>" class="c4095ce">发布商品>></a></div>
        <ul>
          <li class="<? if(!$_GET[ecmscheck]){echo "tabhover";}?>"><a href="ListInfo.php?mid=<?=$mid?>">已发布</a></li>
          <li class="<? if($_GET[ecmscheck]){echo "tabhover";}?>"><a href="ListInfo.php?mid=<?=$mid?>&ecmscheck=1">待审核</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="left" style="white-space:nowrap;overflow:hidden;word-break:break-all;">标题</th>
        <th class="w6" style="white-space:nowrap;overflow:hidden;word-break:break-all;">所属栏目</th>
        <th class="w6 phonehide">发布时间</th>
        <th class="w70 phonehide">点击(评论)</th>
        <th class="w30 phonehide">审核</th>
        <th class="row w6" style="white-space:nowrap;overflow:hidden;word-break:break-all;">操作</th>
        </tr>
        </thead>
        <tbody>
 <?
 if (mysql_num_rows($sql) < 1){echo '<tr><td colspan="6">暂无商品</td></tr>';}
	while($r=$empire->fetch($sql))
	{
		//状态
		$st='';
		if($r[istop])//置顶
		{
			$st.="<font color=red>[顶".$r[istop]."]</font>";
		}
		if($r[isgood])//推荐
		{
			$st.="<font color=red>[".$ignamer[$r[isgood]-1]."]</font>";
		}
		if($r[firsttitle])//头条
		{
			$st.="<font color=red>[".$ftnamer[$r[firsttitle]-1]."]</font>";
		}
		//时间
		$newstime=date("Y-m-d",$r[newstime]);
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,50,false));
		$r[title]=DoTitleFont($r[titlefont],$r[title]);
		if($indexchecked==0)
		{
			$checked='<img src="/eshop/skin/error.png"/>';
			$titleurl='AddInfo.php?enews=MEditInfo&classid='.$r[classid].'&id='.$r[id].'&mid='.$mid.$addecmscheck;//链接
		}
		else
		{
			$checked='<img src="/eshop/skin/success.png"/>';
			$titleurl=sys_ReturnBqTitleLink($r);//链接
		}
		$plnum=$r[plnum];//评论个数
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{$showtitlepic="<a href='".$r[titlepic]."' title='预览标题图片' target=_blank><img src='../data/images/showimg.gif' border=0></a>";}
		//栏目
		$classname=$class_r[$r[classid]][classname];
		$classurl=sys_ReturnBqClassname($r,9);
		$bclassid=$class_r[$r[classid]][bclassid];
		$br['classid']=$bclassid;
		$bclassurl=sys_ReturnBqClassname($br,9);
		$bclassname=$class_r[$bclassid][classname];
	?>
        <tr>
        <td class="left"> <?=$st?>
		<?=$showtitlepic?>
        <a href="<?=$titleurl?>" target=_blank title="<?=$oldtitle?>" class="cgren"><?=$r[title]?></a>
		</td>
        <td><a href='<?=$bclassurl?>' target='_blank'><?=$bclassname?></a> > <a href='<?=$classurl?>' target='_blank'><?=$classname?></a></td>
        <td class="phonehide"><?=$newstime?></td>
        <td class="phonehide"><a title="下载次数:<?=$r[totaldown]?>"><?=$r[onclick]?></a> (<a href="<?=$public_r['plurl']?>?id=<?=$r[id]?>&classid=<?=$r[classid]?>" title="查看评论" target=_blank><?=$plnum?></a>)</td>
        <td class="phonehide"><?=$checked?></td>
        <td class="row f-tar"><a href="AddInfo.php?enews=MEditInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>">修改</a> | <a href="ecms.php?enews=MDelInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>" onclick="return confirm('确认要删除?');">删除</a> </td>
        </tr>
        <?php
		}
		?>
        <? if ($returnpage){?>
        <tr>
        <td colspan="6" class=""><?=$returnpage?></td>
        </tr>
        <? } ?>
        </tbody>
        </table>
      </div>    
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>