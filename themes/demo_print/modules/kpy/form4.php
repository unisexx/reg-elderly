<h3>แผนการดำเนินงาน (คปญ. 4) [เพิ่ม/แก้ไข]</h3>

<table class="tbadd">
  <tr>
    <th>หน่วยงาน  <span class="Txt_red_12">*</span></th>
    <td>
      <select name="select3" class="form-control" style="width:auto;">
        <option selected="selected">+ เลือกหน่วยงาน +</option>
        <option>สํานักงานพัฒนาสังคมและความมั่นคงของมนุษย์จังหวัดปทุมธานี</option>
      </select>
    </td>
  </tr>
<tr>
  <th>ผู้แจ้งข้อมูล  <span class="Txt_red_12">*</span> / โทรศัพท์  <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName18" placeholder="ชื่อผู้แจ้งข้อมูล" style="width:300px;" />
    /
  <input type="text" class="form-control " id="exampleInputName18" placeholder="โทรศัพท์" style="width:250px;" />
  </span></td>
  </tr>
</table>


<div style="margin-left:20%;">
<h4 style="margin-top:20px;">รายละเอียดข้อมูลกิจกรรม <a class='inline' href="#inline_activity"><button type="submit" class="btn btn-warning"><img src="images/document_add.png" width="16" height="16" /> เพิ่มกิจกรรม</button></a></h4>
<table class="tbSublist">
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
  <tr>
  <td>1</td>
  <td>aa</td>
  <td>aa</td>
  <td>11/06/2559</td>
  <td>35,000</td>
  <td>a</td>
  <td>a</td>
  </tr>
  <tr>
    <td>2</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
</div>

<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>



<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
      <div id='inline_activity' style='padding:10px; background:#fff;'>
      <h3>บันทึกรายละเอียดกิจกรรม</h3>
      
      <table class="tbadd">
<tr>
  <th><span style="width:25%">ชื่อกิจกรรม  <span class="Txt_red_12">*</span></span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName3" placeholder="ชื่อกิจกรรม" style="width:500px;" />
  </span></td>
</tr>
<tr>
  <th><span style="width:30%">กลุ่มเป้าหมาย/พื้นที่</span>   <span class="Txt_red_12">*</span></th>
  <td>
    <textarea name="exampleInputName2" rows="4" class="form-control " id="exampleInputName2" style="width:600px;" placeholder="รายละเอียดกลุ่มเป้าหมาย/พื้นที่"></textarea>
    </td>
</tr>
<tr>
  <th><span style="width:10%">วัน/เดือน/ปี</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control" id="exampleInputName12" value="" style="width:120px;" />
    <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
  </tr>
<tr>
  <th>งบประมาณ  <span class="Txt_red_12">*</span></th>
  <td>
    <span class="form-inline"><input type="text" class="form-control " id="exampleInputName18" placeholder="จำนวน" style="width:250px;" /> บาท </span>
  </td>
</tr>
<tr>
  <th>ผลผลิต</th>
  <td><textarea name="exampleInputName" rows="4" class="form-control " id="exampleInputName" style="width:600px;" placeholder="รายละเอียดผลผลิต"></textarea></td>
</tr>
<tr>
  <th>ผลลัพธ์</th>
  <td><textarea name="exampleInputName3" rows="4" class="form-control " id="exampleInputName4" style="width:600px;" placeholder="รายละเอียดผลลัพธ์"></textarea></td>
</tr>
      </table>

<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึกกิจกรรม" value="บันทึกกิจกรรม" class="btn btn-primary"/>
</div>
      </div>
  </div>



