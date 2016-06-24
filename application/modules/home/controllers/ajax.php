<?php
Class ajax extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_select_amphur(){
		if($_GET){
			echo form_dropdown('reg_amphur_id', get_option('id','name','amphur where province_id = '.$_GET['province_id'].' order by name asc'), @$_GET['reg_amphur_id'],'class="form-control" style="width:auto;"','+ เลือกอำเภอ +');
		}
	}
	
	function get_select_district(){
		if($_GET){
			echo form_dropdown('reg_district_id', get_option('id','name','district where amphur_id = '.$_GET['amphur_id'].' order by name asc'), @$_GET['reg_district_id'],'class="form-control" style="width:auto;"','+ เลือกอำเภอ +');
		}
	}
}
?>