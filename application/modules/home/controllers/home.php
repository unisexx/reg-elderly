<?php
class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template->set_layout('login');
		$this->template->build('index');
	}
	
	public function check_login()
	{
		if(login($this->input->post('username'), $this->input->post('password')))
		{
			set_notify('success', 'Welcome to Admin control');
			redirect('home/users');
		} 
		else
		{
			set_notify('error', 'Username or Password is incorrect?');
			redirect('home');
		} 
	}
	
	public function logout()
	{
		logout();
		redirect('home');
	}
	
}
?>
