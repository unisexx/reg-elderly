<h3>สำนัก / กอง (เพิ่ม / แก้ไข)</h3>
<table class="tbadd">
<tr>
  <th>ชื่อกลุ่ม / ฝ่าย<span class="Txt_red_12"> *</span></th>
  <td>
    <input type="text" class="form-control" id="exampleInputName" placeholder="ชื่อสำนัก / กอง" style="width:500px;" />
</td>
</tr>
<tr>
  <th>สำนัก / กอง<span class="Txt_red_12"> *</span></th>
  <td>
    <select name="select2" class="form-control" style="width:auto;">
      <option selected="selected">+ เลือกกอง +</option>
      <option>กองยุทธศาสตร์และแผนงาน</option>
    </select>
</td>
</tr>
<tr>
  <th>เปิด / ปิดการใช้งาน</th>
  <td><input name="checkbox" type="checkbox" id="checkbox" checked="checked" />
    เปิดใช้งาน</td>
</tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>