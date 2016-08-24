<div class="printpage">
<div style="text-align:right;">
<p>แบบ คปญ. ๓</p>
</div>

<div style="font-size:24px; text-align:center">ตารางวิเคราะห์ SWOT (SWOT ANALTYSIS)</div>
<div style="font-size:24px; text-align:center"><?=$project->name?> ปีงบประมาณ : <?=$_GET['budget_year']?> จังหวัด : <?=get_province_name($_GET['province_id'])?></div>

<table class="tblistReport" border="1">
<tr>
<th>ลำดับ</th>
<th>จุดแข็ง (strengths)</th>
<th>จุดอ่อน (weaknesses)</th>
<th>โอกาส (opportunities)</th>
<th>อุปสรรค (Threats)</th>
<th>สรุปบทเรียน/แนวทางการแก้ไขดำเนินให้เกิดความยั่งยืน</th>
</tr>
<?foreach($rs as $key=>$row):?>
  <tr>
	  <td><?=($key+1)?></td>
	  <td><?=$row->strengths?></td>
	  <td><?=$row->weaknesses?></td>
	  <td><?=$row->opportunities?></td>
	  <td><?=$row->threats?></td>
	  <td><?=$row->summary?></td>
	</tr>
  <?endforeach;?>
</table>


<?if(@$_GET['type'] == ""):?>
<div align="right"><a href="home/swots/view?budget_year=<?=$_GET['budget_year']?>&province_id=<?=$_GET['province_id']?>&project_id=<?=$_GET['project_id']?>&type=word">word</a> | <a href="home/swots/view/<?=$rs->id?>?budget_year=<?=$_GET['budget_year']?>&province_id=<?=$_GET['province_id']?>&project_id=<?=$_GET['project_id']?>&type=excel">excel</a></div>
<?endif;?>

</div><!--printpage-->