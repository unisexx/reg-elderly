<style>
th {
    text-align: center;
}	
</style>

<?php if(@$_GET['export_type']!='excel'):?>
	
<h3>รายงานผลคปญ.</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
    <select name="budget_year" class="form-control" style="width:auto;">
      <option value="">-- ปีงบประมาณ --</option>
      <?php 
		for ($x = (date("Y")+543); $x >= 2550; $x--) {
			$selected_year = ($x == @$_GET['budget_year'])?"selected=selected":"";
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
	
	<h3>รายงานผลคปญ. <?if(@$_GET['budget_year']){ echo "ปี พ.ศ. ".$_GET['budget_year']; }?></h3>

<?php endif;?>

<table class="table table-bordered" border="1">
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
		<?
			$sum_male = 0;
			$sum_female = 0;
			$sum_unknown = 0;
			$sum_total = 0;
			$sum_b1m = 0;
			$sum_b1f = 0;
			$sum_b2m = 0;
			$sum_b2f = 0;
			$sum_b3m = 0;
			$sum_b3f = 0;
			$sum_b4m = 0;
			$sum_b4f = 0;
		?>
		<?foreach($rs as $key=>$row):?>
			<tr>
				<td><?=$key+1?></td>
				<td><?=$row->province_name?></td>
				<td><?=$row->male?></td>
				<td><?=$row->female?></td>
				<td><?=$row->unknown?></td>
				<td><?=$row->b1m?></td>
				<td><?=$row->b1f?></td>
				<td><?=$row->b2m?></td>
				<td><?=$row->b2f?></td>
				<td><?=$row->b3m?></td>
				<td><?=$row->b3f?></td>
				<td><?=$row->b4m?></td>
				<td><?=$row->b4f?></td>
				<td><?=$count_total = $row->male+$row->female+$row->unknown+$row->b1m+$row->b1f+$row->b2m+$row->b2f+$row->b3m+$row->b3f+$row->b4m+$row->b4f?></td>
			</tr>
		<?
			$sum_male += $row->male;
			$sum_female += $row->female; 
			$sum_unknown += $row->unknown; 
			$sum_total += $count_total;
			$sum_b1m += $row->b1m;
			$sum_b1f += $row->b1f;
			$sum_b2m += $row->b2m;
			$sum_b2f += $row->b2f;
			$sum_b3m += $row->b3m;
			$sum_b3f += $row->b3f;
			$sum_b4m += $row->b4m;
			$sum_b4f += $row->b4f;
		?>
		<?endforeach;?>
		<td colspan="2" align="center"><b>รวม</b></td>
		<td><?=$sum_male?></td>
		<td><?=$sum_female?></td>
		<td><?=$sum_unknown?></td>
		<td><?=$sum_b1m?></td>
		<td><?=$sum_b1f?></td>
		<td><?=$sum_b2m?></td>
		<td><?=$sum_b2f?></td>
		<td><?=$sum_b3m?></td>
		<td><?=$sum_b3f?></td>
		<td><?=$sum_b4m?></td>
		<td><?=$sum_b4f?></td>
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