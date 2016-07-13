<h3>รายงานผลการดำเนินงานโครงการ (คปญ. 2) [เพิ่ม/แก้ไข]</h3>

<form method="post" action="home/projects/save/<?=$rs->id?>">
<table class="tbadd">
<tr>
  <th>ปีงบประมาณ <span class="Txt_red_12">*</span></th>
  <td>
    <select name="budget_year" class="form-control" style="width:auto;">
      <option>+ เลือกปีงบประมาณ +</option>
      <?php 
		for ($x = 2450; $x <= (date("Y")+543); $x++) {
			$selected_year = ($x == $rs->budget_year)?"selected=selected":"";
		    echo "<option value='$x' $selected_year>$x</option>";
		} 
	  ?>
    </select>
</td>
</tr>
<tr>
  <th>โครงการ <span class="Txt_red_12">*</span> / จังหวัด <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName" placeholder="โครงการ" style="width:500px;" name="name" value="<?=$rs->name?>" /> 
    / <?=form_dropdown('province_id',get_option('id','name','province '.select_province_condition().' order by name asc'),@$rs->province_id,'class="form-control" style="width:auto;"','+ เลือกจังหวัด +');?>
  </span></td>
</tr>
<tr>
  <th>ขั้นตอนการติดตามรายงานผลการดำเนินงาน  </th>
  <td>
    <textarea name="detail" rows="4" class="form-control " id="exampleInputName2" style="width:600px;" placeholder="รายละเอียด"><?=$rs->detail?></textarea>
    </td>
</tr>
<tr>
  <th>ผู้รับผิดชอบโครงการ  <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName18" placeholder="ชื่อ-สกุล" style="width:350px;" name="responsible_name" value="<?=$rs->responsible_name?>"  />
    /
  <input type="text" class="form-control " id="exampleInputName18" placeholder="ตำแหน่ง" style="width:300px;" name="position" value="<?=$rs->position?>" />
  </span></td>
  </tr>
<tr>
  <th>โทรศัพท์ <span class="Txt_red_12">*</span> / มือถือ <span class="Txt_red_12">*</span> / e-mail <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " placeholder="โทรศัพท์" style="width:250px;" name="tel" value="<?=$rs->tel?>" /> /
    <input type="text" class="form-control " placeholder="มือถือ" style="width:250px;" name="mobile" value="<?=$rs->mobile?>" /> /
    <input type="text" class="form-control " placeholder="E – mail" style="width:250px;" name="email" value="<?=$rs->email?>" />
    </span></td>
</tr>
</table>

<h4 style="margin-top:30px;">รายละเอียดข้อมูลกิจกรรม <a class='inline' href="#inline_activity"><button type="submit" class="btn btn-warning"><img src="themes/elderly2016/images/document_add.png" width="16" height="16" /> เพิ่มกิจกรรม</button></a></h4>
<table class="tbSublist tbActivities">
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
  		<div><?=$expert->expert_name?></div>
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
  	<td><?=$act->budget?></td>
  </tr>
  <?endforeach;?>
  <?endif;?>
  </table>


<div id="btnBoxAdd">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>
</form>



<!-- This contains the hidden content for inline calls -->
<div style='display:none;'>
      <div id='inline_activity' style='padding:10px; background:#fff;'>
      <h3>บันทึกรายละเอียดกิจกรรม</h3>
      
      <table class="tbadd">
<tr>
  <th><span style="width:25%">ชื่อกิจกรรม<span class="Txt_red_12"> *</span></span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName3" placeholder="ชื่อกิจกรรม" style="width:500px;" name="activity_name" />
  </span></td>
