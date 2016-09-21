<h3>ประวัติคลังปัญญาผู้สูงอายุ (คปญ.1) [เพิ่ม/แก้ไข]</h3>

<form method="post" enctype="multipart/form-data" action="home/histories/save/<?=$rs->id?>">
	
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">ข้อมูลทั่วไป</a></li>
    <li role="presentation"><a href="#know" aria-controls="know" role="tab" data-toggle="tab">ภูมิปัญญาในสาขา</a></li>
  </ul>  
  
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="data">
<table class="tbadd">
<tr>
  <th>วัน/เดือน/ปีขึ้นทะเบียน <span class="Txt_red_12">*</span> // จังหวัด <span class="Txt_red_12">*</span></th>
  <td>
  <span class="form-inline">
    <div class="input-group date">
	  <input type="text" class="form-control datepickerTH" name="regis_date" data-date-language="th-th" value="<?=DB2Date($rs->regis_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div> // 
	  <?=form_dropdown('regis_province_id',get_option('code','name','province '.select_province_condition().' order by name asc'),@$rs->regis_province_id,'class="form-control" style="width:auto;"','+ เลือกจังหวัด +');?>
    </span>
  </td>
</tr>
<tr>
  <th>ชื่อ - สกุล <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
      <?//=form_dropdown('title',array('นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว'),@$rs->title,'class="form-control" style="width:auto;"','+ เลือกคำนำหน้า +');?>
      <?=form_dropdown('title',get_option('prefix_code','prefix_name_full','prefix order by seq_no asc'),@$rs->title,'class="form-control" style="width:auto;"','+ เลือกคำนำหน้า +');?>
    <input type="text" name="name" class="form-control " id="exampleInputName11" placeholder="ชื่อ - สกุล" style="width:500px;" value="<?=$rs->name?>"/>
    </span></td>
</tr>
<tr>
  <th>รูปภาพ</th>
  <td>
  	<?if($rs->picture != ""):?>
  		<a href="uploads/histories/<?=$rs->picture?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->picture?></a>
  	<?endif;?>
  	<input type="file" name="picture" id="fileField" />
  </td>
</tr>
<tr>
  <th>วัน/เดือน/ปีเกิด <span class="Txt_red_12">*</span> (อายุ) </th>
  <td><span class="form-inline">
    <select name="birth_day" class="form-control" style="width:auto;">
      <option value="">+ วัน +</option>
      <?php 
		for ($x = 1; $x <= 31; $x++) {
			$selected_day = ($x == $rs->birth_day)?"selected=selected":"";
		    echo "<option value='$x' $selected_day>".sprintf("%02d", $x)."</option>";
		} 
	  ?>
    </select>
    /
    <?$month_th = array( 1 =>'มกราคม',2 => 'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',7=>'กรกฏาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม');?>
    <?=form_dropdown('birth_month',$month_th,@$rs->birth_month,'class="form-control" style="width:auto;"','+ เดือน +');?>
    /
    <select name="birth_year" class="form-control" style="width:auto;">
      <option value="">+ ปี +</option>
      <?php 
		for ($x = 2450; $x <= (date("Y")+543); $x++) {
			$selected_year = ($x == $rs->birth_year)?"selected=selected":"";
		    echo "<option value='$x' $selected_year>$x</option>";
		} 
	  ?>
    </select>
  </span>(<span class="calAge"></span> ปี)</td>
</tr>
<tr>
  <th>สถานภาพ <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline"><span>
    <input name="status" type="radio" id="radio" value="1" <?=$rs->status == '1'?'checked=checked':'';?> />
มีชีวิต </span> <span>
<input name="status" type="radio" id="radio2" value="2" <?=$rs->status == '2'?'checked=checked':'';?> />
เสียชีวิต </span></span></td>
</tr>
<tr>
  <th>เลขประจำตัวประชาชน <span class="Txt_red_12">*</span> / วันที่ออกบัตร / วันที่บัตรหมดอายุ / สถานที่ออกบัตร</th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName13" placeholder="เลขประจำตัวประชาชน" style="width:160px;" maxlength="13" name="id_card" value="<?=$rs->id_card?>" />
  / 
  <div class="input-group date">
	  <input type="text" class="form-control datepickerTH" placeholder="วันออกบัตร" name="issue_date" data-date-language="th-th" value="<?=DB2Date($rs->issue_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div> / 
  <div class="input-group date">
	  <input type="text" class="form-control datepickerTH" placeholder="วันบัตรหมดอายุ" name="expire_date" data-date-language="th-th" value="<?=DB2Date($rs->expire_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div> /
  <input type="text" class="form-control " id="exampleInputName16" placeholder="สถานที่ออกบัตร" name="issue_place" value="<?=$rs->issue_place?>" style="width:300px;" />
  </span></td>
