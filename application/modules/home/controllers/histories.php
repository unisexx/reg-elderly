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
		if(@$_GET['wis_study']){ $data['rs']->or_where('wis_study IS NOT NULL'); }
		if(@$_GET['wis_medical']){ $data['rs']->or_where('wis_medical IS NOT NULL'); }
		if(@$_GET['wis_agriculture']){ $data['rs']->or_where('wis_agriculture IS NOT NULL'); }
		if(@$_GET['wis_natural']){ $data['rs']->or_where('wis_natural IS NOT NULL'); }
		if(@$_GET['wis_science']){ $data['rs']->or_where('wis_science IS NOT NULL'); }
		if(@$_GET['wis_engineer']){ $data['rs']->or_where('wis_engineer IS NOT NULL'); }
		if(@$_GET['wis_architecture']){ $data['rs']->or_where('wis_architecture IS NOT NULL'); }
		if(@$_GET['wis_social']){ $data['rs']->or_where('wis_social IS NOT NULL'); }
		if(@$_GET['wis_law']){ $data['rs']->or_where('wis_law IS NOT NULL'); }
		if(@$_GET['wis_politics']){ $data['rs']->or_where('wis_politics IS NOT NULL'); }
		if(@$_GET['wis_art']){ $data['rs']->or_where('wis_art IS NOT NULL'); }
		if(@$_GET['wis_religion']){ $data['rs']->or_where('wis_religion IS NOT NULL'); }
		if(@$_GET['wis_commercial']){ $data['rs']->or_where('wis_commercial IS NOT NULL'); }
		if(@$_GET['wis_security']){ $data['rs']->or_where('wis_security IS NOT NULL'); }
		if(@$_GET['wis_management']){ $data['rs']->or_where('wis_management IS NOT NULL'); }
		if(@$_GET['wis_publicity']){ $data['rs']->or_where('wis_publicity IS NOT NULL'); }
		if(@$_GET['wis_transport']){ $data['rs']->or_where('wis_transport IS NOT NULL'); }
		if(@$_GET['wis_energy']){ $data['rs']->or_where('wis_energy IS NOT NULL'); }
		if(@$_GET['wis_foreign']){ $data['rs']->or_where('wis_foreign IS NOT NULL'); }
		if(@$_GET['wis_materials']){ $data['rs']->or_where('wis_materials IS NOT NULL'); }
		if(@$_GET['wis_language']){ $data['rs']->or_where('wis_language IS NOT NULL'); }
		if(@$_GET['wis_rhetoric']){ $data['rs']->or_where('wis_rhetoric IS NOT NULL'); }
		if(@$_GET['wis_other']){ $data['rs']->or_where('wis_other IS NOT NULL'); }

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
		}
		redirect('home/histories/index');
		// redirect($_SERVER['HTTP_REFERER']);
	}
	
	function delete($id){
		if($id){
			$rs = new history($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('home/histories/index');
	}
	
}
?>
