<div class="printpage">
<div style="text-align:right;">
<p>แบบ คปญ. ๑</p>
<p>วัน/เดือน/ปีขึ้นทะเบียน <span style="margin-right:0;"><?=DB2Date($rs->regis_date)?></span></p>
</div>

<div style="display:inline-block; margin-left:80px; margin-top:50px; text-align:center; font-size:24px; width:590px;">แบบประวัติคลังปัญญาผู้สูงอายุ  จังหวัด <span><?=get_province_name($rs->regis_province_id)?></span></div>

<?if($rs->picture != ""):?>
<div style="float:right; border:1px solid #ccc; padding:5px;">
	<?if(@$_GET['type'] == ""):?>
		<img src="uploads/histories/<?=$rs->picture?>" width="110" height="110" />
	<?else:?>
		<!-- <img src="../../../uploads/histories/<?=$rs->picture?>" width="110" height="110" /> -->
	<?endif;?>
</div>
<?endif;?>

<div class="clear"></div>

<ol>
<li>นาย (ชื่อ – สกุล) <span><?=get_prefix($rs->title)?> <?=$rs->name?></span></li>
<li>วัน/เดือน/ปีเกิด <span><?=$rs->birth_day?>/<?=$rs->birth_month?>/<?=$rs->birth_year?></span>  อายุ <span class="calAge"></span> ปี</li>
<li>เลขประจำตัวประชาชน <span><?=$rs->id_card?></span> วันที่ออกบัตร <span><?=DB2Date($rs->issue_date)?></span> วันที่บัตรหมดอายุ <span><?=DB2Date($rs->expire_date)?></span>สถานที่ออกบัตร<span><?=$rs->issue_place?></span></li>
<li>เชื้อชาติ <span><?=$rs->race?></span> สัญชาติ <span><?=$rs->nationality?></span> ศาสนา <span><?=$rs->religion?></span></li>
<li>โทรศัพท์<span><?=$rs->tel?></span> โทรสาร (ถ้ามี) <span><?=$rs->fax?></span> โทรศัพท์มือถือ <span><?=$rs->mobile?></span> e-mail <span><?=$rs->email?></span></li>
<li>ที่อยู่ตามทะเบียนบ้าน
<div>บ้านเลขที่ <span><?=$rs->reg_home_no?></span> หมู่ที่ <span><?=$rs->reg_moo?></span> ซอย <span><?=$rs->reg_soi?></span> ตำบล <span><?=@get_district_name($rs->reg_province_id,$rs->reg_amphur_id,$rs->reg_district_id)?></span> อำเภอ <span><?=@get_amphur_name($rs->reg_province_id,$rs->reg_amphur_id)?></span> จังหวัด <span><?=@get_province_name($rs->reg_province_id)?></span> รหัสไปรษณีย์ <span><?=$rs->reg_post_code?></span> </div>
</li>
<li>ที่อยู่ปัจจุบัน
<div>บ้านเลขที่ <span><?=$rs->now_home_no?></span> หมู่ที่ <span><?=$rs->now_moo?></span> ซอย <span><?=$rs->now_soi?></span> ตำบล <span><?=@get_district_name($rs->now_province_id,$rs->now_amphur_id,$rs->now_district_id)?></span> อำเภอ <span><?=@get_amphur_name($rs->now_province_id,$rs->now_amphur_id)?></span> จังหวัด <span><?=@get_province_name($rs->now_province_id)?></span> รหัสไปรษณีย์ <span><?=$rs->now_post_code?></span> </div>
</li>
<li>สถานภาพ <span><?=get_marital_status_name($rs->marital_status)?> <?=$rs->marital_status_other?></span></li>
<li>การศึกษา <span><?=get_education_name($rs->education)?> <?=$rs->education_other?></span></li>
<li>อาชีพปัจจุบัน <span><?=$rs->current_occupation?></span> รายละเอียด  (ถ้ามี) <span><?=$rs->current_occupation_detail?></span></li>
<li>อาชีพเดิม <span><?=$rs->old_occupation?></span> รายละเอียด  (ถ้ามี) <span><?=$rs->old_occupation_detail?></span></li>
<li>ท่านเป็นภูมิปัญญาในสาขา  (ตอบได้มากกว่า  ๑  ข้อ)

