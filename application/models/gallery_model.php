<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Gallery_model extends DataMapper {
	
	// Name of table to load
	var $table = 'gallery';
	//var $has_many = array('')
	
	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}

?>