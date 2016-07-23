<?php
class users extends Public_Controller {

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
		$this->template->build('users/index',$data);
	}
	
	function form($id=false){
		$data['rs'] = new user($id);
		$this->template->build('users/form',$data);
	}
	
	function save($id=false){
		if($_POST){
			$rs = new user($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
			
			// logs
			if($id != ""){
				addLog('users','แก้ไขผู้ใช้งาน '.$_POST['name'],$_POST['current']);
			}else{
				addLog('users','เพิ่มผู้ใช้งาน '.$_POST['name'],$_POST['current'].'/'.$rs->db->insert_id());
			}
			
		}
		redirect('home/users/index');
	}
	
	function delete($id){
		if($id){
			$rs = new user($id);
			
			// logs
			addLog('users','ลบผู้ใช้งาน '.$rs->name,current_url());
			
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('home/users/index');
	}
	
}
?>
