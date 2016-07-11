<?php
class activity extends ORM
{
	public $table = "activities";
	
	public $has_one = array('project');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
