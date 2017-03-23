<?php
Class ajax extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function get_select_reg_amphur(){
		if($_GET){
			echo form_dropdown('reg_amphur_id', get_option('code','name','amphur where province_id = '.$_GET['province_id'].' order by name asc'), @$_GET['amphur_id'],'class="form-control" style="width:auto;"','+ เลือกอำเภอ +');
		}
	}

	function get_select_reg_district(){
		if($_GET){
			echo form_dropdown('reg_district_id', get_option('code','name','district where province_id = '.$_GET['province_id'].' and amphur_id = '.$_GET['amphur_id'].' order by name asc'), @$_GET['district_id'],'class="form-control" style="width:auto;"','+ เลือกตำบล +');
		}
	}

	function get_select_now_amphur(){
		if($_GET){
			echo form_dropdown('now_amphur_id', get_option('code','name','amphur where province_id = '.$_GET['province_id'].' order by name asc'), @$_GET['amphur_id'],'class="form-control" style="width:auto;"','+ เลือกอำเภอ +');
		}
	}

	function get_select_now_district(){
		if($_GET){
			echo form_dropdown('now_district_id', get_option('code','name','district where province_id = '.$_GET['province_id'].' and amphur_id = '.$_GET['amphur_id'].' order by name asc'), @$_GET['district_id'],'class="form-control" style="width:auto;"','+ เลือกตำบล +');
		}
	}

	function get_select_project(){
		if($_GET){
			$condition = " 1=1 ";
			if((@$_GET['budget_year'] != "false") && (@$_GET['budget_year'] != "")){ $condition .= ' and budget_year = '.$_GET['budget_year']; }
			if((@$_GET['province_id'] != "false") && (@$_GET['province_id'] != "")){
				 $condition .= ' and province_id = '.$_GET['province_id'];
			}else{
				$condition .= !is_admin()? " and province_id = ".user_login()->province_id : "" ;
			}

			echo @form_dropdown('project_id', get_option('id','name','projects where '.$condition.' order by name asc'), @$_GET['project_id'],'class="form-control" style="width:auto;"','-- เลือกโครงการ --');
		}
	}

	function calAge(){
		if($_GET){
			echo calculate_age('00','00',$_GET['birth_year']);
		}
	}

	function get_expert_name_autocomplete(){
		// if($_GET){
			// ให้ where เฉพาะจังหวัดของตัวเอง
			$condition = !is_admin()? " where regis_province_id = ".user_login()->province_id : "" ;

			$sql = 'select id,name from histories '.@$condition;
			$rs = $this->db->query($sql)->result();
			$rows = array();
			foreach($rs as $item){
				$rows[] = array('id' => $item->id,'name' => $item->name);
			}
			print json_encode($rows);
		// }
	}

	function delete_activity($id){
		if($id){
			$expert = new expert();
			$expert->where('activity_id', $id)->get();
			$expert->delete_all();

			$rs = new activity($id);
			$rs->delete();
		}
	}

	function delete_plan_activity($id){
		if($id){
			$rs = new plan_activity($id);
			$rs->delete();
		}
	}

	function check_id_card(){
      $rs = new history();
      $rs->get_by_id_card($_GET['id_card']);

			if($_GET['id'] != ""){ //ถ้าเป็นเคสแก้ไข
				$rs2 = new history(@$_GET['id']);
				if($rs2->id_card == $rs->id_card){ // ถ้าไอดีที่แก้ไขมีเลขประชาชนตรงกับเลขในฟอร์ม(ไอดีตัวเอง) ให้ผ่าน
					echo "true";
				}else{
					echo "false";
				}
			}else{
				echo ($rs->id_card)?"false":"true";
			}

      // echo ($rs->id_card)?"false":"true";
			// if($_GET['id'] != ""){ // ถ้า user ไม่เปลี่ยนอีเมล์
			// 	echo "true";
			// }else{
			// 	echo ($rs->id_card)?"false":"true";
			// }
  }
}
?>
