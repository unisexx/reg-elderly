<h3>ตารางวิเคราะห์ SWOT (คปญ. 3) [เพิ่ม/แก้ไข]</h3>

<h4 style="margin-bottom:20px; color:#630"><span style="color:#666">SWOT :</span> <?=$project->name?> 
<span style="color:#666">ปีงบประมาณ :</span> <?=$project->budget_year?> <span style="color:#666">จังหวัด :</span> <?=get_province_name($project->province_id)?></h4>

<form method="post" action="home/swots/save/<?=$project->id?>/<?=$rs->id?>">
	
<table class="tbadd">
<tr>
  <th>จุดแข็ง (strengths)  </th>
  <td>
    <textarea name="strengths" rows="4" class="form-control " id="exampleInputName2" style="width:600px;" placeholder="รายละเอียด"><?=$rs->strengths?></textarea>
    </td>
</tr>
<tr>
  <th>จุดอ่อน (weaknesses)</th>
  <td><textarea name="weaknesses" rows="4" class="form-control " id="exampleInputName5" style="width:600px;" placeholder="รายละเอียด"><?=$rs->weaknesses?></textarea></td>
</tr>
<tr>
  <th>โอกาส (opportunities)</th>
  <td><textarea name="opportunities" rows="4" class="form-control " id="exampleInputName6" style="width:600px;" placeholder="รายละเอียด"><?=$rs->opportunities?></textarea></td>
</tr>
<tr>
  <th>อุปสรรค (Threats)</th>
  <td><textarea name="threats" rows="4" class="form-control " id="exampleInputName7" style="width:600px;" placeholder="รายละเอียด"><?=$rs->threats?></textarea></td>
</tr>
<tr>
  <th>สรุปบทเรียน / แนวทางการแก้ไขดำเนินให้เกิดความยั่งยืน</th>
  <td><textarea name="summary" rows="4" class="form-control " id="exampleInputName8" style="width:600px;" placeholder="รายละเอียด"><?=$rs->summary?></textarea></td>
</tr>
</table>


<div id="btnBoxAdd">
  <input type="hidden" name="project_id" value="<?=$project->id?>">
  <input type="hidden" name="budget_year" value="<?=$project->budget_year?>">
  <input type="hidden" name="province_id" value="<?=$project->province_id?>">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>