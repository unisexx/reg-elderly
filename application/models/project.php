<?php
class project extends ORM
{
	public $table = "projects";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
