<?php
if(!function_exists('get_option'))
{
	function get_option($value,$text,$table,$condition = NULL,$lang = NULL)
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from $table $condition");
		foreach($query->result() as $item) $option[$item->{$value}] = lang_decode($item->{$text},$lang);
		return $option;
	}
}

if(!function_exists('fix_file'))
{
    function fix_file(&$files)
    {
        $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);

        foreach ($files as $key => $part) {
            // only deal with valid keys and multiple files
            $key = (string) $key;
            if (isset($names[$key]) && is_array($part)) {
                foreach ($part as $position => $value) {
                    $files[$position][$key] = $value;
                }
                // remove old key reference
                unset($files[$key]);
            }
        }
    }
}

if(!function_exists('get_district_name'))
{
	function get_district_name($district_id){
		$CI =& get_instance();
		$rs = $CI->db->query("select name from district where id = ".$district_id)->row();
		return $rs->name;
	}
}

if(!function_exists('get_amphur_name'))
{
	function get_amphur_name($amphur_id){
		$CI =& get_instance();
		$rs = $CI->db->query("select name from amphur where id = ".$amphur_id)->row();
		return $rs->name;
	}
}

if(!function_exists('get_province_name'))
{
	function get_province_name($province_id){
		$CI =& get_instance();
		$rs = $CI->db->query("select name from province where id = ".$province_id)->row();
		return $rs->name;
	}
}

if(!function_exists('get_project_name'))
{
	function get_project_name($project_id){
		$CI =& get_instance();
		$rs = $CI->db->query("select name from projects where id = ".$project_id)->row();
		return $rs->name;
	}
}

if(!function_exists('calculate_age'))
{
	function calculate_age($day,$month,$year){
	# object oriented
	$birth_day = ($year-543).'-'.$month.'-'.$day;
	
	$from = new DateTime($birth_day);
	$to   = new DateTime('today');
	return $from->diff($to)->y;
	
	# procedural
	// echo date_diff(date_create('1970-02-01'), date_create('today'))->y, "\n";
	}
}

if(!function_exists('select_province_condition'))
{
	function select_province_condition($field=false){
		if(!$field){ $field = "id";}
		
		$condition = !is_admin()? " where ".$field." = ".user_login()->province_id : "" ;
		return $condition;
	}
}
?>
