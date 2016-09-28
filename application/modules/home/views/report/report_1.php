<h3>รายงานรายชื่อผู้ขึ้นทะเบียน</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
    <select name="regis_year" class="form-control" style="width:auto;">
      <option value="">-- ปีงบประมาณที่ขึ้นทะเบียน --</option>
      <?php 
		for ($x = (date("Y")+543); $x >= 2533; $x--) {
			$selected_year = ($x == @$_GET['regis_year'])?"selected=selected":"";
		    echo "<option value='$x' $selected_year>$x</option>";
		} 
	  ?>
    </select>
    <?=form_dropdown('regis_province_id',get_option('code','name','province '.select_province_condition().' order by name asc'),@$_GET['regis_province_id'],'class="form-control" style="width:200px;"','-- จังหวัดที่ขึ้นทะเบียน --');?>
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
</form>
</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>ที่</th>
			<th>อำเภอ</th>
			<th>เลขที่บัตรประชาชน</th>
			<th>ชื่อ - สกุล</th>
			<th>อายุ</th>
			<th>สาขาภูมิปัญญา</th>
			<th>ความเชี่ยวชาญ</th>
			<th>วุฒิการศึกษา</th>
			<th>ที่อยู่</th>
			<th>โทรศัพท์</th>
			<th>ภาพผู้เป็นภูมิปัญญา</th>
			<th>สถานภาพ</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=(isset($_GET['page']))? (($_GET['page'] -1)* 20)+1:1; ?>
		<?foreach($rs as $key=>$row):?>
		<tr>
			<td><?=$i?></td>
			<td><?=get_amphur_name($row->reg_province_id,$row->reg_amphur_id)?></td>
			<td><?=$row->id_card?></td>
			<td><?=$row->name?></td>
			<td><?=@calculate_age($row->birth_day,$row->birth_month,$row->birth_year)?></td>
			<td><?=wisdom_list($row)?></td>
			<td><?=wisdom_detail($row)?></td>
			<td><?=get_education_name($row->education)?></td>
			<td>
				<?=$row->reg_home_no?>
			  	<?=$row->reg_moo != "" ? " หมู่ที่ ".$row->reg_moo : "" ;?>
			  	<?=$row->reg_soi != "" ? " ซอย".$row->reg_soi : "" ;?>
			  	<?=$row->reg_district_id != "" ? " ตำบล".get_district_name($row->reg_province_id,$row->reg_amphur_id,$row->reg_district_id) : "" ;?>
			  	<?=$row->reg_amphur_id != "" ? " อำเภอ".get_amphur_name($row->reg_province_id,$row->reg_amphur_id) : "" ;?>
			  	<?=$row->reg_province_id != "" ? get_province_name($row->reg_province_id) : "" ;?>
			  	<?=$row->reg_post_code != "" ? $row->reg_post_code : "" ;?>
			</td>
			<td><?=$row->mobile != "" ? $row->mobile : "" ;?></td>
			<td>
				<?if($row->picture != ""):?>
					<img src="uploads/histories/<?=$row->picture?>" width="110" height="110" />
				<?endif;?>
			</td>
			<td>
				<?if($row->status == 1):?>
					มีชีวิต
				<?elseif($row->status == 2):?>
					เสียชีวิต
				<?endif;?>
			</td>
		</tr>
		<?$i++?>
		<?endforeach;?>
	</tbody>
</table>

<?=$pagination?>


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

function wisdom_detail($row){
	$txt = '';
	if($row->wis_study != ""){ $txt .= "- ".$row->wis_study."<br>";}
	if($row->wis_medical != ""){ $txt .= "- ".$row->wis_medical."<br>";}
	if($row->wis_agriculture != ""){ $txt .= "- ".$row->wis_agriculture."<br>";}
	if($row->wis_natural != ""){ $txt .= "- ".$row->wis_natural."<br>";}
	if($row->wis_science != ""){ $txt .= "- ".$row->wis_science."<br>";}
	if($row->wis_engineer != ""){ $txt .= "- ".$row->wis_engineer."<br>";}
	if($row->wis_architecture != ""){ $txt .= "- ".$row->wis_architecture."<br>";}
	if($row->wis_social != ""){ $txt .= "- ".$row->wis_social."<br>";}
	if($row->wis_law != ""){ $txt .= "- ".$row->wis_law."<br>";}
	if($row->wis_politics != ""){ $txt .= "- ".$row->wis_politics."<br>";}
	if($row->wis_art != ""){ $txt .= "- ".$row->wis_art."<br>";}
	if($row->wis_religion != ""){ $txt .= "- ".$row->wis_religion."<br>";}
	if($row->wis_commercial != ""){ $txt .= "- ".$row->wis_commercial."<br>";}
	if($row->wis_security != ""){ $txt .= "- ".$row->wis_security."<br>";}
	if($row->wis_management != ""){ $txt .= "- ".$row->wis_management."<br>";}
	if($row->wis_publicity != ""){ $txt .= "- ".$row->wis_publicity."<br>";}
	if($row->wis_transport != ""){ $txt .= "- ".$row->wis_transport."<br>";}
	if($row->wis_energy != ""){ $txt .= "- ".$row->wis_energy."<br>";}
	if($row->wis_foreign != ""){ $txt .= "- ".$row->wis_foreign."<br>";}
	if($row->wis_materials != ""){ $txt .= "- ".$row->wis_materials."<br>";}
	if($row->wis_language != ""){ $txt .= "- ".$row->wis_language."<br>";}
	if($row->wis_rhetoric != ""){ $txt .= "- ".$row->wis_rhetoric."<br>";}
	if($row->wis_other != ""){ $txt .= "- ".$row->wis_other."<br>";}
	return $txt;
}
?>