<style>
th {
    text-align: center;
}	
</style>

<?php if(@$_GET['export_type']!='excel'):?>
	
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

<div align="right"><button class="btn-excel-report">Excel</button></div><br>

<?php else:?>
	
	<h3>รายงานผู้ขึ้นทะเบียนเสียชีวิต <?if(@$_GET['regis_year']){ echo "ปี พ.ศ. ".$_GET['regis_year']; }?></h3>

<?php endif;?>

<table class="table table-bordered" border="1">
	<thead>
		<tr>
			<th rowspan="2">ลำดับ</th>
			<th rowspan="2">จังหวัด</th>
			<th colspan="4">ผู้ขึ้นทะเบียนภูมิปัญญา	</th>
		</tr>
		<tr>
			<th>ชาย(เสียชีวิต)</th>
			<th>หญิง(เสียชีวิต)</th>
			<th>ไม่ระบุ(เสียชีวิต)</th>
			<th>รวม</th>
		</tr>
	</thead>
	<tbody>
		<?
			$sum_male = 0;
			$sum_female = 0;
			$sum_unknow = 0;
			$sum_total = 0;
		?>
		<?foreach($rs as $key=>$row):?>
		<tr>
			<td><?=$key+1?></td>
			<td><?=$row->province_name?></td>
			<td><?=$row->count_male?></td>
			<td><?=$row->count_female?></td>
			<td><?=$row->count_unknow?></td>
			<td><?=$row->count_total?></td>
		</tr>
		<?
			$sum_male += $row->count_male;
			$sum_female += $row->count_female; 
			$sum_unknow += $row->count_unknow; 
			$sum_total += $row->count_total;
		?>
		<?endforeach;?>
		<td colspan="2" align="center"><b>รวม</b></td>
		<td><?=$sum_male?></td>
		<td><?=$sum_female?></td>
		<td><?=$sum_unknow?></td>
		<td><?=$sum_total?></td>
	</tbody>
</table>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$('.btn-excel-report').click(function(){
        var url = 'http://<?=$_SERVER['SERVER_NAME']?><?=$_SERVER['REQUEST_URI']?>&export_type=excel';
        window.open(url);
    });
    
	$('.btn-print-report').click(function(){
	    var url = 'http://<?=$_SERVER['SERVER_NAME']?><?=$_SERVER['REQUEST_URI']?>&export_type=print';
	    window.open(url);
	});
});

<?php if(@$_GET['export_type']=='print'):?>
setTimeout("window.print();",2000);
<?php endif;?>
</script>