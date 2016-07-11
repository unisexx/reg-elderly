<h3>แผนการดำเนินงาน (คปญ. 4)</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
    <select name="budget_year" class="form-control" style="width:180px">
      <option value="">-- เลือกปีงบประมาณ --</option>
      <?php 
		for ($x = 2450; $x <= (date("Y")+543); $x++) {
			$selected_year = ($x == $_GET['budget_year'])?"selected=selected":"";
		    echo "<option value='$x' $selected_year>$x</option>";
		} 
	  ?>
    </select>
    <input type="text" class="form-control" placeholder="ชื่อกิจกรรม" style="width:400px;" name="search" value="<?=@$_GET['search']?>">
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
</form>
</div>
</div>



<div id="btnBox">
  <input type="button" title="เพิ่มรายงาน คปญ.04 แผนการดำเนินงาน" value="เพิ่มรายงาน คปญ.04" onclick="document.location='home/plans/form'" class="btn btn-warning vtip" />
</div>


<?=$rs->pagination();?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ปีงบประมาณ</th>
  <th>ชื่อกิจกรรม</th>
  <th>วัน/เดือน/ปี </th>
  <th>งบประมาณ</th>
  <th>หน่วยงาน</th>
  <th>จังหวัด</th>
  <th>ผู้แจ้งข้อมูล</th>
  <th>จัดการ</th>
</tr>
<?foreach($rs as $key=>$row):?>
<tr class="<?=alternator('','odd');?>">
	<td><?=($key+1)+$rs->paged->current_row?></td>
	<td><?=$row->budget_year?></td>
	<td>
		<?$activities = $this->db->query('select activity_name from plans_activities where plan_id = '.$row->id.' order by id asc')->result();?>
	  	<?foreach($activities as $activity):?>
  		<div><?=$activity->activity_name?></div>
  		<?endforeach;?>
	</td>
	<td>
		<?$activities = $this->db->query('select activity_date from plans_activities where plan_id = '.$row->id.' order by id asc')->result();?>
	  	<?foreach($activities as $activity):?>
  		<div><?=mysql_to_th($activity->activity_date)?></div>
  		<?endforeach;?>
	</td>
	<td>
		<?$activities = $this->db->query('select budget from plans_activities where plan_id = '.$row->id.' order by id asc')->result();?>
	  	<?foreach($activities as $activity):?>
  		<div><?=$activity->budget?></div>
  		<?endforeach;?>
	</td>
	<td><?=$row->department_id?></td>
	<td></td>
	<td><?=$row->name?></td>
	<td>
		<a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="themes/elderly2016/images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a>
		<a href="home/plans/form/<?=$row->id?>"><img src="themes/elderly2016/images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> 
		<a href="home/plans/delete/<?=$row->id?>"><img src="themes/elderly2016/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></a>
	</td>
</tr>
<?endforeach;?>
</table>

<?=$rs->pagination();?>