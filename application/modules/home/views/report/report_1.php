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

<table class="table">
	<thead>
		<tr>
			<th>อำเภอ</th>
			<th>ที่</th>
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
		<?foreach($rs as $key=>$row):?>
		<tr>
			<td><?=get_amphur_name($row->reg_province_id,$row->reg_amphur_id)?></td>
			<td></td>
			<td><?=$row->id_card?></td>
			<td><?=$row->name?></td>
			<td><?=@calculate_age($row->birth_day,$row->birth_month,$row->birth_year)?></td>
			<td></td>
			<td></td>
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
		<?endforeach;?>
	</tbody>
</table>