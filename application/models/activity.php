<?php
class activity extends ORM
{
	public $table = "activities";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
