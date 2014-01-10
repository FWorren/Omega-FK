<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Login_Manager {
	
	var $logged_in_user = NULL;
    
    function logout()
    {
    	$this->session->sess_destroy();
    	$this->logged_in_user = NULL;
    }
    
}

/* End of file login_manager.php */

?>