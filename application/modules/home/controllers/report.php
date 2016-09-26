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
		$condition = " 1=1 ";
		if(@$_GET['regis_year']){ $condition .= ' and regis_date LIKE "%'.($_GET['regis_year']-543).'%" ';}
		$sql = "SELECT
					CODE province_code,
					NAME province_name,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex = 'm' AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) BETWEEN 60 and 69) count_male_60,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex = 'm' AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) BETWEEN 70 and 79) count_male_70,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex = 'm' AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) > 80) count_male_80,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex = 'f' AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) BETWEEN 60 and 69) count_female_60,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex = 'f' AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) BETWEEN 70 and 79) count_female_70,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex = 'f' AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) > 80) count_female_80,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex is NULL AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) BETWEEN 60 and 69) count_unknow_60,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex is NULL AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) BETWEEN 70 and 79) count_unknow_70,
					(select count(id) from histories h LEFT JOIN prefix p ON h.title = p.prefix_code WHERE ".$condition." regis_province_id = province_code and sex is NULL AND (DATEDIFF(CURRENT_DATE, STR_TO_DATE(CONCAT(h.birth_day,'-',h.birth_month,'-',(h.birth_year)-543), '%d-%m-%Y'))/365) > 80) count_unknow_80,
					(select count(id) from histories WHERE ".$condition." regis_province_id = province_code) count_total
				FROM
					province";
		// echo $sql;
		$data['rs'] = $this->db->query($sql)->result();
		// $histories = new history();
		$this->template->build('report/report_2',$data);
	}
	
	function report_3(){
		$this->template->build('report/report_3');
	}
	
	function report_4(){
		$condition = " 1=1 ";
		if(@$_GET['regis_year']){ $condition .= ' and regis_date LIKE "%'.($_GET['regis_year']-543).'%" ';}
		$sql = "SELECT
						CODE province_code,
						NAME province_name,
						(select count(id) from histories LEFT JOIN prefix ON histories.title = prefix.prefix_code WHERE ".$condition." and regis_province_id = province_code and status = 2 and sex = 'm') count_male,
						(select count(id) from histories LEFT JOIN prefix ON histories.title = prefix.prefix_code WHERE ".$condition." and regis_province_id = province_code and status = 2 and sex = 'f') count_female,
						(select count(id) from histories LEFT JOIN prefix ON histories.title = prefix.prefix_code WHERE ".$condition." and regis_province_id = province_code and status = 2 and sex IS NULL) count_unknow,
						(select count(id) from histories WHERE ".$condition." and regis_province_id = province_code and status = 2) count_total
					FROM
						province";
		// echo $sql;
		$data['rs'] = $this->db->query($sql)->result();
		// $histories = new history();
		$this->template->build('report/report_4',$data);
	}
	
}
?>
