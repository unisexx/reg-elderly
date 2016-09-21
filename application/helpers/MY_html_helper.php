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
	function get_district_name($province_id,$amphur_id,$district_id){
		if($province_id != "" and $amphur_id != "" and $district_id != ""){
			$CI =& get_instance();
			$rs = $CI->db->query("select name from district where province_id = ".$province_id." and amphur_id = ".$amphur_id." and code = ".$district_id)->row();
			return $rs->name;
		}
	}
}

if(!function_exists('get_amphur_name'))
{
	function get_amphur_name($province_id,$amphur_id){
		if($province_id != "" and $amphur_id != ""){
			$CI =& get_instance();
			$rs = $CI->db->query("select name from amphur where province_id = ".$province_id." and code = ".$amphur_id)->row();
			return $rs->name;
		}
	}
}

if(!function_exists('get_province_name'))
{
	function get_province_name($province_id){
		if($province_id != ""){
			$CI =& get_instance();
			$rs = $CI->db->query("select name from province where code = ".$province_id)->row();
			return $rs->name;
		}
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

if(!function_exists('get_prefix'))
{
	function get_prefix($id=false){
		if($id){
			$CI =& get_instance();
			$rs = $CI->db->query("select prefix_name_full from prefix where prefix_code = ".$id)->row();
			return $rs->prefix_name_full;
		}
	}
}

if(!function_exists('calculate_age'))
{
	function calculate_age($day,$month,$year){
		if($day != 0 or $month !=0 or $year !=0){
			$birth_day = ($year-543).'-'.$month.'-'.$day;
			
			$from = new DateTime($birth_day);
			$to   = new DateTime('today');
			return $from->diff($to)->y;	
		}
	}
}

if(!function_exists('select_province_condition'))
{
	function select_province_condition($field=false){
		if(!$field){ $field = "code";}
		
		$condition = !is_admin()? " where ".$field." = ".user_login()->province_id : "" ;
		return $condition;
	}
}

if(!function_exists('get_education_name'))
{
	function get_education_name($id=false){
			if($id == 91){
				$name = "ไม่ได้เรียนหนังสือ";
			}elseif($id == 93){
				$name = "ประถมศึกษาตอนต้น";
			}elseif($id == 94){
				$name = "ประถมศึกษาตอนปลาย";
			}elseif($id == 95){
				$name = "มัธยมศึกษาตอนต้น";
			}elseif($id == 96){
				$name = "มัธยมศึกษาตอนปลาย";
			}elseif($id == 10){
				$name = "อาชีวศึกษาและประกาศนียบัตรชั้นสูง (ปวช./ปวท./ปกศ.ต้น)";
			}elseif($id == 40){
				$name = "ปริญญาตรี";
			}elseif($id == 99999){
				$name = "อื่นๆ";
			}else{
				$name = "";
			}
		
		return $name;
	}
}

if(!function_exists('addLog')){
	function addLog($module=false,$detail=false,$url=false){
		$rs = new log();
		$data['module'] =  $module;
		$data['detail'] = $detail;
		$data['url'] = $url;
		$data['user_id'] = user_login()->id;
		$data['username'] = user_login()->username;
		$data['ip'] = $_SERVER['REMOTE_ADDR'];
		$rs->from_array($data);
		$rs->save();
	}
}
?>
