<h3>ประวัติคลังปัญญาผู้สูงอายุ (คปญ.1)</h3>
<div id="search">
<div id="searchBox">
<form method="get" class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control" placeholder="ชื่อ - สกุล" name="search" value="<?=@$_GET['search']?>">
  </div>
  <?=form_dropdown('regis_province_id',get_option('id','name','province '.select_province_condition().' order by name asc'),@$_GET['regis_province_id'],'class="form-control" style="width:200px;"','-- จังหวัดที่ขึ้นทะเบียน --');?>
  <div style="margin:5px 0;">
  <span class="spanProvince">
      	<?=form_dropdown('now_province_id',get_option('id','name','province order by name asc'),@$_GET['now_province_id'],'class="form-control" style="width:180px;"','-- เลือกจังหวัด --');?>
      </span>
      <span class="spanAmphur">
			<select name="now_amphur_id" class="form-control" style="width:180px;" disabled="disabled">
				<option>-- เลือกอำเภอ --</option>
			</select>
      </span>
      <span class="spanDistrict">
      		<select name="now_district_id" class="form-control" style="width:180px;" disabled="disabled">
	        	<option>-- เลือกตำบล --</option>
	        </select>
      </span>
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
  </div>
  <div>
  <span><input type="checkbox" name="wis_study" id="checkbox" value="1" <?=@$_GET['wis_study'] == 1 ? 'checked="checked"' : '' ;?>/> การศึกษา</span> 
  <span><input type="checkbox" name="wis_medical" id="checkbox2"  value="1" <?=@$_GET['wis_medical'] == 1 ? 'checked="checked"' : '' ;?>/> การแพทย์และสาธารณสุข</span> 
  <span><input type="checkbox" name="wis_agriculture" id="checkbox3"  value="1" <?=@$_GET['wis_agriculture'] == 1 ? 'checked="checked"' : '' ;?>/> การเกษตร</span> 
  <span><input type="checkbox" name="wis_natural" id="checkbox4"  value="1" <?=@$_GET['wis_natural'] == 1 ? 'checked="checked"' : '' ;?> /> ทรัพยากรธรรมชาติฯ</span> 
  <span><input type="checkbox" name="wis_science" id="checkbox"  value="1" <?=@$_GET['wis_science'] == 1 ? 'checked="checked"' : '' ;?>/> วิทยาศาสตร์และเทคฯ</span> 
  <span><input type="checkbox" name="wis_engineer" id="checkbox"  value="1" <?=@$_GET['wis_engineer'] == 1 ? 'checked="checked"' : '' ;?> /> วิศวกรรม</span> 
  <span><input type="checkbox" name="wis_architecture" id="checkbox"  value="1" <?=@$_GET['wis_architecture'] == 1 ? 'checked="checked"' : '' ;?>/> สถาปัตยกรรม</span>
  <span><input type="checkbox" name="wis_social" id="checkbox5"  value="1" <?=@$_GET['wis_social'] == 1 ? 'checked="checked"' : '' ;?>/> พัฒนาสังคมฯ</span> 
  <span><input type="checkbox" name="wis_law" id="checkbox6"  value="1" <?=@$_GET['wis_law'] == 1 ? 'checked="checked"' : '' ;?>/> กฎหมาย</span> 
  <span><input type="checkbox" name="wis_politics" id="checkbox7"  value="1" <?=@$_GET['wis_politics'] == 1 ? 'checked="checked"' : '' ;?>/> การเมืองการปกครอง</span> 
  <span><input type="checkbox" name="wis_art" id="checkbox7"  value="1" <?=@$_GET['wis_art'] == 1 ? 'checked="checked"' : '' ;?>/> ศิลปะ วัฒนธรรมฯ</span> 
  <span><input type="checkbox" name="wis_religion" id="checkbox7"  value="1" <?=@$_GET['wis_religion'] == 1 ? 'checked="checked"' : '' ;?>/> ศาสนา จริยธรรม </span>
  <span><input type="checkbox" name="wis_commercial" id="checkbox8"  value="1" <?=@$_GET['wis_commercial'] == 1 ? 'checked="checked"' : '' ;?>/> พาณิชย์และบริการ</span> 
  <span><input type="checkbox" name="wis_security" id="checkbox9"  value="1" <?=@$_GET['wis_security'] == 1 ? 'checked="checked"' : '' ;?>/> ความมั่นคง</span> 
  <span><input type="checkbox" name="wis_management" id="checkbox9"  value="1" <?=@$_GET['wis_management'] == 1 ? 'checked="checked"' : '' ;?>/> บริหารจัดการฯ</span> 
  <span><input type="checkbox" name="wis_publicity" id="checkbox9"  value="1" <?=@$_GET['wis_publicity'] == 1 ? 'checked="checked"' : '' ;?>/> การประชาสัมพันธ์</span>
  <span><input type="checkbox" name="wis_transport" id="checkbox10"  value="1" <?=@$_GET['wis_transport'] == 1 ? 'checked="checked"' : '' ;?>/> คมนาคมและการสื่อสาร</span> 
  <span><input type="checkbox" name="wis_energy" id="checkbox10"  value="1" <?=@$_GET['wis_energy'] == 1 ? 'checked="checked"' : '' ;?>/> พลังงาน</span>
  <span><input type="checkbox" name="wis_foreign" id="checkbox11"  value="1" <?=@$_GET['wis_foreign'] == 1 ? 'checked="checked"' : '' ;?>/> ต่างประเทศ</span> 
  <span><input type="checkbox" name="wis_materials" id="checkbox12"  value="1" <?=@$_GET['wis_materials'] == 1 ? 'checked="checked"' : '' ;?>/> อุตสาหกรรม หัตถกรรมฯ</span> 
  <span><input type="checkbox" name="wis_language" id="checkbox12"  value="1" <?=@$_GET['wis_language'] == 1 ? 'checked="checked"' : '' ;?>/> ภาษา วรรณคดีฯ</span> 
  <span><input type="checkbox" name="wis_rhetoric" id="checkbox12"  value="1" <?=@$_GET['wis_rhetoric'] == 1 ? 'checked="checked"' : '' ;?>/> วาทศิลป์</span>
  <input type="checkbox" name="wis_other" id="checkbox13"  value="1" <?=@$_GET['wis_other'] == 1 ? 'checked="checked"' : '' ;?>/> อื่น  ๆ </div>
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


