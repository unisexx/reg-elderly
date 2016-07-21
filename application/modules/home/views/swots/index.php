<h3>ตารางวิเคราะห์ SWOT (คปญ. 3)</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
    <select name="budget_year" class="form-control" style="width:170px">
      <option value="">-- เลือกปีงบประมาณ --</option>
	  <?php 
		for ($x = (date("Y")+543); $x >= 2550; $x--) {
			$selected_year = ($x == $_GET['budget_year'])?"selected=selected":"";
		    echo "<option value='$x' $selected_year>$x</option>";
		} 
	  ?>
    </select>
    <?=form_dropdown('province_id',get_option('id','name','province '.select_province_condition().' order by name asc'),@$_GET['province_id'],'class="form-control" style="width:180px;"','-- เลือกจังหวัด --');?>
    <span id="project" style="width: auto !important;">
    	<?=form_dropdown('project_id',get_option('id','name','projects '.select_province_condition("province_id").' order by name asc'),@$_GET['project_id'],'class="form-control" style="width:180px;"','-- เลือกโครงการ --');?>
    </span>
  <button type="submit" class="btn btn-info"><img src="themes/elderly2016/images/search.png" width="16" height="16" />ค้นหา</button>
</form>
</div>
</div>


<?if(@$_GET['project_id']):?>

<div id="btnBox">
  <input type="button" title="เพิ่มรายงาน คปญ.03 ตารางวิเคราะห์ SWOT" value="เพิ่มรายงาน คปญ.03" onclick="document.location='home/swots/form/<?=$project->id?>'" class="btn btn-warning vtip" />
</div>


<h4 style="margin-bottom:20px; color:#630"><span style="color:#666">SWOT :</span> <?=$project->name?> 
<span style="color:#666">ปีงบประมาณ :</span> <?=$project->budget_year?> <span style="color:#666">จังหวัด :</span> <?=get_province_name($project->province_id)?></h4>

<?=$rs->pagination();?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>จุดแข็ง(strengths)</th>
  <th>จุดอ่อน(weaknesses)</th>
  <th>โอกาส(opportunities)</th>
  <th>อุปสรรค(Threats)</th>
  <th>สรุปบทเรียน/แนวทางการแก้ไขดำเนินให้เกิดความยั่งยืน</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->strengths?></td>
	  <td><?=$row->weaknesses?></td>
	  <td><?=$row->opportunities?></td>
	  <td><?=$row->threats?></td>
	  <td><?=$row->summary?></td>
	  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=print"><img src="themes/elderly2016/images/print.png" width="24" height="24" class="vtip" title="พิมพ์รายการนี้"  style="margin-right:10px;"  /></a><a href="home/swots/form/<?=$row->project_id?>/<?=$row->id?>"><img src="themes/elderly2016/images/edit.png" width="24" height="24" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="home/swots/delete/<?=$row->id?>"><img src="themes/elderly2016/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้" onclick="return confirm('<?php echo "ยืนยันการลบ?";?>')"  /></a></td>
	  </tr>
  <?endforeach;?>
</table>

<?=$rs->pagination();?>

<?endif;?>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("select[name=budget_year]").change(function() {
	  	var budget_year = $(this).val();
	  	var province_id = $('select[name=province_id]').val();
	  	get_select_project(budget_year,province_id);
	});
	
	$("select[name=province_id]").change(function() {
	  	var budget_year = $('select[name=budget_year]').val();
	  	var province_id = $(this).val();
	  	get_select_project(budget_year,province_id);
	});
});

<?if(@$_GET['budget_year'] != "" && @$_GET['province_id'] != ""):?>
var budget_year = '<?=$_GET['budget_year']?>';
var province_id = '<?=$_GET['province_id']?>';
var project_id = '<?=$_GET['project_id']?>';
get_select_project(budget_year,province_id,project_id);
<?endif;?>

function get_select_project(budget_year=false,province_id=false,project_id=false){
	$.get('home/ajax/get_select_project',{
		'budget_year' : budget_year,
		'province_id' : province_id,
		'project_id' : project_id
	},function(data){
		$("#project").html(data);
	});
}
</script>