<?php
Class ajax extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_select_reg_amphur(){
		if($_GET){
			echo form_dropdown('reg_amphur_id', get_option('id','name','amphur where province_id = '.$_GET['province_id'].' order by name asc'), @$_GET['amphur_id'],'class="form-control" style="width:auto;"','+ เลือกอำเภอ +');
		}
	}
	
	function get_select_reg_district(){
		if($_GET){
			echo form_dropdown('reg_district_id', get_option('id','name','district where amphur_id = '.$_GET['amphur_id'].' order by name asc'), @$_GET['district_id'],'class="form-control" style="width:auto;"','+ เลือกตำบล +');
		}
	}
	
	function get_select_now_amphur(){
		if($_GET){
			echo form_dropdown('now_amphur_id', get_option('id','name','amphur where province_id = '.$_GET['province_id'].' order by name asc'), @$_GET['amphur_id'],'class="form-control" style="width:auto;"','+ เลือกอำเภอ +');
		}
	}
	
	function get_select_now_district(){
		if($_GET){
			echo form_dropdown('now_district_id', get_option('id','name','district where amphur_id = '.$_GET['amphur_id'].' order by name asc'), @$_GET['district_id'],'class="form-control" style="width:auto;"','+ เลือกตำบล +');
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
			echo '('.calculate_age('00','00',$_GET['birth_year']).' ปี)';
		}
	}
	
	function get_expert_name_autocomplete(){
		// if($_GET){
			$sql = 'select name from histories';
			$rs = $this->db->query($sql)->result();
			$rows = array();
			foreach($rs as $item){
				$rows[] = $item;
			}
			print json_encode($rows);
		// }
	}
}
?>