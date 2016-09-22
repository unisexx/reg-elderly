<style>
th {
    text-align: center;
}	
</style>

<h3>รายงานผลคปญ.</h3>
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
			<th colspan="3">วิทยากร</th>
			<th colspan="8">ผู้รับประโยชน์</th>
			<th rowspan="3">รวม</th>
		</tr>
		<tr>
			<th rowspan="2">ชาย</th>
			<th rowspan="2">หญิง</th>
			<th rowspan="2">ไม่ระบุ</th>
			<th colspan="2">0 - 18 ปี</th>
			<th colspan="2">19 - 25 ปี</th>
			<th colspan="2">26 - 59 ปี</th>
			<th colspan="2">60 ปีขึ้นไป</th>
		</tr>
		<tr>
			<th>ชาย</th>
			<th>หญิง</th>
			<th>ชาย</th>
			<th>หญิง</th>
			<th>ชาย</th>
			<th>หญิง</th>
			<th>ชาย</th>
			<th>หญิง</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>