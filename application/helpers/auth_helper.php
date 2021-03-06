<?php

function login($username,$password)
{
	// $password = md5(sha1($password."secret"));
	$CI =& get_instance();
	$user = new user();
	$user->where("username ='".$username."' AND password='".$password."' ")->get();
	// $user->check_last_query();
	if($user->exists())
	{
		$CI->session->set_userdata('id',$user->id);
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function is_login($level_name = FALSE)
{
	$CI =& get_instance();
	$user = new User($CI->session->userdata('id'));
	if($level_name)
	{
		$level = new Level();
		if($user->level->level)
		{
			$id = ($level->get_by_level($level_name)->id >= $user->level->id)? true : false ;
		}
		else
		{
			$id = false;
		}
	}
	else
	{
		$id = $user->id;
	}
	return ($id) ? true : false;
}

function user_login($id=FALSE)
{
	$CI =& get_instance();
	$id = ($id)?$id:$CI->session->userdata('id');
	$user = new user($id);
	return $user;
}

function logout()
{
	$CI =& get_instance();
	$CI->session->unset_userdata('id');
	$CI->session->unset_userdata('level');
	$CI->session->unset_userdata('user_type');
}

function is_owner($id)
{
    $CI =& get_instance();
    if($id == $CI->session->userdata('id') && $CI->session->userdata('id') != 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function is_admin($id=FALSE){
	$CI =& get_instance();
	$id = ($id)?$id:$CI->session->userdata('id');
	$user = new user($id);
	if($user->is_admin == 1){
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function permission($module, $action)
{
	$CI =& get_instance();
	$permission = new Permission();
	$perm = $permission->where("user_type_id = ".$CI->session->userdata('user_type')." and module = '".$module."'")->get();
	
	if($perm->$action){
		return TRUE;
	}else{
		return FALSE;
	}
}
?>