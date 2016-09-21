<style>
th {
    text-align: center;
}	
</style>

<h3>รายงาน จำนวนผู้ขึ้นทะเบียน</h3>
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

<table class="table">
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
		
	</tbody>
</table>