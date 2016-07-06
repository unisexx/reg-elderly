<?php
class histories extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new history();
		// if(@$_GET['search']){
			// $data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
			// $data['rs']->or_where('username LIKE "%'.$_GET['search'].'%"');
		// }
		$data['rs']->order_by('id','desc')->get_page();
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
