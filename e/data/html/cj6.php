<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品名称正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品缩略片正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--titlepic--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_titlepic]" type="text" id="add[qz_titlepic]" value="<?=stripSlashes($r[qz_titlepic])?>"> 
        <input name="add[save_titlepic]" type="checkbox" id="add[save_titlepic]" value=" checked"<?=$r[save_titlepic]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_titlepic]" cols="60" rows="10" id="add[zz_titlepic]"><?=ehtmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_titlepic]" type="text" id="titlepic5" value="<?=stripSlashes($r[z_titlepic])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>发布时间正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>简单描述正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--intro--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_intro]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_intro]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_intro]" type="text" id="add[z_intro]" value="<?=stripSlashes($r[z_intro])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>品牌正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--brand--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_brand]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_brand]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_brand]" type="text" id="add[z_brand]" value="<?=stripSlashes($r[z_brand])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>到期时间正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--expday--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_expday]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_expday]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_expday]" type="text" id="add[z_expday]" value="<?=stripSlashes($r[z_expday])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>条形码正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--bar_code--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_bar_code]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_bar_code]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_bar_code]" type="text" id="add[z_bar_code]" value="<?=stripSlashes($r[z_bar_code])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>货号正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--no--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_no]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_no]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_no]" type="text" id="add[z_no]" value="<?=stripSlashes($r[z_no])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>过关单正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--pass_customs_path--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_pass_customs_path]" type="text" id="add[qz_pass_customs_path]" value="<?=stripSlashes($r[qz_pass_customs_path])?>"> 
        <input name="add[save_pass_customs_path]" type="checkbox" id="add[save_pass_customs_path]" value=" checked"<?=$r[save_pass_customs_path]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_pass_customs_path]" cols="60" rows="10" id="add[zz_pass_customs_path]"><?=ehtmlspecialchars(stripSlashes($r[zz_pass_customs_path]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_pass_customs_path]" type="text" id="pass_customs_path5" value="<?=stripSlashes($r[z_pass_customs_path])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>税单正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--bill_path--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_bill_path]" type="text" id="add[qz_bill_path]" value="<?=stripSlashes($r[qz_bill_path])?>"> 
        <input name="add[save_bill_path]" type="checkbox" id="add[save_bill_path]" value=" checked"<?=$r[save_bill_path]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_bill_path]" cols="60" rows="10" id="add[zz_bill_path]"><?=ehtmlspecialchars(stripSlashes($r[zz_bill_path]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_bill_path]" type="text" id="bill_path5" value="<?=stripSlashes($r[z_bill_path])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>卫生检测证明正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--health_detection_path--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_health_detection_path]" type="text" id="add[qz_health_detection_path]" value="<?=stripSlashes($r[qz_health_detection_path])?>"> 
        <input name="add[save_health_detection_path]" type="checkbox" id="add[save_health_detection_path]" value=" checked"<?=$r[save_health_detection_path]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_health_detection_path]" cols="60" rows="10" id="add[zz_health_detection_path]"><?=ehtmlspecialchars(stripSlashes($r[zz_health_detection_path]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_health_detection_path]" type="text" id="health_detection_path5" value="<?=stripSlashes($r[z_health_detection_path])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>包装方式正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--pack_way--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_pack_way]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_pack_way]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_pack_way]" type="text" id="add[z_pack_way]" value="<?=stripSlashes($r[z_pack_way])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>建议零售价正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--dan_price--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_dan_price]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_dan_price]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_dan_price]" type="text" id="add[z_dan_price]" value="<?=stripSlashes($r[z_dan_price])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>单价正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--tprice--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_tprice]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_tprice]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_tprice]" type="text" id="add[z_tprice]" value="<?=stripSlashes($r[z_tprice])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>箱价正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--price--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_price]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_price]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_price]" type="text" id="add[z_price]" value="<?=stripSlashes($r[z_price])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>价格浮动正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--PriceFluctuation--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_PriceFluctuation]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_PriceFluctuation]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_PriceFluctuation]" type="text" id="add[z_PriceFluctuation]" value="<?=stripSlashes($r[z_PriceFluctuation])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>产地正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--chandi--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_chandi]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_chandi]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_chandi]" type="text" id="add[z_chandi]" value="<?=stripSlashes($r[z_chandi])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>起批量正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--qipiliang--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_qipiliang]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_qipiliang]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_qipiliang]" type="text" id="add[z_qipiliang]" value="<?=stripSlashes($r[z_qipiliang])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>箱规正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--xianggui--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_xianggui]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_xianggui]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_xianggui]" type="text" id="add[z_xianggui]" value="<?=stripSlashes($r[z_xianggui])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>单品规格正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--danguige--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_danguige]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_danguige]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_danguige]" type="text" id="add[z_danguige]" value="<?=stripSlashes($r[z_danguige])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>保质期正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--expried_time--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_expried_time]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_expried_time]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_expried_time]" type="text" id="add[z_expried_time]" value="<?=stripSlashes($r[z_expried_time])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>类别正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--leibie--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_leibie]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_leibie]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_leibie]" type="text" id="add[z_leibie]" value="<?=stripSlashes($r[z_leibie])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>储存方法正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--save_way--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_save_way]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_save_way]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_save_way]" type="text" id="add[z_save_way]" value="<?=stripSlashes($r[z_save_way])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>价格上调正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--PriceIncrease--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_PriceIncrease]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_PriceIncrease]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_PriceIncrease]" type="text" id="add[z_PriceIncrease]" value="<?=stripSlashes($r[z_PriceIncrease])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>库存正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--pmaxnum--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_pmaxnum]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_pmaxnum]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_pmaxnum]" type="text" id="add[z_pmaxnum]" value="<?=stripSlashes($r[z_pmaxnum])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>配送方式正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--express--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_express]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_express]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_express]" type="text" id="add[z_express]" value="<?=stripSlashes($r[z_express])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>体积正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--tiji--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_tiji]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_tiji]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_tiji]" type="text" id="add[z_tiji]" value="<?=stripSlashes($r[z_tiji])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>服务正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--fuwu--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_fuwu]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_fuwu]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_fuwu]" type="text" id="add[z_fuwu]" value="<?=stripSlashes($r[z_fuwu])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>产品图正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--productpic--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_productpic]" type="text" id="add[qz_productpic]" value="<?=stripSlashes($r[qz_productpic])?>"> 
        <input name="add[save_productpic]" type="checkbox" id="add[save_productpic]" value=" checked"<?=$r[save_productpic]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_productpic]" cols="60" rows="10" id="add[zz_productpic]"><?=ehtmlspecialchars(stripSlashes($r[zz_productpic]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_productpic]" type="text" id="productpic5" value="<?=stripSlashes($r[z_productpic])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>产品图2正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--imgtwo--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_imgtwo]" type="text" id="add[qz_imgtwo]" value="<?=stripSlashes($r[qz_imgtwo])?>"> 
        <input name="add[save_imgtwo]" type="checkbox" id="add[save_imgtwo]" value=" checked"<?=$r[save_imgtwo]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_imgtwo]" cols="60" rows="10" id="add[zz_imgtwo]"><?=ehtmlspecialchars(stripSlashes($r[zz_imgtwo]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_imgtwo]" type="text" id="imgtwo5" value="<?=stripSlashes($r[z_imgtwo])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>产品图3正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--imgthree--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_imgthree]" type="text" id="add[qz_imgthree]" value="<?=stripSlashes($r[qz_imgthree])?>"> 
        <input name="add[save_imgthree]" type="checkbox" id="add[save_imgthree]" value=" checked"<?=$r[save_imgthree]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_imgthree]" cols="60" rows="10" id="add[zz_imgthree]"><?=ehtmlspecialchars(stripSlashes($r[zz_imgthree]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_imgthree]" type="text" id="imgthree5" value="<?=stripSlashes($r[z_imgthree])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>产品图4正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--imgfore--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_imgfore]" type="text" id="add[qz_imgfore]" value="<?=stripSlashes($r[qz_imgfore])?>"> 
        <input name="add[save_imgfore]" type="checkbox" id="add[save_imgfore]" value=" checked"<?=$r[save_imgfore]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_imgfore]" cols="60" rows="10" id="add[zz_imgfore]"><?=ehtmlspecialchars(stripSlashes($r[zz_imgfore]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_imgfore]" type="text" id="imgfore5" value="<?=stripSlashes($r[z_imgfore])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品介绍正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--newstext--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_newstext]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_newstext]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_newstext]" type="text" id="add[z_newstext]" value="<?=stripSlashes($r[z_newstext])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>
