<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Posts_model extends DataMapper {
	//Name of table to load
	var $table = 'posts';
	
	//validation of post scheme
	var $validation = array(
			'title' => array(
					'field' => 'title',
					'label' => 'tittel',
					'rules' => array('required','trim', 'max_length' => 20)
			),
			'author' => array(
					'field' => 'author',
					'label' => 'skribent',
					'rules' => array('required','max_length' => 20,'trim')
			),
			'content' => array(
					'field' => 'content',
					'label' => 'innhold',
					'rules' => array('required')
			)
	);
	
	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
}

?>