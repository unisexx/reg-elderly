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
}
?>