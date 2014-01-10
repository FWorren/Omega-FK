<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Register_Manager {
	
	function rand_string($length, $email) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$str = '';
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str += $chars[ rand( 0, $size - 1 ) ];
		}
		$str = $str + $email;
		return $str;
	}
	
	function checkEmail($email){
		return (substr($email,strpos($email, "@")+1,strlen($email)) == "stud.ntnu.no");
	}
	
	function  check_username($username){
		$u = new User();
		$u->where($username)->get();
		return ($u->exists());
	}
	
	function isPlayer($firstname,$lastname){
		$firstname = strtolower($firstname);
		$lastname = strtolower($lastname);
		$u = new Player();
		$u->where(array('firstname' => $firstname, 'lastname' => $lastname))->get();
		return ($u->exists());
	}

}

/* End of file login_manager.php */

?>