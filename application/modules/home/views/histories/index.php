<h3>ประวัติคลังปัญญาผู้สูงอายุ (คปญ.1)</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อ - สกุล">
  </div>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกจังหวัดที่ขึ้นทะเบียน --</option>
  </select>
  <div style="margin:5px 0;">
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกจังหวัด --</option>
  </select>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกอำเภอ --</option>
  </select>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกตำบล --</option>
  </select>
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
  </div>
  <div>
  <span><input name="checkbox" type="checkbox" id="checkbox" checked="checked" /> การศึกษา</span> 
  <span><input type="checkbox" name="checkbox2" id="checkbox2" checked="checked" /> การแพทย์และสาธารณสุข</span> 
  <span><input type="checkbox" name="checkbox3" id="checkbox3" checked="checked" /> การเกษตร</span> 
  <span><input type="checkbox" name="checkbox4" id="checkbox4" checked="checked" /> ทรัพยากรธรรมชาติฯ</span> 
  <span><input type="checkbox" name="checkbox" id="checkbox" checked="checked" /> วิทยาศาสตร์และเทคฯ</span> 
  <span><input type="checkbox" name="checkbox" id="checkbox" checked="checked" /> วิศวกรรม</span> 
  <span><input type="checkbox" name="checkbox" id="checkbox" checked="checked" /> สถาปัตยกรรม</span>
  <span><input type="checkbox" name="checkbox5" id="checkbox5" checked="checked" /> พัฒนาสังคมฯ</span> 
  <span><input type="checkbox" name="checkbox5" id="checkbox6" checked="checked" /> กฎหมาย</span> 
  <span><input type="checkbox" name="checkbox5" id="checkbox7" checked="checked" /> การเมืองการปกครอง</span> 
  <span><input type="checkbox" name="checkbox5" id="checkbox7" checked="checked" /> ศิลปะ วัฒนธรรมฯ</span> 
  <span><input type="checkbox" name="checkbox5" id="checkbox7" checked="checked" /> ศาสนา จริยธรรม </span>
  <span><input type="checkbox" name="checkbox6" id="checkbox8" checked="checked" /> พาณิชย์และบริการ</span> 
  <span><input type="checkbox" name="checkbox6" id="checkbox9" checked="checked" /> ความมั่นคง</span> 
  <span><input type="checkbox" name="checkbox6" id="checkbox9" checked="checked" /> บริหารจัดการฯ</span> 
  <span><input type="checkbox" name="checkbox6" id="checkbox9" checked="checked" /> การประชาสัมพันธ์</span>
  <span><input type="checkbox" name="checkbox7" id="checkbox10" checked="checked" /> คมนาคมและการสื่อสาร</span> 
  <span><input type="checkbox" name="checkbox7" id="checkbox10" checked="checked" /> พลังงาน</span>
  <span><input type="checkbox" name="checkbox7" id="checkbox11" checked="checked" /> ต่างประเทศ</span> 
  <span><input type="checkbox" name="checkbox7" id="checkbox12" checked="checked" /> อุตสาหกรรม หัตถกรรมฯ</span> 
  <span><input type="checkbox" name="checkbox7" id="checkbox12" checked="checked" /> ภาษา วรรณคดีฯ</span> 
  <span><input type="checkbox" name="checkbox7" id="checkbox12" checked="checked" /> วาทศิลป์</span>
  <input type="checkbox" name="checkbox8" id="checkbox13" checked="checked" /> อื่น  ๆ </div>
  
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มโครงการ" value="เพิ่มรายการ" onclick="document.location='home/histories/form'" class="btn btn-warning vtip" />
</div>

