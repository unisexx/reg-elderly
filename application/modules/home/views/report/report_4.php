<style>
th {
    text-align: center;
}	
</style>

<h3>รายงานผู้ขึ้นทะเบียนเสียชีวิต</h3>
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
			<th rowspan="2">ลำดับ</th>
			<th rowspan="2">จังหวัด</th>
			<th colspan="4">ผู้ขึ้นทะเบียนภูมิปัญญา	</th>
		</tr>
		<tr>
			<th rowspan="2">ชาย(เสียชีวิต)</th>
			<th rowspan="2">หญิง(เสียชีวิต)</th>
			<th rowspan="2">ไม่ระบุ(เสียชีวิต)</th>
			<th colspan="2">รวม</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>