</tr>
<tr>
  <th>เชื้อชาติ / สัญชาติ / ศาสนา</th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName17" placeholder="เชื้อชาติ" name="race" value="<?=$rs->race?>" style="width:180px;" /> / 
    <input type="text" class="form-control " id="exampleInputName17" placeholder="สัญชาติ" name="nationality" value="<?=$rs->nationality?>" style="width:180px;" /> /
    <input type="text" class="form-control " id="exampleInputName17" placeholder="ศาสนา" name="religion" value="<?=$rs->religion?>" style="width:180px;" />
    </span></td>
</tr>
<tr>
  <th>โทรศัพท์ / โทรสาร (ถ้ามี) </th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName18" placeholder="โทรศัพท์" name="tel" value="<?=$rs->tel?>" style="width:250px;" />
    /
    <input type="text" class="form-control " id="exampleInputName18" placeholder="โทรสาร" name="fax" value="<?=$rs->fax?>" style="width:250px;" />
  </span></td>
</tr>
<tr>
  <th>โทรศัพท์มือถือ / e-mail</th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName19" placeholder="โทรศัพท์มือถือ" name="mobile" value="<?=$rs->mobile?>" style="width:250px;" />
/
<input type="text" class="form-control " id="exampleInputName20" placeholder="e-mail" style="width:300px;" name="email" value="<?=$rs->email?>" />
  </span></td>
</tr>
<tr>
  <th>ที่อยู่ตามทะเบียนบ้าน <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName21" placeholder="บ้านเลขที่" style="width:100px;" name="reg_home_no" value="<?=$rs->reg_home_no?>" />
    <input type="text" class="form-control " id="exampleInputName21" placeholder="หมู่ที่" style="width:70px;" name="reg_moo" value="<?=$rs->reg_moo?>" />
    <input type="text" class="form-control " id="exampleInputName21" placeholder="ซอย" style="width:200px;" name="reg_soi" value="<?=$rs->reg_soi?>" />
    <div style="margin-top:10px;">
	  <span class="spanProvince">
      	<?=form_dropdown('reg_province_id',get_option('code','name','province order by name asc'),@$rs->reg_province_id,'class="form-control" style="width:auto;"','+ เลือกจังหวัด +');?>
      </span>
      <span class="spanAmphur">
			<select name="reg_amphur_id" class="form-control" style="width:auto;" disabled="disabled">
				<option>+ เลือกอำเภอ +</option>
			</select>
      </span>
      <span class="spanDistrict">
      		<select name="reg_district_id" class="form-control" style="width:auto;" disabled="disabled">
	        	<option>+ เลือกตำบล +</option>
	        </select>
      </span>
      <input type="text" class="form-control " id="exampleInputName22" placeholder="รหัสไปรณีย์" style="width:120px;" maxlength="5" name="reg_post_code" value="<?=$rs->reg_post_code?>" /></div>
    </span></td>
</tr>
<tr>
  <th>ที่อยู่ปัจจุบัน <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName23" placeholder="บ้านเลขที่" style="width:100px;" name="now_home_no" value="<?=$rs->now_home_no?>" />
    <input type="text" class="form-control " id="exampleInputName23" placeholder="หมู่ที่" style="width:70px;" name="now_moo" value="<?=$rs->now_moo?>" />
    <input type="text" class="form-control " id="exampleInputName23" placeholder="ซอย" style="width:200px;" name="now_soi" value="<?=$rs->now_soi?>" />
    <div style="margin-top:10px;">
      <span class="spanProvince">
      	<?=form_dropdown('now_province_id',get_option('code','name','province order by name asc'),@$rs->now_province_id,'class="form-control" style="width:auto;"','+ เลือกจังหวัด +');?>
      </span>
      <span class="spanAmphur">
			<select name="now_amphur_id" class="form-control" style="width:auto;" disabled="disabled">
				<option>+ เลือกอำเภอ +</option>
			</select>
      </span>
      <span class="spanDistrict">
      		<select name="now_district_id" class="form-control" style="width:auto;" disabled="disabled">
	        	<option>+ เลือกตำบล +</option>
	        </select>
      </span>
      <input type="text" class="form-control " id="exampleInputName24" placeholder="รหัสไปรณีย์" style="width:120px;" maxlength="5" name="now_post_code" value="<?=$rs->now_post_code?>" />
    </div>
  </span></td>
