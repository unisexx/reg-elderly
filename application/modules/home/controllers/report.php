<?php
class report extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function report_1(){
		$condition = " 1=1 ";
		if(@$_GET['regis_year']){ $condition .= ' and regis_province_id = '.$_GET['regis_province_id'];}
		if(@$_GET['regis_year']){ $condition .= ' and regis_date LIKE "%'.($_GET['regis_year']-543).'%" ';}
		$sql = "select * from histories where ".$condition." order by id desc";
		// echo $sql;
		$histories = new history();
        $data['rs'] = $histories->sql_page($sql, 20);
		$data['pagination'] = $histories->sql_pagination;
		
		$this->template->build('report/report_1',$data);
	}
	
	function report_2(){
		$this->template->build('report/report_2');
	}
	
	function report_3(){
		$this->template->build('report/report_3');
	}
	
	function report_4(){
		$this->template->build('report/report_4');
	}
	
}
?>
