<?php
class histories extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// $data['rs'] = new history();
		// if(@$_GET['search']){ $data['rs']->where('name LIKE "%'.$_GET['search'].'%"'); }
		// if(@$_GET['regis_province_id']){ $data['rs']->where('regis_province_id = '.$_GET['regis_province_id']); }
		// if(@$_GET['now_province_id']){ $data['rs']->where('now_province_id = '.$_GET['now_province_id']); }
		// if(@$_GET['now_amphur_id']){ $data['rs']->where('now_amphur_id = '.$_GET['now_amphur_id']); }
		// if(@$_GET['now_district_id']){ $data['rs']->where('now_district_id = '.$_GET['now_district_id']); }
		// if(@$_GET['wis_study']){ $data['rs']->or_where('wis_study <> ""'); }
		// if(@$_GET['wis_medical']){ $data['rs']->or_where('wis_medical <> ""'); }
		// if(@$_GET['wis_agriculture']){ $data['rs']->or_where('wis_agriculture <> ""'); }
		// if(@$_GET['wis_natural']){ $data['rs']->or_where('wis_natural <> ""'); }
		// if(@$_GET['wis_science']){ $data['rs']->or_where('wis_science <> ""'); }
		// if(@$_GET['wis_engineer']){ $data['rs']->or_where('wis_engineer <> ""'); }
		// if(@$_GET['wis_architecture']){ $data['rs']->or_where('wis_architecture <> ""'); }
		// if(@$_GET['wis_social']){ $data['rs']->or_where('wis_social <> ""'); }
		// if(@$_GET['wis_law']){ $data['rs']->or_where('wis_law <> ""'); }
		// if(@$_GET['wis_politics']){ $data['rs']->or_where('wis_politics <> ""'); }
		// if(@$_GET['wis_art']){ $data['rs']->or_where('wis_art <> ""'); }
		// if(@$_GET['wis_religion']){ $data['rs']->or_where('wis_religion <> ""'); }
		// if(@$_GET['wis_commercial']){ $data['rs']->or_where('wis_commercial <> ""'); }
		// if(@$_GET['wis_security']){ $data['rs']->or_where('wis_security <> ""'); }
		// if(@$_GET['wis_management']){ $data['rs']->or_where('wis_management <> ""'); }
		// if(@$_GET['wis_publicity']){ $data['rs']->or_where('wis_publicity <> ""'); }
		// if(@$_GET['wis_transport']){ $data['rs']->or_where('wis_transport <> ""'); }
		// if(@$_GET['wis_energy']){ $data['rs']->or_where('wis_energy <> ""'); }
		// if(@$_GET['wis_foreign']){ $data['rs']->or_where('wis_foreign <> ""'); }
		// if(@$_GET['wis_materials']){ $data['rs']->or_where('wis_materials <> ""'); }
		// if(@$_GET['wis_language']){ $data['rs']->or_where('wis_language <> ""'); }
		// if(@$_GET['wis_rhetoric']){ $data['rs']->or_where('wis_rhetoric <> ""'); }
		// if(@$_GET['wis_other']){ $data['rs']->or_where('wis_other <> ""'); }