</tr>
<tr>
  <th>สถานภาพ</th>
  <td>
  	<span class="form-inline">
  		<span><input type="radio" name="marital_status" value="1" <?=$rs->marital_status == '1'?'checked="checked"':'';?>/> โสด</span>
	    <span><input type="radio" name="marital_status" value="2" <?=$rs->marital_status == '2'?'checked="checked"':'';?> /> สมรสอยู่ด้วยกัน</span>
	    <span><input type="radio" name="marital_status" value="4" <?=$rs->marital_status == '4'?'checked="checked"':'';?> /> สมรสแยกกันอยู่</span>
	    <span><input type="radio" name="marital_status" value="3" <?=$rs->marital_status == '3'?'checked="checked"':'';?> /> หม้าย / แยกกันอยู่</span>
	    <span><input type="radio" name="marital_status" value="5" <?=$rs->marital_status == '5'?'checked="checked"':'';?> /> หม้ายคู่สมรสเสียชีวิต</span>
	    <span><input type="radio" name="marital_status" value="6" <?=$rs->marital_status == '6'?'checked="checked"':'';?> /> อยู่ด้วยกันโดยไม่สมรส</span>
	    <span><input type="radio" name="marital_status" value="99999" <?=$rs->marital_status == '99999'?'checked="checked"':'';?> /> อื่นๆ</span><br>
	    <input type="text" class="form-control " id="exampleInputName25" placeholder="ระบุ" style="width:300px;" name="marital_status_other" value="<?=$rs->marital_status_other?>" <?=$rs->marital_status != 'อื่นๆ'?'disabled="disabled"':'';?>/>
  	</span>
  </td>
</tr>
<tr>
  <th>การศึกษา</th>
  <td>
    <span>
	<input type="radio" name="education" value="91" <?=$rs->education == '91'?'checked="checked"':'';?> /> ไม่ได้เรียนหนังสือ</span> <span>
	<input type="radio" name="education" value="93" <?=$rs->education == '93'?'checked="checked"':'';?> /> ประถมศึกษาตอนต้น</span> <span>
		<input type="radio" name="education" value="94" <?=$rs->education == '94'?'checked="checked"':'';?> /> ประถมศึกษาตอนปลาย</span> <span>
	<input type="radio" name="education" value="95" <?=$rs->education == '95'?'checked="checked"':'';?> /> มัธยมศึกษาตอนต้น</span> <span>
	<input type="radio" name="education" value="96" <?=$rs->education == '96'?'checked="checked"':'';?> /> มัธยมศึกษาตอนปลาย</span><span>
	<input type="radio" name="education" value="10" <?=$rs->education == '10'?'checked="checked"':'';?> /> อาชีวศึกษาและประกาศนียบัตรชั้นสูง (ปวช./ปวท./ปกศ.ต้น)</span> <span>
	<input type="radio" name="education" value="40" <?=$rs->education == '40'?'checked="checked"':'';?>/> ปริญญาตรี</span> <span>
	<input type="radio" name="education" value="99999" <?=$rs->education == '99999'?'checked="checked"':'';?> /> อื่นๆ
	<input type="text" class="form-control" id="exampleInputName26" placeholder="ระบุ" style="width:300px;" name="education_other" value="<?=$rs->education_other?>" <?=$rs->education != 'อื่นๆ'?'disabled="disabled"':'';?> />
	</span>
  </td>
</tr>
<tr>
  <th>อาชีพปัจจุบัน</th>
  <td><span class="form-inline">
    <input type="text" class="form-control " placeholder="อาชีพปัจจุบัน" style="width:300px;" name="current_occupation" value="<?=$rs->current_occupation?>" /><br />
    <textarea rows="3" class="form-control" style="width:600px; margin-top:10px;" placeholder="รายละเอียด" name="current_occupation_detail"><?=$rs->current_occupation_detail?></textarea>
  </span></td>
