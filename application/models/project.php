<?php
class project extends ORM
{
	public $table = "projects";
	
	public $has_many = array('activity','expert');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
