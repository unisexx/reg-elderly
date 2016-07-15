<?php
class user extends ORM
{
	public $table = "users";
	
	public $has_many = array('plan');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