</tr>
<tr>
  <th>อาชีพเดิม</th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName4" placeholder="อาชีพเดิม" style="width:300px;" name="old_occupation" value="<?=$rs->old_occupation?>" />
    <br />
    <textarea rows="3" class="form-control " id="exampleInputName4" style="width:600px; margin-top:10px;" placeholder="รายละเอียด" name="old_occupation_detail"><?=$rs->old_occupation_detail?></textarea>
  </span></td>
</tr>
</table>
</div>

<div role="tabpanel" class="tab-pane" id="know">
<table class="tbadd">
<tr>
<th>1. การศึกษา</th>
<td><span class="form-inline">
  <textarea name="wis_study" rows="3" class="form-control " id="exampleInputName2" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_study?></textarea>
</span></td>
</tr>
<tr>
<th>2. การแพทย์และสาธารณสุข</th>
<td><span class="form-inline">
  <textarea name="wis_medical" rows="3" class="form-control " id="exampleInputName5" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_medical?></textarea>
</span></td>
</tr>
<tr>
  <th>3. การเกษตร</th>
  <td><span class="form-inline">
    <textarea name="wis_agriculture" rows="3" class="form-control " id="exampleInputName6" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_agriculture?></textarea>
  </span></td>
</tr>
<tr>
  <th>4. ทรัพยากรธรรมชาติและสิ่งแวดล้อม</th>
  <td><span class="form-inline">
    <textarea name="wis_natural" rows="3" class="form-control " id="exampleInputName7" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_natural?></textarea>
  </span></td>
</tr>
<tr>
  <th>5.  วิทยาศาสตร์และเทคโนโลยี</th>
  <td><span class="form-inline">
    <textarea name="wis_science" rows="3" class="form-control " id="exampleInputName8" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_science?></textarea>
  </span></td>
</tr>
<tr>
  <th>6. วิศวกรรม</th>
  <td><span class="form-inline">
    <textarea name="wis_engineer" rows="3" class="form-control " id="exampleInputName9" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_engineer?></textarea>
  </span></td>
</tr>
<tr>
  <th>7. สถาปัตยกรรม </th>
  <td><span class="form-inline">
    <textarea name="wis_architecture" rows="3" class="form-control " id="exampleInputName10" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_architecture?></textarea>
  </span></td>
</tr>
<tr>
  <th>8.  พัฒนาสังคม สังคมสงเคราะห์  จัดสวัสดิการชุมชนฯ</th>
  <td><span class="form-inline">
    <textarea name="wis_social" rows="3" class="form-control " id="exampleInputName27" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_social?></textarea>
  </span></td>
</tr>
<tr>
  <th>9. กฎหมาย</th>
  <td><span class="form-inline">
    <textarea name="wis_law" rows="3" class="form-control " id="exampleInputName28" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_law?></textarea>
  </span></td>
</tr>
<tr>
  <th>10. การเมืองการปกครอง</th>
  <td><span class="form-inline">
    <textarea name="wis_politics" rows="3" class="form-control " id="exampleInputName29" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_politics?></textarea>
  </span></td>
</tr>
<tr>
  <th>11. ศิลปะ วัฒนธรรม  ประเพณี</th>
  <td><span class="form-inline">
    <textarea name="wis_art" rows="3" class="form-control " id="exampleInputName30" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_art?></textarea>
  </span></td>
</tr>
<tr>
  <th>12. ศาสนา จริยธรรม</th>
  <td><span class="form-inline">
    <textarea name="wis_religion" rows="3" class="form-control " id="exampleInputName31" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_religion?></textarea>
  </span></td>
</tr>
<tr>
  <th>13. พาณิชย์และบริการ</th>
  <td><span class="form-inline">
    <textarea name="wis_commercial" rows="3" class="form-control " id="exampleInputName32" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_commercial?></textarea>
  </span></td>
</tr>
<tr>
  <th>14. ความมั่นคง</th>
  <td><span class="form-inline">
    <textarea name="wis_security" rows="3" class="form-control " id="exampleInputName33" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_security?></textarea>
  </span></td>
</tr>
<tr>
  <th>15.  บริหารจัดการและบริหารธุรกิจ </th>
  <td><span class="form-inline">
    <textarea name="wis_management" rows="3" class="form-control " id="exampleInputName34" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_management?></textarea>
  </span></td>
