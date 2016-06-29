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
	
	// function form($id=false){
		// $data['rs'] = new user($id);
		// $this->template->build('users/form',$data);
	// }
// 	
	// function save($id=false){
		// if($_POST){
			// $rs = new user($id);
			// $rs->from_array($_POST);
			// $rs->save();
			// set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		// }
		// redirect('home/users/index');
	// }
// 	
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
