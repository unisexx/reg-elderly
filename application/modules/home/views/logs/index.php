<h3>ประวัติการใช้งาน</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <input name="search" class="form-control" type="text" style="width:350px;" placeholder="ชื่อ-สกุลผู้ใช้งาน/ IP Address" value="<?=@$_GET['search']?>" />
  <!-- <input name="input2" class="form-control" type="text" style="width:90px;" /> 
  <img src="themes/elderly2016/images/calendar.png" width="24" height="24" /> -->
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />Search</button>
  </form>
</div>
</div>

<?=$rs->pagination();?>

<table class="tblist">
<tr>
  <th align="left">ลำดับ</th>
  <th align="left">วันเวลาใช้งาน</th>
  <th align="left">ชื่อ - สกุล ผู้ใช้งาน</th>
  <th align="left">รายละเอียด</th>
  <th align="left">IP Address</th>
</tr>
<?foreach($rs as $key=>$row):?>
<tr class="<?=alternator('','odd');?>">
  <td><?=($key+1)+$rs->paged->current_row?></td>
  <td nowrap="nowrap"><?=mysql_to_th($row->created,'S',TRUE)?></td>
  <td nowrap="nowrap"><?=$row->username?></td>
  <td><?=$row->detail?></td>
  <td><?=$row->ip?></td>
</tr>
<?endforeach;?>
</table>

<?=$rs->pagination();?>