</tr>
<tr>
  <th>16. การประชาสัมพันธ์</th>
  <td><span class="form-inline">
    <textarea name="wis_publicity" rows="3" class="form-control " id="exampleInputName35" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_publicity?></textarea>
  </span></td>
</tr>
<tr>
  <th>17. คมนาคมและการสื่อสาร</th>
  <td><span class="form-inline">
    <textarea name="wis_transport" rows="3" class="form-control " id="exampleInputName36" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_transport?></textarea>
  </span></td>
</tr>
<tr>
  <th>18. พลังงาน</th>
  <td><span class="form-inline">
    <textarea name="wis_energy" rows="3" class="form-control " id="exampleInputName37" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_energy?></textarea>
  </span></td>
</tr>
<tr>
  <th>19. ต่างประเทศ</th>
  <td><span class="form-inline">
    <textarea name="wis_foreign" rows="3" class="form-control " id="exampleInputName38" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_foreign?></textarea>
  </span></td>
</tr>
<tr>
  <th>20. อุตสาหกรรม  หัตถกรรม   จักสารและโอท็อป</th>
  <td><span class="form-inline">
    <textarea name="wis_materials" rows="3" class="form-control " id="exampleInputName39" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_materials?></textarea>
  </span></td>
</tr>
<tr>
  <th>21. ภาษา  วรรณคดี   วรรณศิลป์</th>
  <td><span class="form-inline">
    <textarea name="wis_language" rows="3" class="form-control " id="exampleInputName40" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_language?></textarea>
  </span></td>
</tr>
<tr>
  <th>22. วาทศิลป์</th>
  <td><span class="form-inline">
    <textarea name="wis_rhetoric" rows="3" class="form-control " id="exampleInputName41" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_rhetoric?></textarea>
  </span></td>
</tr>
<tr>
  <th>23. อื่น  ๆ </th>
  <td><span class="form-inline">
    <textarea name="wis_other" rows="3" class="form-control " id="exampleInputName42" style="width:600px;" placeholder="เชี่ยวชาญเรื่อง"><?=$rs->wis_other?></textarea>
  </span></td>
</tr>
</table>
</div>


</div>




<div id="btnBoxAdd">
  <?php echo form_current() ?>
  <?php echo form_referer() ?>
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>