</tr>
<tr>
  <th><span style="width:20%">ชื่อวิทยากรภูมิปัญญา<span class="Txt_red_12"> *</span></span></th>
  <td><span class="form-inline">
    <input class="inputExpert form-control" type="text" class="form-control " id="exampleInputName" placeholder="ชื่อวิทยากรภูมิปัญญา (auto complete)" style="width:500px;" name="expert_name" />
    <img id="addExpert" src="themes/elderly2016/images/add.png" width="16" height="16" class="vtip" title="เพิ่มชื่อวิทยากร" style="cursor: pointer;" /><span class="note">* ดึงข้อมูลจาก คปญ.01 ถ้ากรณีที่ไม่มีข้อมูลใน คปญ.01 ให้สามารถใส่ข้อมูลเองได้</span></span></td>
</tr>
<tr>
  <th><span style="width:25%">จำนวนผู้ได้รับประโยชน์ ชาย / หญิง<span class="Txt_red_12"> *</span></span></th>
  <td><span class="form-inline">
    <div style="margin-bottom:10px;">
    0-18  ปี 
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" name="b1m"/> /
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px; margin-right:30px;" name="b1f" />
    18-25 ปี
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" name="b2m" /> /
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px;" name="b2f" /></div>
    25-59 ปี
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" name="b3m" /> /
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px; margin-right:30px;" name="b3f" />
    60 ปีขึ้นไป
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" name="b4m" /> /
    <input type="number" min="0" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px;" name="b4f" />
    
  </span></td>
</tr>
<tr>
  <th>พื้นที่ดำเนินการ  </th>
  <td>
    <textarea name="area" rows="4" class="form-control" id="exampleInputName2" style="width:600px;" placeholder="รายละเอียดพื้นที่ดำเนินการ"></textarea>
    </td>
</tr>
<tr>
  <th>วันที่ดำเนินการ <span class="Txt_red_12"> *</span></th>
  <td>
    <div class="input-group date">
	  <input type="text" class="form-control datepickerTH" name="activity_date" data-date-language="th-th" value="<?=DB2Date($rs->activity_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div>
  </td>
  </tr>
<tr>
  <th>งบประมาณโครงการ/จำนวน<span class="Txt_red_12"> *</span></th>
  <td>
    <span class="form-inline"><input type="number" min="0" class="form-control " id="exampleInputName18" placeholder="จำนวน" style="width:250px;" name="budget" /> บาท </span>
  </td>
</tr>
</table>

<div id="btnBoxAdd">
  <input id="activityBtn" name="input" type="button" title="บันทึกกิจกรรม" value="บันทึกกิจกรรม" class="btn btn-primary"/>
</div>
      </div>
  </div>