<script>
// ที่อยู่ปัจจุบัน  * -----------------------------------------------------------------
// select จังหวัด หา อำเภอ
$(document).on('change', "select[name=now_province_id]", function() {
	var province_id = $(this).val();
	var ele = $(this).closest('.spanProvince').next(".spanAmphur");
	if(province_id == ""){
			$(".spanAmphur").find('select').val('').attr("disabled", true);
	}else{
		$.get('home/ajax/get_select_now_amphur',{
			'province_id' : province_id
		},function(data){
			ele.html(data);
		});
	}
});

// select อำเภอ หาตำบล
$(document).on('change', "select[name=now_amphur_id]", function() {
	var amphur_id = $(this).val();
	var ele = $(this).closest(".spanAmphur").next(".spanDistrict");
	if(amphur_id == ""){
			$(".spanDistrict").find('select').val('').attr("disabled", true);
	}else{
		$.get('home/ajax/get_select_now_district',{
			'amphur_id' : amphur_id
		},function(data){
			ele.html(data);
		});
	}
});

<?php if(@$rs->id != ""):?>
var now_province_id = '<?=@$_GET['now_province_id']?>';
var now_amphur_id = '<?=@$_GET['now_amphur_id']?>';
var now_district_id = '<?=@$_GET['now_district_id']?>';

$.get('home/ajax/get_select_now_amphur',{
	'province_id' : now_province_id,
	'amphur_id' : now_amphur_id
},function(data){
	$('select[name=now_amphur_id]').closest('.spanAmphur').html(data);
});

$.get('home/ajax/get_select_now_district',{
	'amphur_id' : now_amphur_id,
	'district_id' : now_district_id
},function(data){
	$('select[name=now_district_id]').closest('.spanDistrict').html(data);
});
<?php endif;?>
// ที่อยู่ปัจจุบัน  * -----------------------------------------------------------------
</script>