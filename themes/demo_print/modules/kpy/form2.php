<h3>รายงานผลการดำเนินงานโครงการ (คปญ. 2) [เพิ่ม/แก้ไข]</h3>

<table class="tbadd">
<tr>
  <th>ปีงบประมาณ <span class="Txt_red_12">*</span></th>
  <td>
    <select name="select" class="form-control" style="width:auto;">
      <option>+ เลือกปีงบประมาณ +</option>
    </select>
</td>
</tr>
<tr>
  <th>โครงการ <span class="Txt_red_12">*</span> / จังหวัด <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName" placeholder="โครงการ" style="width:500px;" /> 
    /
<select name="select5" class="form-control" style="width:auto;">
    <option>+ เลือกจังหวัด +</option>
  </select>
  </span></td>
</tr>
<tr>
  <th>ขั้นตอนการติดตามรายงานผลการดำเนินงาน  </th>
  <td>
    <textarea name="exampleInputName2" rows="4" class="form-control " id="exampleInputName2" style="width:600px;" placeholder="รายละเอียด"></textarea>
    </td>
</tr>
<tr>
  <th>ผู้รับผิดชอบโครงการ  <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName18" placeholder="ชื่อ-สกุล" style="width:350px;" />
    /
  <input type="text" class="form-control " id="exampleInputName18" placeholder="ตำแหน่ง" style="width:300px;" />
  </span></td>
  </tr>
<tr>
  <th>โทรศัพท์ <span class="Txt_red_12">*</span> / มือถือ <span class="Txt_red_12">*</span> / e-mail <span class="Txt_red_12">*</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName18" placeholder="โทรศัพท์" style="width:250px;" /> /
    <input type="text" class="form-control " id="exampleInputName18" placeholder="มือถือ" style="width:250px;" /> /
    <input type="text" class="form-control " id="exampleInputName18" placeholder="E – mail" style="width:250px;" />
    </span></td>
</tr>
</table>

<h4 style="margin-top:30px;">รายละเอียดข้อมูลกิจกรรม <a class='inline' href="#inline_activity"><button type="submit" class="btn btn-warning"><img src="images/document_add.png" width="16" height="16" /> เพิ่มกิจกรรม</button></a></h4>
<table class="tbSublist">
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
  <tr>
  <td>1</td>
  <td>กิจกรรม abc</td>
  <td>นางสาวสุภาวดี  เมธาวรากร<br />
    นางสาวชลลดา  วินิจฉัยกุล</td>
  <td>10</td>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
  <td>38</td>
  <td>nononononono nonononono</td>
  <td>07/05/2559</td>
  <td>50,000</td>
  </tr>
  <tr>
    <td>2</td>
    <td>กิจกรรม xyz</td>
    <td>นายสมบัติ  บุญสุทัศน์</td>
    <td>-</td>
    <td>-</td>
    <td>17</td>
    <td>8</td>
    <td>-</td>
    <td>2</td>
    <td>-</td>
    <td>10</td>
    <td>37</td>
    <td>nononononono nonononono</td>
    <td>17/05/2559</td>
    <td>97,000</td>
  </tr>
  </table>


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
  <th><span style="width:25%">ชื่อกิจกรรม<span class="Txt_red_12"> *</span></span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName3" placeholder="ชื่อกิจกรรม" style="width:500px;" />
  </span></td>
</tr>
<tr>
  <th><span style="width:20%">ชื่อวิทยากรภูมิปัญญา<span class="Txt_red_12"> *</span></span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control " id="exampleInputName" placeholder="ชื่อวิทยากรภูมิปัญญา" style="width:500px;" />
    <img src="images/add.png" width="16" height="16" class="vtip" title="เพิ่มชื่อวิทยากร" /></span></td>
</tr>
<tr>
  <th><span style="width:25%">จำนวนผู้ได้รับประโยชน์ ชาย / หญิง<span class="Txt_red_12"> *</span></span></th>
  <td><span class="form-inline">
    <div style="margin-bottom:10px;">
    0-18  ปี 
    <input type="text" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" /> /
    <input type="text" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px; margin-right:30px;" />
    18-25 ปี
    <input type="text" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" /> /
    <input type="text" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px;" /></div>
    25-59 ปี
    <input type="text" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" /> /
    <input type="text" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px; margin-right:30px;" />
    60 ปีขึ้นไป
    <input type="text" class="form-control " id="exampleInputName4" placeholder="ชาย" style="width:100px;" /> /
    <input type="text" class="form-control " id="exampleInputName4" placeholder="หญิง" style="width:100px;" />
    
  </span></td>
</tr>
<tr>
  <th>พื้นที่ดำเนินการ  </th>
  <td>
    <textarea name="exampleInputName2" rows="4" class="form-control " id="exampleInputName2" style="width:600px;" placeholder="รายละเอียดพื้นที่ดำเนินการ"></textarea>
    </td>
</tr>
<tr>
  <th>วันที่ดำเนินการ <span class="Txt_red_12"> *</span></th>
  <td><span class="form-inline">
    <input type="text" class="form-control" id="exampleInputName12" value="" style="width:120px;" />
    <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
  </tr>
<tr>
  <th>งบประมาณโครงการ/จำนวน<span class="Txt_red_12"> *</span></th>
  <td>
    <span class="form-inline"><input type="text" class="form-control " id="exampleInputName18" placeholder="จำนวน" style="width:250px;" /> บาท </span>
  </td>
</tr>
</table>

<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึกกิจกรรม" value="บันทึกกิจกรรม" class="btn btn-primary"/>
</div>
      </div>
  </div>



