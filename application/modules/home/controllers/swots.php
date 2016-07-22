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
		}
		redirect('home/swots/index?budget_year='.$project->budget_year.'&province_id='.$project->province_id.'&project_id='.$project->id);
		// redirect($_SERVER['HTTP_REFERER']);
	}
	
	function delete($id){
		if($id){
			$rs = new swot($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function view($project_id,$id=false){
		$data['project'] = new project($project_id);
		$data['rs'] = new swot($id);
		$this->template->build('swots/view',$data);
	}
	
}
?>
