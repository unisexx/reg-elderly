<?php
class swots extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new swot();
		if(@$_GET['project_id']){
			$data['rs']->where('project_id = '.$_GET['project_id']); 
			$data['project'] = new project($_GET['project_id']);
		}
		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('swots/index',$data);
	}
	
	function form($project_id,$id=false){
		$data['project'] = new project($project_id);
		$data['rs'] = new swot($id);
		$this->template->build('swots/form',$data);
	}
	
	function save($project_id,$id=false){
		if($_POST){
			$project = new project($project_id);
			
			$rs = new swot($id);
			$rs->from_array($_POST);
			$rs->save();
			
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
			
			// logs
			if($id != ""){
				addLog('swots','แก้ไขตารางวิเคราะห์ SWOT (คปญ. ๓) '.get_project_name($_POST['project_id']),$_POST['current']);
			}else{
				addLog('swots','เพิ่มตารางวิเคราะห์ SWOT (คปญ. ๓) '.get_project_name($_POST['project_id']),$_POST['current'].'/'.$rs->db->insert_id());
			}
			
		}
		redirect('home/swots/index?budget_year='.$project->budget_year.'&province_id='.$project->province_id.'&project_id='.$project->id);
		// redirect($_SERVER['HTTP_REFERER']);
	}
	
	function delete($id){
		if($id){
			$rs = new swot($id);
			
			// logs
			addLog('users','ลบตารางวิเคราะห์ SWOT (คปญ. ๓) '.get_project_name($rs->project_id),current_url());
			
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function view(){
		// $data['project'] = new project($project_id);
		// $data['rs'] = new swot($id);
		
		$data['rs'] = new swot();
		if(@$_GET['project_id']){
			$data['rs']->where('project_id = '.$_GET['project_id']); 
			$data['project'] = new project($_GET['project_id']);
		}
		$data['rs']->order_by('id','desc')->get();
		
		
		$filename = "(คปญ.๓)_ตารางวิเคราะห์ SWOT_".$data['project']->name."_จังหวัด".get_province_name(@$_GET['province_id'])."_ปีงบประมาณ_".$_GET['budget_year'];
		
		if(@$_GET['type'] == "word"){
			header("Content-type: application/vnd.ms-word");
			header("Content-Disposition: attachment;Filename=".$filename.".doc");
			$this->load->view('swots/view',$data);
		}elseif(@$_GET['type'] == 'excel'){
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;Filename=".$filename.".xls");
			$this->load->view('swots/view',$data);
		}else{
			$this->template->build('swots/view',$data);
		}
		
	}
	
}
?>
