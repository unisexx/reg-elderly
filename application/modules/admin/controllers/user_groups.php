<?php
class User_groups extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new User_group();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('user_groups/index',$data);
	}

	function form($id=false){
		$data['rs'] = new User_group($id);
		$this->template->build('user_groups/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new User_group($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/user_groups');
	}

	function delete($id){
		if($id){
			$rs = new User_group($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/user_groups');
	}

}
?>
