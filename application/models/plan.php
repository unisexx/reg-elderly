<?php
class plan extends ORM
{
	public $table = "plans";
	
	public $has_many = array('plan_activity');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
