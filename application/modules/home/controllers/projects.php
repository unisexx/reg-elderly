<?php
class projects extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new user();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('username LIKE "%'.$_GET['search'].'%"');
		}
		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('projects/index',$data);
	}
	
	function form($id=false){
		$data['rs'] = new project($id);
		
		if($id!=""){
			// รายละเอียดข้อมูลกิจกรรม
			$data['activities'] = new activity();
			$data['activities']->where('project_id = '.$id)->get();
		}
		
		$this->template->build('projects/form',$data);
	}
	
	function save($id=false){
		if($_POST){
			$rs = new project($id);
			$rs->from_array($_POST);
			$rs->save();
			
			// หา max id
			if(@$id){
				$project_id = $id;
			}else{
				$row = $this->db->query('SELECT MAX(id) AS maxid FROM projects')->row();
				if ($row) {
				    $project_id = $row->maxid;
				}
			}
			
			//รายละเอียดข้อมูลกิจกรรม
			if(@$_POST['activity_name']){
				foreach($_POST['activity_name'] as $key=>$value){
					$act = new activity($_POST['activity_id'][$key]);
					$act->activity_name = $value;
					$act->b1m = $_POST['b1m'][$key];
					$act->b1f = $_POST['b1f'][$key];
					$act->b2m = $_POST['b2m'][$key];
					$act->b2f = $_POST['b2f'][$key];
					$act->b3m = $_POST['b3m'][$key];
					$act->b3f = $_POST['b3f'][$key];
					$act->b4m = $_POST['b4m'][$key];
					$act->b4f = $_POST['b4f'][$key];
					$act->area = $_POST['area'][$key];
					$act->activity_date = Date2DB($_POST['activity_date'][$key]);
					$act->budget = $_POST['budget'][$key];
					$act->project_id = $project_id;
					$act->save();
				}
			}
			
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		// redirect('home/projects/index');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	// function delete($id){
		// if($id){
			// $rs = new user($id);
			// $rs->delete();
			// set_notify('success', 'ลบข้อมูลเรียบร้อย');
		// }
		// redirect('home/users/index');
	// }
	
}
?>
