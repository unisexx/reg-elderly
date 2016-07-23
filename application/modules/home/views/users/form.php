<h3>ผู้ใช้งาน (เพิ่ม / แก้ไข)</h3>

<form method="post" action="home/users/save/<?=$rs->id?>">
<table class="tbadd">
<tr>
  <th>ชื่อผู้ใช้งาน<span class="Txt_red_12"> *</span></th>
  <td><input name="name" type="text" class="form-control" id="textarea7" value="<?=$rs->name?>" style="width:500px;"/></td>
</tr>
<tr>
  <th>จังหวัด<span class="Txt_red_12"> *</span></th>
  <td>
	<?=form_dropdown('province_id',get_option('id','name','province order by name asc'),@$rs->province_id,'class="form-control" style="width:auto;"','+ เลือกจังหวัด +');?>
</td>
</tr>
<tr>
  <th>isAdmin</th>
  <td><input type="checkbox" name="is_admin" id="checkbox" value="1" <?=$rs->is_admin == 1 ? 'checked="checked"' : '' ;?> /></td>
</tr>
<tr>
  <th>อีเมล์</th>
  <td><input name="email" type="text" class="form-control" id="textarea2" value="<?=$rs->email?>" style="width:400px;"/></td>
</tr>
<tr>
  <th>Username<span class="Txt_red_12"> *</span></th>
  <td><input name="username" type="text" class="form-control" id="textarea4" value="<?=$rs->username?>" style="width:200px;"/></td>
</tr>
<tr>
  <th>รหัสผ่าน<span class="Txt_red_12"> *</span></th>
  <td><input name="password" type="text" class="form-control" id="inputPass" value="<?=$rs->password?>" style="width:200px;"/></td>
</tr>
<tr>
  <th>ยืนยันรหัสผ่าน<span class="Txt_red_12"> *</span></th>
  <td><input name="_password" type="text" class="form-control" id="textarea5" value="" style="width:200px;"/></td>
</tr>
<tr>
  <th>เปิด / ปิดการใช้งาน</th>
  <td><input name="status" type="checkbox" id="checkbox2" value="1" <?=$rs->status == 1 ? 'checked="checked"' : '' ;?>/></td>
</tr>
</table>
<div id="btnBoxAdd">
  <?php echo form_current() ?>
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>
</form>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("form").validate({
	    rules: 
	    {
	    	name:{required: true},
	        username:{required: true},
	        province_id:{required: true},
	        password: 
	        {
	            required: true,
	            minlength: 4
	        },
	        _password:
	        {
	            equalTo: "#inputPass"
	        }
	    },
	    messages:
	    {
	    	name:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
	        username:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
	        province_id:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
	        password: 
	        {
	            required: "กรุณากรอกรหัสผ่าน",
	            minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร"
	        },
	        _password:
	        {
	            equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่อง"
	        }
	    }
    });
});
</script>