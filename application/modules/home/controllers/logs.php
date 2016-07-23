<?php
class logs extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new log();
		if(@$_GET['search']){ $data['rs']->where('username LIKE "%'.$_GET['search'].'%"'); }
		if(@$_GET['search']){ $data['rs']->or_where('ip LIKE "%'.$_GET['search'].'%"'); }
		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('logs/index',$data);
	}
	
}
?>
