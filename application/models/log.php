<?php
class log extends ORM
{
	public $table = "logs";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>