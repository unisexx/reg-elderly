<?php
class plan_activity extends ORM
{
	public $table = "plans_activities";
	
	public $has_one = array('plan');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
