<h3>รายงานผลการดำเนินงานโครงการ (คปญ. 2) </h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อโครงการ / ชื่อกิจกรรม / ชื่อวิทยากร">
  </div>
  <select name="select" class="form-control" style="width:200px;">
    <option>-- ทุกปีงบประมาณ --</option>
  </select>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกจังหวัด --</option>
  </select>
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
</form>
</div>
</div>

<div id="btnBox">
  <input type="button" title="เพิ่มรายงาน คปญ.2 รายงานผลการดำเนินงานโครงการ" value="เพิ่มรายงาน คปญ.2" onclick="document.location='home/projects/form'" class="btn btn-warning vtip" />
</div>

<?=$rs->pagination();?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ปีงบประมาณ</th>
  <th>ชื่อโครงการ</th>
  <th>ชื่อกิจกรรม</th>
  <th>ชื่อ  - สกุล วิทยากรภูมิปัญญา</th>
  <th>จังหวัด</th>
  <th>SWOT คปญ.3</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->budget_year?></td>
	  <td><?=$row->name?></td>
	  <td>
	  	<?$activities = $this->db->query('select * from activities where project_id = '.$row->id)->result();?>
	  	<?foreach($activities as $activity):?>
  		<div><?=$activity->activity_name?></div>
  		<?endforeach;?>
	  </td>
	  <td>
	  	<?$experts = $this->db->query('select * from experts where project_id = '.$row->id)->result();?>
	  	<?foreach($experts as $expert):?>
  		<div><?=$expert->expert_name?></div>
  		<?endforeach;?>
	  </td>
	  <td><?=get_province_name($row->province_id)?></td>
	  <td><a href="kpy.php?act=list3"><img src="themes/elderly2016/images/swot.png" width="48" height="48" /></a></td>
	  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="themes/elderly2016/images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="home/projects/form/<?=$rs->id?>"><img src="themes/elderly2016/images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="home/projects/delete/<?=$rs->id?>"><img src="themes/elderly2016/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?=$rs->pagination();?>