<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User extends DataMapper {
	
	// Name of table to load
	var $table = 'users';
	//var $has_many = array('')
	
	//validation of registration scheme
	var $validation = array(
			'username' => array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => array('required','trim', 'max_length' => 20)
			),
			'password' => array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => array('required','trim','min_length' => 5,'max_length' => 40,'encrypt'),
					'type' => 'password'
			),
			'confirm_password' => array(
					'field' => 'verify',
					'label' => 'ConfirmPassword',
					'rules' => array('required', 'encrypt','min_length' => 5,'max_length' => 40, 'matches' => 'password'),
					'type' => 'password'
			),
			'firstname' => array(
					'field' => 'firstname',
					'label' => 'Firstname',
					'rules' => array('required','max_length' => 40,'trim','tolower')
			),
			'lastname' => array(
					'field' => 'lastname',
					'label' => 'Lastname',
					'rules' => array('required','max_length' => 40,'trim','tolower')
			),
			'email' => array(
					'field' => 'email',
					'label' => 'EmailAddress',
					'rules' => array('required','max_length' => 40,'trim', 'valid_email', 'unique')
			)
	);
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
        $this->load->library('login_manager');
    }
    
    function _encrypt($field)
    {
    	if (!empty($this->{$field}))
    	{
    		$this->{$field} = sha1(md5($this->{$field}));
    	}
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */

?>