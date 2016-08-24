<div class="printpage">
<div style="text-align:right;">
<p>แบบ คปญ. ๔</p>
</div>

<div style="font-size:20px; text-align:center">แผนการดำเนินงาน ปีงบประมาณ <span><?=$rs->budget_year?></span></div>
<div style="font-size:20px; text-align:center">หน่วยงาน <span><?=$rs->user->name?></span> จังหวัด <span><?=get_province_name($rs->user->province_id)?></span></div>
<div style="font-size:20px; text-align:center">ผู้แจ้งข้อมูล <span><?=$rs->name?></span> โทรศัพท์ <span><?=$rs->tel?></span></div>
<table class="tblistReport" border="1">
  <tr>
    <th rowspan="2" style="width:5%">ที่</th>
    <th rowspan="2" style="width:35%">กิจกรรม</th>
    <th rowspan="2" style="width:30%">กลุ่มเป้าหมาย/พื้นที่</th>
    <th rowspan="2" style="width:10%">วัน/เดือน/ปี</th>
    <th rowspan="2" style="width:10%">งบประมาณ</th>
    <th colspan="2">ผลสัมฤทธิ์</th>
  </tr>
  <tr>
  <th>ผลผลิต</th>
  <th>ผลลัพธ์</th>
  </tr>
  <?if(isset($activities)):?>
  <?foreach($activities as $key=>$act):?>
  <tr>
  	<td><?=$key+1?></td>
  	<td><?=$act->activity_name?></td>
  	<td><?=$act->area?></td>
  	<td><?=DB2Date($act->activity_date)?></td>
  	<td><?=number_format($act->budget)?></td>
  	<td><?=$act->product?></td>
  	<td><?=$act->result?></td>
  </tr>
  <?endforeach;?>
  <?endif;?>
  </table>



<?if(@$_GET['type'] == ""):?>
<div align="right"><a href="home/plans/view/<?=$rs->id?>?type=word">word</a> | <a href="home/plans/view/<?=$rs->id?>?type=excel">excel</a></div>
<?endif;?>

</div><!--printpage-->