<?=$rs->pagination();?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ว/ด/ป ที่ขึ้นทะเบียน</th>
  <th>จังหวัด</th>
  <th style="width:20%">ชื่อ-สกุล</th>
  <th>อายุ</th>
  <th>ความเชี่ยวชาญ</th>
  <th style="width:35%">ข้อมูลติดต่อ</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
	<tr class="<?=alternator('','odd');?>">
  <td><?=($key+1)+$rs->paged->current_row?></td>
  <td><?=mysql_to_th($row->regis_date)?></td>
  <td><?=get_province_name($row->regis_province_id)?></td>
  <td><?=$row->title?><?=$row->name?></td>
  <td><?=calculate_age($row->birth_day,$row->birth_month,$row->birth_year)?></td>
  <td><img src="themes/elderly2016/images/star.png" width="32" height="32" class="vtip" title="<?=wisdom_list($row)?>" /></td>
  <td>
  	<?=$row->now_home_no?>
  	<?=$row->now_moo != "" ? " หมู่ที่ ".$row->now_moo : "" ;?>
  	<?=$row->now_soi != "" ? " ซอย".$row->now_soi : "" ;?>
  	<?=$row->now_district_id != "" ? " ตำบล".get_district_name($row->now_district_id) : "" ;?>
  	<?=$row->now_amphur_id != "" ? " อำเภอ".get_amphur_name($row->now_amphur_id) : "" ;?>
  	<?=$row->now_province_id != "" ? get_province_name($row->now_province_id) : "" ;?>
  	<?=$row->now_post_code != "" ? $row->now_post_code : "" ;?>
  </td>
  <td>
  	<a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="themes/elderly2016/images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a>
  	<a href="home/histories/form/<?=$row->id?>"><img src="themes/elderly2016/images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a>
  	<a href="home/histories/delete/<?=$row->id?>"><img src="themes/elderly2016/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้" onclick="return confirm('<?php echo "ยืนยันการลบ?";?>')"  /></a>
  </td>
  </tr>
	<?endforeach;?>
</table>

<?=$rs->pagination();?>

<?
function wisdom_list($row){
	$txt = '';
	if($row->wis_study != ""){ $txt .= "- การศึกษา<br>";}
	if($row->wis_medical != ""){ $txt .= "- การแพทย์และสาธารณสุข<br>";}
	if($row->wis_agriculture != ""){ $txt .= "- การเกษตร<br>";}
	if($row->wis_natural != ""){ $txt .= "- ทรัพยากรธรรมชาติและสิ่งแวดล้อม<br>";}
	if($row->wis_science != ""){ $txt .= "- วิทยาศาสตร์และเทคโนโลยี<br>";}
	if($row->wis_engineer != ""){ $txt .= "- วิศวกรรม<br>";}
	if($row->wis_architecture != ""){ $txt .= "- สถาปัตยกรรม<br>";}
	if($row->wis_social != ""){ $txt .= "- พัฒนาสังคม สังคมสงเคราะห์  จัดสวัสดิการชุมชนฯ<br>";}
	if($row->wis_law != ""){ $txt .= "- กฎหมาย<br>";}
	if($row->wis_politics != ""){ $txt .= "- การเมืองการปกครอง<br>";}
	if($row->wis_art != ""){ $txt .= "- ศิลปะ วัฒนธรรม ประเพณี<br>";}
	if($row->wis_religion != ""){ $txt .= "- ศาสนา จริยธรรม<br>";}
	if($row->wis_commercial != ""){ $txt .= "- พาณิชย์และบริการ<br>";}
	if($row->wis_security != ""){ $txt .= "- ความมั่นคง<br>";}
	if($row->wis_management != ""){ $txt .= "- บริหารจัดการและบริหารธุรกิจ<br>";}
	if($row->wis_publicity != ""){ $txt .= "- การประชาสัมพันธ์<br>";}
	if($row->wis_transport != ""){ $txt .= "- คมนาคมและการสื่อสาร<br>";}
	if($row->wis_energy != ""){ $txt .= "- พลังงาน<br>";}
	if($row->wis_foreign != ""){ $txt .= "- ต่างประเทศ<br>";}
	if($row->wis_materials != ""){ $txt .= "- อุตสาหกรรม หัตถกรรม จักสารและโอท็อป<br>";}
	if($row->wis_language != ""){ $txt .= "- ภาษา วรรณคดี วรรณศิลป์<br>";}
	if($row->wis_rhetoric != ""){ $txt .= "- วาทศิลป์<br>";}
	if($row->wis_other != ""){ $txt .= "- อื่นๆ<br>";}
	return $txt;
}
?>