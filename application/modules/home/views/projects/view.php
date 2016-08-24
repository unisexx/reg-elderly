<?
$totle_province = $this->db->query("SELECT count(id) total from histories where YEAR(regis_date) = 2016 AND regis_province_id = ".$rs->province_id)->row_array();
$totle_province_male = $this->db->query("SELECT count(id) total from histories INNER JOIN prefix ON histories.title = prefix.prefix_code where YEAR(histories.regis_date) = 2016 AND histories.regis_province_id = ".$rs->province_id." AND prefix.sex = 'm'")->row_array();
$totle_province_female = $this->db->query("SELECT count(id) total from histories INNER JOIN prefix ON histories.title = prefix.prefix_code where YEAR(histories.regis_date) = 2016 AND histories.regis_province_id = ".$rs->province_id." AND prefix.sex = 'f'")->row_array();
$totle_all = $this->db->query("SELECT count(id) total from histories where regis_province_id = ".$rs->province_id)->row_array();
$totle_all_male = $this->db->query("SELECT count(id) total from histories INNER JOIN prefix ON histories.title = prefix.prefix_code where regis_province_id = ".$rs->province_id." AND prefix.sex = 'm'")->row_array();
$totle_all_female = $this->db->query("SELECT count(id) total from histories INNER JOIN prefix ON histories.title = prefix.prefix_code where regis_province_id = ".$rs->province_id." AND prefix.sex = 'f'")->row_array();
?>

<div class="printpage">
<div style="text-align:right;">
<p>แบบ คปญ. ๒</p>
</div>

<div style="font-size:24px;">รายงานผลการดำเนินงานโครงการ <span><?=$rs->name?></span> จังหวัด <span><?=get_province_name($rs->province_id)?></span> ปีงบประมาณ <span><?=$rs->budget_year?></span></div>

<div>1. ผู้ขึ้นทะเบียนคลังปัญญาผู้สูงอายุ ปี <?=$rs->budget_year?> จำนวน <span><?=$totle_province['total']?></span> คน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชาย <span><?=$totle_province_male['total']?></span> คน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หญิง <span><?=$totle_province_female['total']?></span> คน</div>
<div>2. ผู้ขึ้นทะเบียนคลังปัญญาผู้สูงอายุ ยอดสะสมทั้งหมด จำนวน <span><?=$totle_all['total']?></span> คน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชาย <span><?=$totle_all_male['total']?></span> คน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หญิง <span><?=$totle_all_female['total']?></span> คน</div>

<table class="tblistReport" border="1" bordercolor="#ccc">
  <tr>
    <th rowspan="3" style="width:5%">#</th>
    <th rowspan="3" style="width:25%">ชื่อกิจกรรม</th>
    <th rowspan="3" style="width:20%">ชื่อวิทยากรภูมิปัญญา</th>
    <th colspan="8" style="width:25%">จำนวนผู้ได้รับประโยชน์</th>
    <th rowspan="3" style="width:5%">รวม</th>
    <th rowspan="3" style="width:20%">พื้นที่ดำเนินการ</th>
    <th rowspan="3" style="width:10%">วันที่ดำเนินการ</th>
    <th rowspan="3" style="width:10%">งบประมาณโครงการ/จำนวน</th>
    </tr>
  <tr>
    <th colspan="2">0-18  ปี</th>
    <th colspan="2">18-25  ปี</th>
    <th colspan="2">25-59  ปี</th>
    <th colspan="2">60 ปีขึ้นไป</th>
    </tr>
  <tr>
  <th>ช</th>
  <th>ญ</th>
  <th>ช</th>
  <th>ญ</th>
  <th>ช</th>
  <th>ญ</th>
  <th>ช</th>
  <th>ญ</th>
  </tr>
  <?if(isset($activities)):?>
  <?foreach($activities as $key=>$act):?>
  <tr>
  	<td><?=$key+1?></td>
  	<td><?=$act->activity_name?></td>
  	<td>
  		<?$experts = $this->db->query('select * from experts where activity_id = '.$act->id)->result();?>
  		<?foreach($experts as $expert):?>
  		<div class="expertName"><?=$expert->expert_name?></div>
  		<?endforeach;?>
  	</td>
  	<td><?=$act->b1m?></td>
  	<td><?=$act->b1f?></td>
  	<td><?=$act->b2m?></td>
  	<td><?=$act->b2f?></td>
  	<td><?=$act->b3m?></td>
  	<td><?=$act->b3f?></td>
  	<td><?=$act->b4m?></td>
  	<td><?=$act->b4f?></td>
  	<td><?=($act->b1m + $act->b1f + $act->b2m + $act->b2f + $act->b3m + $act->b3f + $act->b4m + $act->b4f)?></td>
  	<td><?=$act->area?></td>
  	<td><?=DB2Date($act->activity_date)?></td>
  	<td><?=number_format($act->budget)?></td>
  </tr>
  <?endforeach;?>
  <?endif;?>
  </table>

<div>3. ขั้นตอนการติดตามรายงานผลการดำเนินงาน</div>
<div><?=$rs->detail?></div>


<div>4. ผู้รับผิดชอบโครงการ ชื่อ-สกุล <span><?=$rs->responsible_name?></span> ตำแหน่ง <span><?=$rs->position?></span> โทรศัพท์ <span><?=$rs->tel?></span> มือถือ <span><?=$rs->mobile?></span> e-mail <span><?=$rs->email?></span></div>


<?if(@$_GET['type'] == ""):?>
<div align="right"><a href="home/projects/view/<?=$rs->id?>?type=word">word</a> | <a href="home/projects/view/<?=$rs->id?>?type=excel">excel</a></div>
<?endif;?>

</div><!--printpage-->