<script>
$(document).ready(function(){
	// ดึงข้อมูลที่เลือกลงฟอร์มหลัก
	$('#activityBtn').click(function(){
		// ปิด colorbox
		$.colorbox.close();

		var activity_name = $(this).closest('#inline_activity').find('input[name=activity_name]').val();
		var b1m = $(this).closest('#inline_activity').find('input[name=b1m]').val();
		var b1f = $(this).closest('#inline_activity').find('input[name=b1f]').val();
		var b2m = $(this).closest('#inline_activity').find('input[name=b2m]').val();
		var b2f = $(this).closest('#inline_activity').find('input[name=b2f]').val();
		var b3m = $(this).closest('#inline_activity').find('input[name=b3m]').val();
		var b3f = $(this).closest('#inline_activity').find('input[name=b3f]').val();
		var b4m = $(this).closest('#inline_activity').find('input[name=b4m]').val();
		var b4f = $(this).closest('#inline_activity').find('input[name=b4f]').val();
		var total = parseInt(b1m)+parseInt(b1f)+parseInt(b2m)+parseInt(b2f)+parseInt(b3m)+parseInt(b3f)+parseInt(b4m)+parseInt(b4f);
		var area = $(this).closest('#inline_activity').find('textarea[name=area]').val();
		var activity_date = $(this).closest('#inline_activity').find('input[name=activity_date]').val();
		var budget = $(this).closest('#inline_activity').find('input[name=budget]').val();
		
		// วนลูปหา ชื่อวิทยากร
		var multiInput = '';
		var multiHiddenForm = '';
		$(".inputExpert").each(function() {
		   var expertName = $(this).val();
		   var dataTxt = '<div>'+expertName+'</div>';
		   multiInput += dataTxt;
		   
		   var dataForm = '<input type="hidden" name="expert_name" value="'+expertName+'">';
		   multiHiddenForm += dataForm;
		});
		
		var hiddenForm = "";
		hiddenForm += "<input type='hidden' name='activity_name[]' value='"+activity_name+"'>";
		hiddenForm += "<input type='hidden' name='b1m[]' value='"+b1m+"'>";
		hiddenForm += "<input type='hidden' name='b1f[]' value='"+b1f+"'>";
		hiddenForm += "<input type='hidden' name='b2m[]' value='"+b2m+"'>";
		hiddenForm += "<input type='hidden' name='b2f[]' value='"+b2f+"'>";
		hiddenForm += "<input type='hidden' name='b3m[]' value='"+b3m+"'>";
		hiddenForm += "<input type='hidden' name='b3f[]' value='"+b3f+"'>";
		hiddenForm += "<input type='hidden' name='b4m[]' value='"+b4m+"'>";
		hiddenForm += "<input type='hidden' name='b4f[]' value='"+b4f+"'>";
		hiddenForm += "<input type='hidden' name='area[]' value='"+area+"'>";
		hiddenForm += "<input type='hidden' name='activity_date[]' value='"+activity_date+"'>";
		hiddenForm += "<input type='hidden' name='budget[]' value='"+budget+"'>";
		
		var txtInsert = "";
		txtInsert += '<tr class="box">';
		txtInsert += '<td></td>';
		txtInsert += '<td>'+activity_name+'</td>';
		txtInsert += '<td>'+multiInput+'</td>';
		txtInsert += '<td>'+b1m+'</td>';
		txtInsert += '<td>'+b1f+'</td>';
		txtInsert += '<td>'+b2m+'</td>';
		txtInsert += '<td>'+b2f+'</td>';
		txtInsert += '<td>'+b3m+'</td>';
		txtInsert += '<td>'+b3f+'</td>';
		txtInsert += '<td>'+b4m+'</td>';
		txtInsert += '<td>'+b4f+'</td>';
		txtInsert += '<td>'+total+'</td>';
		txtInsert += '<td>'+area+'</td>';
		txtInsert += '<td>'+activity_date+'</td>';
		txtInsert += '<td>'+budget+hiddenForm+multiHiddenForm+'</td>';
		txtInsert += '</tr>';
		
		
		console.log(hiddenForm);
		
		$('.tbActivities tr:last').after(txtInsert);

		// เคลียร์ค่า input ของฟอร์มใน colorbox
		$(this).closest('#inline_activity').find("input[type=text], input[type=number], textarea").val("");

		// คำนวนใส่ตัวเลขแถว
		autoCountTableRow('tbActivities');
	});
	
	// เพิ่มวิทยากร
	$('#addExpert').click(function(){
		$('.inputExpert:last').after('<br><input class="inputExpert form-control" type="text" placeholder="ชื่อวิทยากรภูมิปัญญา (auto complete)" style="width:500px;" name="expert_name"/>');
	});
	
	// submit button
	$('input[type=submit]').click(function(){
		$("form input[name=expert_name]").each(function(){
			$(this).attr('name','expert_name['+ $('form .box').index($(this).closest('.box')) +'][]');
		})
	});
});

// นับจำนวนใส่ตัวเลขหน้าแถว
function autoCountTableRow(tbClassName){
	// add Table Class Name "autocount"
	$('.'+tbClassName+' tr td:first-child').each(function(i){
		// $(this).before('<td>'+(i+1)+'</td>');
		$(this).html('');
		$(this).append((i+1));
	});
}
</script>