<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อผู้ใช้งาน / usernames" name="search" value="<?=@$_GET['search']?>">
  </div>
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <a href="home/users/form"><input type="button" title="เพิ่มผู้ใช้งาน" value="เพิ่มผู้ใช้งาน" class="btn btn-warning vtip" /></a>
</div>

<?=$rs->pagination();?>

<table class="tblist">
<tr>
  <th align="left">ลำดับ</th>
  <th align="left">Username</th>
  <th align="left">ชื่อผู้ใช้งาน (หน่วยงาน)</th>
  <th align="left">จังหวัด</th>
  <th align="left">เปิดใช้งาน</th>
  <th align="left">จัดการ</th>
  </tr>
<?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->username?></td>
	  <td><?=$row->name?></td>
	  <td><?=get_province_name($row->province_id)?></td>
	  <td><?=$row->status == 1 ? '<img src="themes/elderly2016/images/icon_checkbox.png" width="24" height="24" />'  : '' ;?></td>
	  <td><a href="home/users/form/<?=$row->id?>"><img src="themes/elderly2016/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="home/users/delete/<?=$row->id?>"><img src="themes/elderly2016/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('ยืนยันการลบข้อมูล?')" /></a></td>
  </tr>
<?endforeach;?>
</table>

<?=$rs->pagination();?>