// 
		// if(!is_admin()){ $data['rs']->where('regis_province_id = '.user_login()->province_id); }
		// $data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		
		$condition = " 1=1 ";
		if(!is_admin()){ $condition .= ' and regis_province_id = '.user_login()->province_id; }
		if(@$_GET['search']){ $condition .= ' and name LIKE "%'.$_GET['search'].'%" ';}
		if(@$_GET['regis_province_id']){ $condition .= ' and regis_province_id = '.$_GET['regis_province_id']; }
		if(@$_GET['regis_year']){ $condition .= ' and regis_date LIKE "%'.($_GET['regis_year']-543).'%" ';}
		if(@$_GET['now_province_id']){ $condition .= ' and now_province_id = '.$_GET['now_province_id']; }
		if(@$_GET['now_amphur_id']){ $condition .= ' and now_amphur_id = '.$_GET['now_amphur_id']; }
		if(@$_GET['now_district_id']){ $condition .= ' and now_district_id = '.$_GET['now_district_id']; }
		
		// condition for wisdom (ความเชี่ยวชาญ)
		$condition .= " and ( 1=1 ";
		
		$operator = "and";
		
		if(@$_GET['wis_study']){
			 $condition .= ' '.$operator.' wis_study <> ""'; 
			 $operator = "or";
		}

		if(@$_GET['wis_medical']){
			 $condition .=  ' '.$operator.' wis_medical <> ""';
			 $operator = "or";
		}
		
		if(@$_GET['wis_agriculture']){
			$condition .= ' '.$operator.' wis_agriculture <> ""'; 
			$operator = "or";
		}

		if(@$_GET['wis_natural']){
			$condition .= ' '.$operator.' wis_natural <> ""'; 
			$operator = "or";
		}
		
		if(@$_GET['wis_science']){
			$condition .= ' '.$operator.' wis_science <> ""'; 
			$operator = "or";
		}
		
		if(@$_GET['wis_engineer']){
			$condition .= ' '.$operator.' wis_engineer <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_architecture']){
			$condition .= ' '.$operator.' wis_architecture <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_social']){
			$condition .= ' '.$operator.' wis_social <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_law']){
			$condition .= ' '.$operator.' wis_law <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_politics']){
			$condition .= ' '.$operator.' wis_politics <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_art']){
			$condition .= ' '.$operator.' wis_art <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_religion']){
			$condition .= ' '.$operator.' wis_religion <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_commercial']){
			$condition .= ' '.$operator.' wis_commercial <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_security']){
			$condition .= ' '.$operator.' wis_security <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_management']){
			$condition .= ' '.$operator.' wis_management <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_publicity']){
			$condition .= ' '.$operator.' wis_publicity <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_transport']){
			$condition .= ' '.$operator.' wis_transport <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_energy']){
			$condition .= ' '.$operator.' wis_energy <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_foreign']){
			$condition .= ' '.$operator.' wis_foreign <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_materials']){
			$condition .= ' '.$operator.' wis_materials <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_language']){
			$condition .= ' '.$operator.' wis_language <> ""';
			$operator = "or";
		}

		if(@$_GET['wis_rhetoric']){
			$condition .= ' '.$operator.' wis_rhetoric <> ""';
			$operator = "or";
		}
		
		if(@$_GET['wis_other']){
			$condition .= ' '.$operator.' wis_other <> ""';
			$operator = "or";
		}
		
		$condition .= " )";
		
		$sql = "select * from histories where ".$condition." order by id desc";
		// echo $sql;
		$histories = new history();
        $data['rs'] = $histories->sql_page($sql, 20);
		$data['pagination'] = $histories->sql_pagination;
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
	
	// function test(){
		// $sql = "select id, person_id from histories where now_province_id is null order by id asc";
		// $rs = $this->db->query($sql)->result_array();
		// foreach($rs as $row){
// 					
					// $sql = "select ADDRESS_NO, MOO, SOI, PROVINCE_CODE, DISTRICT_CODE, SUBDISTRICT_CODE, TELEPHONE, FAX,  POSTCODE from _mn_address_01 where person_id = ".$row['person_id'];
					// $q = $this->db->query($sql)->row_array();
// 		
					// $sql = "UPDATE histories SET 
						// now_home_no = '".@$q['ADDRESS_NO']."',
						// now_moo = '".@$q['MOO']."',
						// now_soi = '".@$q['SOI']."',
						// now_province_id = '".@$q['PROVINCE_CODE']."',
						// now_amphur_id = '".@$q['DISTRICT_CODE']."',
						// now_district_id = '".@$q['SUBDISTRICT_CODE']."',
						// now_post_code = '".@$q['POSTCODE']."',
						// tel = '".@$q['TELEPHONE']."',
						// fax = '".@$q['FAX']."'
					// where id = ".$row['id'];
//  
					// $this->db->query($sql);
// 					
					// echo 'update '.$row['id'].' success<br>';
		// }
	// }
	
	// function test2(){
		// $sql = "select id, person_id from histories where reg_province_id is null order by id asc";
		// $rs = $this->db->query($sql)->result_array();
		// foreach($rs as $row){
// 					
					// $sql = "select ADDRESS_NO, MOO, SOI, PROVINCE_CODE, DISTRICT_CODE, SUBDISTRICT_CODE, TELEPHONE, FAX,  POSTCODE  from _mn_address_02 where person_id = ".$row['person_id'];
					// $q = $this->db->query($sql)->row_array();
// 		
					// $sql = "UPDATE histories SET 
						// reg_home_no = '".@$q['ADDRESS_NO']."',
						// reg_moo = '".@$q['MOO']."',
						// reg_soi = '".@$q['SOI']."',
						// reg_province_id = '".@$q['PROVINCE_CODE']."',
						// reg_amphur_id = '".@$q['DISTRICT_CODE']."',
						// reg_district_id = '".@$q['SUBDISTRICT_CODE']."',
						// reg_post_code = '".@$q['POSTCODE']."',
						// tel = '".@$q['TELEPHONE']."',
						// fax = '".@$q['FAX']."'
					// where id = ".$row['id'];
//  
					// $this->db->query($sql);
// 					
					// echo 'update '.$row['id'].' success<br>';
		// }
	// }
	
}
?>
