<?php
class expert extends ORM
{
	public $table = "experts";
	
	public $has_one = array('project','activity');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
