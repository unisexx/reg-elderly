<h3>แผนการดำเนินงาน (คปญ. 4) [เพิ่ม/แก้ไข]</h3>

<form method="post" action="home/plans/save/<?=$rs->id?>">
	
<table class="tbadd">
  <tr>
    <th>ปีงบประมาณ <span class="Txt_red_12">*</span></th>
    <td>
    	<select name="budget_year" class="form-control" style="width:auto;">
	      <option>+ เลือกปีงบประมาณ +</option>
		  <?php 
			for ($x = (date("Y")+543); $x >= 2550; $x--) {
				$selected_year = ($x == $rs->budget_year)?"selected=selected":"";
			    echo "<option value='$x' $selected_year>$x</option>";
			} 
		  ?>
	    </select>
    </td>
  </tr>
  <tr>
    <th> หน่วยงาน <span class="Txt_red_12">*</span></th>
    <td>
    	<?=form_dropdown('user_id',get_option('id','name','users '.select_province_condition("province_id").' order by name asc'),@$rs->user_id,'class="form-control" style="width:auto;"','+ เลือกหน่วยงาน +');?>
    </td>
  </tr>
<tr>
  <th>ผู้แจ้งข้อมูล  <span class="Txt_red_12">*</span> / โทรศัพท์  <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control" placeholder="ชื่อผู้แจ้งข้อมูล" style="width:300px;" name="name"  value="<?=$rs->name?>"/>
    /
  <input type="text" class="form-control" placeholder="โทรศัพท์" style="width:250px;" name="tel" value="<?=$rs->tel?>"/>
  </span></td>
  </tr>
</table>


<div style="margin-left:20%;">
<h4 style="margin-top:20px;">รายละเอียดข้อมูลกิจกรรม <a class='inline' href="#inline_activity"><button type="submit" class="btn btn-warning"><img src="themes/elderly2016/images/document_add.png" width="16" height="16" /> เพิ่มกิจกรรม</button></a></h4>
<table class="tbSublist tbActivities">
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
  	<td><?=$act->budget?></td>
  	<td><?=$act->product?></td>
  	<td><?=$act->result?></td>
  </tr>
  <?endforeach;?>
  <?endif;?>
  </table>
</div>

<div id="btnBoxAdd">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>



<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
      <div id='inline_activity' style='padding:10px; background:#fff;'>
      <h3>บันทึกรายละเอียดกิจกรรม</h3>
      
      <table class="tbadd">
<tr>
  <th><span style="width:25%">ชื่อกิจกรรม  <span class="Txt_red_12">*</span></span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control" placeholder="ชื่อกิจกรรม" style="width:500px;" name="activity_name" />
  </span></td>
</tr>
<tr>
  <th><span style="width:30%">กลุ่มเป้าหมาย/พื้นที่</span>   <span class="Txt_red_12">*</span></th>
  <td>
    <textarea name="area" rows="4" class="form-control" style="width:600px;" placeholder="รายละเอียดกลุ่มเป้าหมาย/พื้นที่"></textarea>
    </td>
</tr>
<tr>
  <th><span style="width:10%">วัน/เดือน/ปี</span></th>
  <td>
  	<span class="form-inline">
    <div class="input-group date">
	  <input type="text" class="form-control datepickerTH" name="activity_date" data-date-language="th-th" value=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div>
    </span>
  </td>
  </tr>
<tr>
  <th>งบประมาณ  <span class="Txt_red_12">*</span></th>
  <td>
    <span class="form-inline"><input type="number" min="0" class="form-control" placeholder="จำนวน" style="width:250px;" name="budget" /> บาท </span>
  </td>
</tr>
<tr>
  <th>ผลผลิต</th>
  <td><textarea name="product" rows="4" class="form-control" style="width:600px;" placeholder="รายละเอียดผลผลิต"></textarea></td>
</tr>
<tr>
  <th>ผลลัพธ์</th>
  <td><textarea name="result" rows="4" class="form-control" style="width:600px;" placeholder="รายละเอียดผลลัพธ์"></textarea></td>
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
		var area = $(this).closest('#inline_activity').find('textarea[name=area]').val();
		var activity_date = $(this).closest('#inline_activity').find('input[name=activity_date]').val();
		var budget = $(this).closest('#inline_activity').find('input[name=budget]').val();
		var product = $(this).closest('#inline_activity').find('textarea[name=product]').val();
		var result = $(this).closest('#inline_activity').find('textarea[name=result]').val();
		
		var hiddenForm = "";
		hiddenForm += "<input type='hidden' name='activity_name[]' value='"+activity_name+"'>";
		hiddenForm += "<input type='hidden' name='area[]' value='"+area+"'>";
		hiddenForm += "<input type='hidden' name='activity_date[]' value='"+activity_date+"'>";
		hiddenForm += "<input type='hidden' name='budget[]' value='"+budget+"'>";
		hiddenForm += "<input type='hidden' name='product[]' value='"+product+"'>";
		hiddenForm += "<input type='hidden' name='result[]' value='"+result+"'>";
		
		var txtInsert = "";
		txtInsert += '<tr class="box">';
		txtInsert += '<td></td>';
		txtInsert += '<td>'+activity_name+'</td>';
		txtInsert += '<td>'+area+'</td>';
		txtInsert += '<td>'+activity_date+'</td>';
		txtInsert += '<td>'+budget+'</td>';
		txtInsert += '<td>'+product+'</td>';
		txtInsert += '<td>'+result+hiddenForm+'</td>';
		txtInsert += '</tr>';
		
		// console.log(hiddenForm);
		
		$('.tbActivities tr:last').after(txtInsert);

		// เคลียร์ค่า input ของฟอร์มใน colorbox
		$(this).closest('#inline_activity').find("input[type=text], input[type=number], textarea").val("");

		// คำนวนใส่ตัวเลขแถว
		autoCountTableRow('tbActivities');
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