<?php
class plan extends ORM
{
	public $table = "plans";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
