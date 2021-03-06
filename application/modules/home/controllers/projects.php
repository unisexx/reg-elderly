<?php
class projects extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new project();
		if(@$_GET['search']){
			$data['rs']->where('(name LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where_related_activity('activity_name LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where_related_expert('expert_name LIKE "%'.$_GET['search'].'%")');
		}
		if(@$_GET['budget_year']){ $data['rs']->where('budget_year = '.$_GET['budget_year']); }
		if(@$_GET['province_id']){ $data['rs']->where('province_id = '.$_GET['province_id']); }
		if(!is_admin()){ $data['rs']->where('province_id = '.user_login()->province_id); }
		$data['rs']->group_by('id')->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('projects/index',$data);
	}

	function form($id=false){
		$data['rs'] = new project($id);

		if($id!=""){
			// รายละเอียดข้อมูลกิจกรรม
			$data['activities'] = new activity();
			$data['activities']->where('project_id = '.$id)->order_by('id','asc')->get();
		}

		$this->template->build('projects/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new project($id);
			$rs->from_array($_POST);
			$rs->save();

			// หา max id โปรเจก
			if(@$id){
				$project_id = $id;
			}else{
				$project_id = $rs->db->insert_id();
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


						// หา max id กิจกรรม
						if($_POST['activity_id'][$key] == ""){
							$activity_id = $act->db->insert_id();
						}else{
							$activity_id = $_POST['activity_id'][$key];
						}

						$this->db->query('DELETE FROM experts WHERE activity_id = '.$activity_id); //ลบเก่าแล้วสร้างใหม่
						foreach($_POST['expert_name'][$key] as $index => $data)
						{
							if($data)
							{
								$expert = new expert(@$_POST['expert_id'][$key][$index]);
								$expert->project_id = $project_id;
								$expert->activity_id = $activity_id;
								$expert->expert_name = $data;
								$expert->save();
							}
						}

				}
			}

			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');

			// logs
			if($id != ""){
				addLog('projects','แก้ไขรายงานผลการดำเนินงานโครงการ (คปญ. ๒) '.$_POST['name'],$_POST['current']);
			}else{
				addLog('projects','เพิ่มรายงานผลการดำเนินงานโครงการ (คปญ. ๒) '.$_POST['name'],$_POST['current'].'/'.$rs->db->insert_id());
			}

		}
		redirect('home/projects/index');
		// redirect($_SERVER['HTTP_REFERER']);
	}

	function delete($id){
		if($id){
			$rs = new project($id);

			// logs
			addLog('users','ลบรายงานผลการดำเนินงานโครงการ (คปญ. ๒) '.$rs->name,current_url());

			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('home/projects/index');
	}

	function view($id){
		$data['rs'] = new project($id);
		if($id!=""){
			// รายละเอียดข้อมูลกิจกรรม
			$data['activities'] = new activity();
			$data['activities']->where('project_id = '.$id)->order_by('id','asc')->get();
		}

		$filename = "(คปญ.๒)_รายงานผลการดำเนินงานโครงการ".$data['rs']->name."_จังหวัด".get_province_name($data['rs']->province_id)."_ปีงบประมาณ_".$data['rs']->budget_year;

		if(@$_GET['type'] == "word"){
			header("Content-type: application/vnd.ms-word");
			header("Content-Disposition: attachment;Filename=".$filename.".doc");
			$this->load->view('projects/view',$data);
		}elseif(@$_GET['type'] == 'excel'){
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;Filename=".$filename.".xls");
			$this->load->view('projects/view',$data);
		}else{
			$this->template->build('projects/view',$data);
		}
	}

}
?>