<script type="text/javascript">
$(document).ready(function(){
	
	// validate
	$("form").validate({
		rules: {
			regis_date:"required",
			regis_province_id:"required",
			title:"required",
			name:"required",
			// birth_day:"required",
			// birth_month:"required",
			birth_year:"required",
			status:"required",
			id_card:"required",
			issue_date:"required",
			expire_date:"required",
			issue_place:"required",
			reg_home_no:"required",
			reg_moo:"required",
			reg_soi:"required",
			// reg_road:"required",
			reg_province_id:"required",
			reg_amphur_id:"required",
			reg_district_id:"required",
			reg_post_code:"required",
			now_home_no:"required",
			now_moo:"required",
			now_soi:"required",
			now_road:"required",
			now_province_id:"required",
			now_amphur_id:"required",
			now_district_id:"required",
			now_post_code:"required"
		},
		messages:{
			regis_date:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			regis_province_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			title:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			name:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			// birth_day:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			// birth_month:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			birth_year:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			status:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			id_card:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			issue_date:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			expire_date:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			issue_place:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_home_no:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_moo:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_soi:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			// reg_road:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_province_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_amphur_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_district_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			reg_post_code:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_home_no:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_moo:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_soi:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_road:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_province_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_amphur_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_district_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			now_post_code:"ฟิลด์นี้ห้ามเป็นค่าว่าง"
		},
        errorPlacement: function(error, element)
        {
	            if ( element.is(":radio,:checkbox")) 
	            {
	                error.appendTo( element.parents('td') );
	            }
	            else 
	            { // This is the default behavior 
	                error.insertAfter( element );
	            }
		}
	});
	
	//คำนวนอายุ
	$("select[name=birth_year]").change(function(){
		var birth_year = $(this).val();
		if(birth_year != ""){
			$.get('home/ajax/calAge',{
				'birth_year' : birth_year
			},function(data){
				$('.calAge').html(data);
			});
		}else{
			$('.calAge').html("(xx ปี)");
		}
	});
	
	<?php if(@$rs->id != ""):?>
	var birth_year = '<?=$rs->birth_year?>';
	$.get('home/ajax/calAge',{
		'birth_year' : birth_year
	},function(data){
		$('.calAge').html(data);
	});
	<?php endif;?>
	
	// อื่นๆ ระบุ
	$('input:radio[name=marital_status],input:radio[name=education]').change(function() {
        if (this.value == '99999') {
            $(this).closest('td').find('input[type=text]').removeAttr('disabled','disabled');
        }else{
        	$(this).closest('td').find('input[type=text]').attr('disabled','disabled');
        }
    });
	
	// ที่อยู่ตามทะเบียนบ้าน * --------------------------------------------------------
	// select จังหวัด หา อำเภอ
	$('table').on('change', "select[name=reg_province_id]", function() {
		var province_id = $(this).val();
		var ele = $(this).closest('.spanProvince').next(".spanAmphur");
		if(province_id == ""){
				$(".spanAmphur").find('select').val('').attr("disabled", true);
		}else{
			$.get('home/ajax/get_select_reg_amphur',{
				'province_id' : province_id
			},function(data){
				ele.html(data);
			});
		}
	});

	// select อำเภอ หาตำบล
	$('table').on('change', "select[name=reg_amphur_id]", function() {
		var province_id = $('[name=reg_province_id]').val();
		var amphur_id = $(this).val();
		var ele = $(this).closest(".spanAmphur").next(".spanDistrict");
		if(amphur_id == ""){
				$(".spanDistrict").find('select').val('').attr("disabled", true);
		}else{
			$.get('home/ajax/get_select_reg_district',{
				'province_id' : province_id,
				'amphur_id' : amphur_id
			},function(data){
				ele.html(data);
			});
		}
	});
	
	<?php if(@$rs->id != ""):?>
	var reg_province_id = '<?=$rs->reg_province_id?>';
	var reg_amphur_id = '<?=$rs->reg_amphur_id?>';
	var reg_district_id = '<?=$rs->reg_district_id?>';
	
	$.get('home/ajax/get_select_reg_amphur',{
		'province_id' : reg_province_id,
		'amphur_id' : reg_amphur_id
	},function(data){
		$('select[name=reg_amphur_id]').closest('.spanAmphur').html(data);
	});
	
	$.get('home/ajax/get_select_reg_district',{
		'province_id' : reg_province_id,
		'amphur_id' : reg_amphur_id,
		'district_id' : reg_district_id
	},function(data){
		$('select[name=reg_district_id]').closest('.spanDistrict').html(data);
	});
	<?php endif;?>
	// ที่อยู่ตามทะเบียนบ้าน * --------------------------------------------------------
	
	// ที่อยู่ปัจจุบัน  * -----------------------------------------------------------------
	// select จังหวัด หา อำเภอ
	$('table').on('change', "select[name=now_province_id]", function() {
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
	$('table').on('change', "select[name=now_amphur_id]", function() {
		var province_id = $('[name=now_province_id]').val();
		var amphur_id = $(this).val();
		var ele = $(this).closest(".spanAmphur").next(".spanDistrict");
		if(amphur_id == ""){
				$(".spanDistrict").find('select').val('').attr("disabled", true);
		}else{
			$.get('home/ajax/get_select_now_district',{
				'province_id' : province_id,
				'amphur_id' : amphur_id
			},function(data){
				ele.html(data);
			});
		}
	});
	
	<?php if(@$rs->id != ""):?>
	var now_province_id = '<?=$rs->now_province_id?>';
	var now_amphur_id = '<?=$rs->now_amphur_id?>';
	var now_district_id = '<?=$rs->now_district_id?>';
	
	$.get('home/ajax/get_select_now_amphur',{
		'province_id' : now_province_id,
		'amphur_id' : now_amphur_id
	},function(data){
		$('select[name=now_amphur_id]').closest('.spanAmphur').html(data);
	});
	
	$.get('home/ajax/get_select_now_district',{
		'province_id' : now_province_id,
		'amphur_id' : now_amphur_id,
		'district_id' : now_district_id
	},function(data){
		$('select[name=now_district_id]').closest('.spanDistrict').html(data);
	});
	<?php endif;?>
	// ที่อยู่ปัจจุบัน  * -----------------------------------------------------------------
	
});
</script>