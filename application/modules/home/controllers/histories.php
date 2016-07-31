<?php
class histories extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new history();
		if(@$_GET['search']){ $data['rs']->where('name LIKE "%'.$_GET['search'].'%"'); }
		if(@$_GET['regis_province_id']){ $data['rs']->where('regis_province_id = '.$_GET['regis_province_id']); }
		if(@$_GET['now_province_id']){ $data['rs']->where('now_province_id = '.$_GET['now_province_id']); }
		if(@$_GET['now_amphur_id']){ $data['rs']->where('now_amphur_id = '.$_GET['now_amphur_id']); }
		if(@$_GET['now_district_id']){ $data['rs']->where('now_district_id = '.$_GET['now_district_id']); }
		if(@$_GET['wis_study']){ $data['rs']->or_where('wis_study <> ""'); }
		if(@$_GET['wis_medical']){ $data['rs']->or_where('wis_medical <> ""'); }
		if(@$_GET['wis_agriculture']){ $data['rs']->or_where('wis_agriculture <> ""'); }
		if(@$_GET['wis_natural']){ $data['rs']->or_where('wis_natural <> ""'); }
		if(@$_GET['wis_science']){ $data['rs']->or_where('wis_science <> ""'); }
		if(@$_GET['wis_engineer']){ $data['rs']->or_where('wis_engineer <> ""'); }
		if(@$_GET['wis_architecture']){ $data['rs']->or_where('wis_architecture <> ""'); }
		if(@$_GET['wis_social']){ $data['rs']->or_where('wis_social <> ""'); }
		if(@$_GET['wis_law']){ $data['rs']->or_where('wis_law <> ""'); }
		if(@$_GET['wis_politics']){ $data['rs']->or_where('wis_politics <> ""'); }
		if(@$_GET['wis_art']){ $data['rs']->or_where('wis_art <> ""'); }
		if(@$_GET['wis_religion']){ $data['rs']->or_where('wis_religion <> ""'); }
		if(@$_GET['wis_commercial']){ $data['rs']->or_where('wis_commercial <> ""'); }
		if(@$_GET['wis_security']){ $data['rs']->or_where('wis_security <> ""'); }
		if(@$_GET['wis_management']){ $data['rs']->or_where('wis_management <> ""'); }
		if(@$_GET['wis_publicity']){ $data['rs']->or_where('wis_publicity <> ""'); }
		if(@$_GET['wis_transport']){ $data['rs']->or_where('wis_transport <> ""'); }
		if(@$_GET['wis_energy']){ $data['rs']->or_where('wis_energy <> ""'); }
		if(@$_GET['wis_foreign']){ $data['rs']->or_where('wis_foreign <> ""'); }
		if(@$_GET['wis_materials']){ $data['rs']->or_where('wis_materials <> ""'); }
		if(@$_GET['wis_language']){ $data['rs']->or_where('wis_language <> ""'); }
		if(@$_GET['wis_rhetoric']){ $data['rs']->or_where('wis_rhetoric <> ""'); }
		if(@$_GET['wis_other']){ $data['rs']->or_where('wis_other <> ""'); }

		if(!is_admin()){ $data['rs']->where('regis_province_id = '.user_login()->province_id); }
		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('histories/index',$data);
	}
	
	function form($id=false){
		$data['rs'] = new history($id);
		$this->template->build('histories/form',$data);
	}
	
	function save($id=false){
		if($_POST){
			$rs = new history($id);
			
			if($_FILES['picture']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/histories','picture');
				}
				$_POST['picture'] = $rs->upload($_FILES['picture'],'uploads/histories/');
			}
			
			$_POST['regis_date'] = Date2DB($_POST['regis_date']);
			$_POST['issue_date'] = Date2DB($_POST['issue_date']);
			$_POST['expire_date'] = Date2DB($_POST['expire_date']);
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
			
			// logs
			if($id != ""){
				addLog('histories','แก้ไขประวัติคลังปัญญาผู้สูงอายุ (คปญ.๑) '.$_POST['name'],$_POST['current']);
			}else{
				addLog('histories','เพิ่มประวัติคลังปัญญาผู้สูงอายุ (คปญ.๑) '.$_POST['name'],$_POST['current'].'/'.$rs->db->insert_id());
			}
		}
		redirect('home/histories/index');
		// redirect($_SERVER['HTTP_REFERER']);
	}
	
	function delete($id){
		if($id){
			$rs = new history($id);
			
			// logs
			addLog('users','ลบประวัติคลังปัญญาผู้สูงอายุ (คปญ.๑) '.$rs->name,current_url());
			
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('home/histories/index');
	}
	
	function view($id){
		$data['rs'] = new history($id);
		$this->template->build('histories/view',$data);
	}
	
	function test(){
		//convert date function
		$sql = "select id, regis_date, REGISTER_DATE from histories where regis_date = null order by id asc";
		$rs = $this->db->query($sql)->result_array();
		foreach($rs as $row){
				if($row['REGISTER_DATE'] != ""){
					$exp = explode("-", $row['REGISTER_DATE']);
					$day = $exp[0];
					$month = $exp[1];
					$year = ($exp[2]-543);
					
					$newDate = $year.'-'.$month.'-'.$day;
					
					$this->db->query("UPDATE histories SET regis_date = '".$newDate."' where id = ".$row['id']);
				}
		}
	}
	
}
?>
