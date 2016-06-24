<?php
class history extends ORM
{
	public $table = "histories";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
