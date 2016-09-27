<style>
th {
    text-align: center;
}	
</style>

<h3>รายงานจำนวนผู้ขึ้นทะเบียน</h3>
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
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
</form>
</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="3">ลำดับ</th>
			<th rowspan="3">จังหวัด</th>
			<th colspan="9">จำนวนผู้สูงอายุที่ขึ้นทะเบียนคลังปัญญาจังหวัด</th>
			<th rowspan="3">รวม</th>
		</tr>
		<tr>
			<th colspan="3">ชาย</th>
			<th colspan="3">หญิง	</th>
			<th colspan="3">ไม่ระบุ</th>
		</tr>
		<tr>
			<th>60-69 ปี</th>
			<th>70-79 ปี</th>
			<th>80 ปีขึ้นไป</th>
			<th>60-69 ปี</th>
			<th>70-79 ปี</th>
			<th>80 ปีขึ้นไป</th>
			<th>60-69 ปี</th>
			<th>70-79 ปี</th>
			<th>80 ปีขึ้นไป</th>
		</tr>
	</thead>
	<tbody>
		<?
			$sum_male_60 = 0;
			$sum_male_70 = 0;
			$sum_male_80 = 0;
			$sum_female_60 = 0;
			$sum_female_70 = 0;
			$sum_female_80 = 0;
			$sum_unknow_60 = 0;
			$sum_unknow_70 = 0;
			$sum_unknow_80 = 0;
			$sum_total = 0;
		?>
		<?foreach($rs as $key=>$row):?>
		<tr>
			<td><?=$key+1?></td>
			<td><?=$row->province_name?></td>
			<td><?=$row->count_male_60?></td>
			<td><?=$row->count_male_70?></td>
			<td><?=$row->count_male_80?></td>
			<td><?=$row->count_female_60?></td>
			<td><?=$row->count_female_70?></td>
			<td><?=$row->count_female_80?></td>
			<td><?=$row->count_unknow_60?></td>
			<td><?=$row->count_unknow_70?></td>
			<td><?=$row->count_unknow_80?></td>
			<td><?=$row->count_total?></td>
		</tr>
		<?
			$sum_male_60 += $row->count_male_60;
			$sum_male_70 += $row->count_male_70;
			$sum_male_80 += $row->count_male_80;
			$sum_female_60 += $row->count_female_60;
			$sum_female_70 += $row->count_female_70;
			$sum_female_80 += $row->count_female_80;
			$sum_unknow_60 += $row->count_unknow_60;
			$sum_unknow_70 += $row->count_unknow_70;
			$sum_unknow_80 += $row->count_unknow_80;
			$sum_total += $row->count_total;
		?>
		<?endforeach;?>
		<td colspan="2" align="center"><b>รวม</b></td>
		<td><?=$sum_male_60?></td>
		<td><?=$sum_male_70?></td>
		<td><?=$sum_male_80?></td>
		<td><?=$sum_female_60?></td>
		<td><?=$sum_female_70?></td>
		<td><?=$sum_female_80?></td>
		<td><?=$sum_unknow_60?></td>
		<td><?=$sum_unknow_70?></td>
		<td><?=$sum_unknow_80?></td>
		<td><?=$sum_total?></td>
	</tbody>
</table>