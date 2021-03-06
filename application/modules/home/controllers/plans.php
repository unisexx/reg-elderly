<?php
class plans extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new plan();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where_related_plan_activity('activity_name LIKE "%'.$_GET['search'].'%"');
		}
		if(@$_GET['budget_year']){ $data['rs']->where('budget_year = '.$_GET['budget_year']); }

		if(!is_admin()){ $data['rs']->where_related_user('province_id = '.user_login()->province_id); }
		$data['rs']->group_by('id')->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('plans/index',$data);
	}

	function form($id=false){
		$data['rs'] = new plan($id);

		if($id!=""){
			// รายละเอียดข้อมูลกิจกรรม
			$data['activities'] = new plan_activity();
			$data['activities']->where('plan_id = '.$id)->order_by('id','asc')->get();
		}

		$this->template->build('plans/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new plan($id);
			$rs->from_array($_POST);
			$rs->save();

			// หา max id แผนการดำเนินงาน
			if(@$id){
				$plan_id = $id;
			}else{
				$plan_id = $rs->db->insert_id();
			}

			//รายละเอียดข้อมูลกิจกรรม
			if(@$_POST['activity_name']){
				foreach($_POST['activity_name'] as $key=>$value){
					$act = new plan_activity($_POST['activity_id'][$key]);
					$act->activity_name = $value;
					$act->area = $_POST['area'][$key];
					$act->activity_date = Date2DB($_POST['activity_date'][$key]);
					$act->activity_date_detail = $_POST['activity_date_detail'][$key];
					$act->budget = $_POST['budget'][$key];
					$act->product = $_POST['product'][$key];
					$act->result = $_POST['result'][$key];
					$act->plan_id = $plan_id;
					$act->save();
				}
			}

			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');

			// logs
			if($id != ""){
				addLog('plans','แก้ไขแผนการดำเนินงาน (คปญ. ๔) '.$_POST['name'],$_POST['current']);
			}else{
				addLog('plans','เพิ่มแผนการดำเนินงาน (คปญ. ๔) '.$_POST['name'],$_POST['current'].'/'.$rs->db->insert_id());
			}

		}
		redirect('home/plans/index');
		// redirect($_SERVER['HTTP_REFERER']);
	}

	function delete($id){
		if($id){
			$rs = new plan($id);

			// logs
			addLog('users','ลบแผนการดำเนินงาน (คปญ. ๔) '.$rs->name,current_url());

			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('home/plans/index');
	}

	function view($id=false){
		$data['rs'] = new plan($id);

		if($id!=""){
			// รายละเอียดข้อมูลกิจกรรม
			$data['activities'] = new plan_activity();
			$data['activities']->where('plan_id = '.$id)->order_by('id','asc')->get();
		}

		$filename = "(คปญ.๔)_แผนการดำเนินงาน_หน่วยงาน".$data['rs']->user->name."_จังหวัด".get_province_name($data['rs']->user->province_id)."_ปีงบประมาณ_".$data['rs']->budget_year;

		if(@$_GET['type'] == "word"){
			header("Content-type: application/vnd.ms-word");
			header("Content-Disposition: attachment;Filename=".$filename.".doc");
			$this->load->view('plans/view',$data);
		}elseif(@$_GET['type'] == 'excel'){
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment;Filename=".$filename.".xls");
			$this->load->view('plans/view',$data);
		}else{
			$this->template->build('plans/view',$data);
		}
	}

}
?>