<?if($rs->wis_study != ""){ echo '<div><span style="margin-left:0;">- การศึกษา</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_study.'</span></div>';}?>
<?if($rs->wis_medical != ""){ echo '<div><span style="margin-left:0;">- การแพทย์และสาธารณสุข</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_medical.'</span></div>';}?>
<?if($rs->wis_agriculture != ""){ echo '<div><span style="margin-left:0;">- การเกษตร</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_agriculture.'</span></div>';}?>
<?if($rs->wis_natural != ""){ echo '<div><span style="margin-left:0;">- ทรัพยากรธรรมชาติและสิ่งแวดล้อม</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_natural.'</span></div>';}?>
<?if($rs->wis_science != ""){ echo '<div><span style="margin-left:0;">- วิทยาศาสตร์และเทคโนโลยี</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_science.'</span></div>';}?>
<?if($rs->wis_engineer != ""){ echo '<div><span style="margin-left:0;">- วิศวกรรม</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_engineer.'</span></div>';}?>
<?if($rs->wis_architecture != ""){ echo '<div><span style="margin-left:0;">- สถาปัตยกรรม</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_architecture.'</span></div>';}?>
<?if($rs->wis_social != ""){ echo '<div><span style="margin-left:0;">- พัฒนาสังคม สังคมสงเคราะห์  จัดสวัสดิการชุมชนฯ</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_social.'</span></div>';}?>
<?if($rs->wis_law != ""){ echo '<div><span style="margin-left:0;">- กฎหมาย</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_law.'</span></div>';}?>
<?if($rs->wis_politics != ""){ echo '<div><span style="margin-left:0;">- การเมืองการปกครอง</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_politics.'</span></div>';}?>
<?if($rs->wis_art != ""){ echo '<div><span style="margin-left:0;">- ศิลปะ วัฒนธรรม ประเพณี</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_art.'</span></div>';}?>
<?if($rs->wis_religion != ""){ echo '<div><span style="margin-left:0;">- ศาสนา จริยธรรม</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_religion.'</span></div>';}?>
<?if($rs->wis_commercial != ""){ echo '<div><span style="margin-left:0;">- พาณิชย์และบริการ</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_commercial.'</span></div>';}?>
<?if($rs->wis_security != ""){ echo '<div><span style="margin-left:0;">- ความมั่นคง</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_security.'</span></div>';}?>
<?if($rs->wis_management != ""){ echo '<div><span style="margin-left:0;">- บริหารจัดการและบริหารธุรกิจ</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_management.'</span></div>';}?>
<?if($rs->wis_publicity != ""){ echo '<div><span style="margin-left:0;">- การประชาสัมพันธ์</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_publicity.'</span></div>';}?>
<?if($rs->wis_transport != ""){ echo '<div><span style="margin-left:0;">- คมนาคมและการสื่อสาร</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_transport.'</span></div>';}?>
<?if($rs->wis_energy != ""){ echo '<div><span style="margin-left:0;">- พลังงาน</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_energy.'</span></div>';}?>
<?if($rs->wis_foreign != ""){ echo '<div><span style="margin-left:0;">- ต่างประเทศ</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_foreign.'</span></div>';}?>
<?if($rs->wis_materials != ""){ echo '<div><span style="margin-left:0;">- อุตสาหกรรม หัตถกรรม จักสารและโอท็อป</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_materials.'</span></div>';}?>
<?if($rs->wis_language != ""){ echo '<div><span style="margin-left:0;">- ภาษา วรรณคดี วรรณศิลป์</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_language.'</span></div>';}?>
<?if($rs->wis_rhetoric != ""){ echo '<div><span style="margin-left:0;">- วาทศิลป์</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_rhetoric.'</span></div>';}?>
<?if($rs->wis_other != ""){ echo '<div><span style="margin-left:0;">- อื่นๆ</span> เชี่ยวชาญเรื่อง <span>'.$rs->wis_other.'</span></div>';}?>

</li>
</ol>

<?if(@$_GET['type'] == ""):?>
<div align="right"><a href="home/histories/view/<?=$rs->id?>?type=word">word</a> | <a href="home/histories/view/<?=$rs->id?>?type=excel">excel</a></div>
<?endif;?>

</div><!--printpage-->

<script>
$(document).ready(function(){
	<?php if(@$rs->id != ""):?>
	var birth_year = '<?=$rs->birth_year?>';
	$.get('home/ajax/calAge',{
		'birth_year' : birth_year
	},function(data){
		$('.calAge').html(data);
	});
	<?php endif;?>
});
</script>
