<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Omegamember extends DataMapper {
	
	// Name of table to load
	var $table = 'omegamembers';
	//var $has_many = array('')
	
	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
}

?>