<h3>ประวัติคลังปัญญาผู้สูงอายุ (คปญ.1)</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อ - สกุล">
  </div>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกจังหวัดที่ขึ้นทะเบียน --</option>
  </select>
  <div style="margin:5px 0;">
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกจังหวัด --</option>
  </select>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกอำเภอ --</option>
  </select>
  <select name="" class="form-control" style="width:200px;">
    <option>-- ทุกตำบล --</option>
  </select>
  <button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />ค้นหา</button>
  </div>
  <div style="margin-bottom:5px;"><span>
    <input type="checkbox" name="checkbox" id="checkbox" />
    การศึกษา</span> <span>
<input type="checkbox" name="checkbox2" id="checkbox2" />
การแพทย์และสาธารณสุข</span> <span>
<input type="checkbox" name="checkbox3" id="checkbox3" />
การเกษตร</span> <span>
<input type="checkbox" name="checkbox4" id="checkbox4" />
ทรัพยากรธรรมชาติและสิ่งแวดล้อม</span> <span>
<input type="checkbox" name="checkbox" id="checkbox" />
วิทยาศาสตร์และเทคโนโลยี</span> <span>
<input type="checkbox" name="checkbox" id="checkbox" />
วิศวกรรม</span> <span>
<input type="checkbox" name="checkbox" id="checkbox" />
สถาปัตยกรรม</span><span>
<input type="checkbox" name="checkbox5" id="checkbox5" />
พัฒนาสังคม สังคมสงเคราะห์  จัดสวัสดิการชุมชนฯ</span> <span>
<input type="checkbox" name="checkbox5" id="checkbox6" />
กฎหมาย</span> <span>
<input type="checkbox" name="checkbox5" id="checkbox7" />
การเมืองการปกครอง</span> <span>
<input type="checkbox" name="checkbox5" id="checkbox7" />
ศิลปะ วัฒนธรรม ประเพณี</span> <span>
<input type="checkbox" name="checkbox5" id="checkbox7" />
ศาสนา จริยธรรม </span><span>
<input type="checkbox" name="checkbox6" id="checkbox8" />
พาณิชย์และบริการ</span> <span>
<input type="checkbox" name="checkbox6" id="checkbox9" />
ความมั่นคง</span> <span>
<input type="checkbox" name="checkbox6" id="checkbox9" />
บริหารจัดการและบริหารธุรกิจ</span> <span>
<input type="checkbox" name="checkbox6" id="checkbox9" />
การประชาสัมพันธ์</span><span>
<input type="checkbox" name="checkbox7" id="checkbox10" />
คมนาคมและการสื่อสาร</span> <span>
<input type="checkbox" name="checkbox7" id="checkbox10" />
พลังงาน</span><span>
<input type="checkbox" name="checkbox7" id="checkbox11" />
ต่างประเทศ</span> <span>
<input type="checkbox" name="checkbox7" id="checkbox12" />
อุตสาหกรรม  หัตถกรรม  จักสารและโอท็อป</span> <span>
<input type="checkbox" name="checkbox7" id="checkbox12" />
ภาษา  วรรณคดี  วรรณศิลป์</span> <span>
<input type="checkbox" name="checkbox7" id="checkbox12" />
วาทศิลป์</span>
<input type="checkbox" name="checkbox8" id="checkbox13" />
อื่น  ๆ </div>
  
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มโครงการ" value="เพิ่มรายการ" onclick="document.location='<?=basename($_SERVER['PHP_SELF'])?>?act=form'" class="btn btn-warning vtip" />
</div>

<div class="paginationTG">
	<ul>
    <li style="margin-right:10px;">หน้าที่</li>
	<li class="currentpage">1</li><li ><a href=''>2</a></li>
	<li><a href="">3</a></li>
	<li><a href="">4</a></li>
	<li><a href="">5</a></li>
	<li><a href="">6</a></li>
	<li><a href="">7</a></li> . . . <li ><a href="">19</a></li>
	<li><a href="">20</a></li><li ><a href="">21</a></li>
	</ul>
</div>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ว/ด/ป ที่ขึ้นทะเบียน</th>
  <th>จังหวัด</th>
  <th style="width:20%">ชื่อ-สกุล</th>
  <th>อายุ</th>
  <th>ความเชี่ยวชาญ</th>
  <th style="width:35%">ข้อมูลติดต่อ</th>
  <th>จัดการ</th>
  </tr>
<tr>
  <td>1</td>
  <td>10/05/2555</td>
  <td>ลำพูน</td>
  <td>นางเครือน้อย ใจกล้า</td>
  <td>70</td>
  <td><img src="images/star.png" width="32" height="32" class="vtip" title="1.การแพทย์และสาธารณสุข <br> 2.วิทยาศาสตร์และเทคโนโลยี <br> 3.ศาสนา จริยธรรม" /></td>
  <td>691 หมู่ 24 ถนนดอยเขาควาย ตำบลรอบเวียง อำเภอเมือง เชียงราย 57000<br />
    0-5375-6032</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td class="odd cursor">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td>&nbsp;</td>
  <td class="odd cursor">&nbsp;</td>
  <td class="odd cursor">&nbsp;</td>
  <td class="odd cursor"><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td class="odd cursor">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>5</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
</table>

<div class="paginationTG">
	<ul>
    <li style="margin-right:10px;">หน้าที่</li>
	<li class="currentpage">1</li><li ><a href=''>2</a></li>
	<li><a href="">3</a></li>
	<li><a href="">4</a></li>
	<li><a href="">5</a></li>
	<li><a href="">6</a></li>
	<li><a href="">7</a></li> . . . <li ><a href="">19</a></li>
	<li><a href="">20</a></li><li ><a href="">21</a></li>
  </ul>
</div>