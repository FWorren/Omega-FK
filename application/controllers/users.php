<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->model('player');
		$this->load->library('login_manager');
		$this->load->library('register_manager');
		$this->load->helper('email');
	}
	
	/*
	|--------------------------------------------------------------------------
	| Login functions
	|--------------------------------------------------------------------------
	| One view function and one for processing login. Using libraries and helpers
	*/
	
	function login(){
		//Get input from user
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// Create user object
		$u = new User();
		$u->where('username',$username);
		$u->where('password',sha1(md5($password)));
		$u->get();
		if($u->exists()){
			if($u->active == 1){
				$data = array(
						'user_id' => $u->user_id,
						'username' => $u->username,
						'firstname' => $u->firstname,
						'lastname' => $u->lastname,
						'account_permissions' => $u->account_permissions,
						'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				$a = array(
						'error' => false,
				);
				echo json_encode($a);
			}else{
				$a = array(
						'error' => true,
						'msg' => 'Kontoen din er ikke aktivert, sjekk mailen din!'
				);
				echo json_encode($a);
			}
		}else{
			$a = array(
					'error' => true,
					'msg' => 'Feil brukernavn og/eller passord!'
					);
			echo json_encode($a);
		}
	}
	
	
	/*
	|--------------------------------------------------------------------------
	| Activation of user
	|--------------------------------------------------------------------------
	| 
	*/
	
	function activation(){
		$code = $this->uri->segment(2);
		if(!$code){
			echo 'Ingen kode tatt imot. Ta kontakt med webansvarlig!';
		}else{
			$u = new User();
			$u->where('code',$code);
			$message = '';
			if($u->active == '1'){
				$message = 'Du har allerede aktivisert din bruker logg inn ';
			}else{
				$message = 'Du har nå aktivisert din bruker!';
				$user = new User();
				$user->where('code',$code)->update('active','1');
			}
			$this->activation_success_view($message);
		}
	}
	
	function activation_success_view($message){
		$data['title'] = 'Aktivisert!';
		$data['message'] = $message;
		$this->load->view('template/header.php',$data);
		$this->load->view('member/profile_view.php', $data);
		$this->load->view('template/footer.php',$data);
	}
	
	/*
	|--------------------------------------------------------------------------
	| Registration functions
	|--------------------------------------------------------------------------
	| code for registration scheme. One view function and one function that
	| process the registration
	*/
	
	function register()
	{
		// Create user object
		$u = new User();
		
		//Create variable for code used in activation
		$code = '';
		
		//Set timezone
		ini_set('date.timezone', 'Europe/Oslo');
		
		// Put user supplied data into user object
		$u->username = $this->input->post('username');
		$u->password = $this->input->post('password');
		$u->confirm_password = $this->input->post('verify');
		$u->firstname = $this->input->post('firstname');
		$u->lastname = $this->input->post('lastname');
		$u->email = $this->input->post('email');
		$u->user_regdate = date('Y-m-d H:i:s',time());
		
		//Boolean variables for check username and checkEmail
		$isNTNUWebmail = false;
		$exist_username = false;
		
		//Check if username allready exists
		if(!empty($u->username)){
			$exist_username = $this->register_manager->check_username($u->username);
		}
		
		//Check if user input is a NTNU webmail
		if(!empty($u->email)){
			if($this->register_manager->checkEmail($u->email)){
				//Get a random code for email activation
				$u->code = sha1($this->register_manager->rand_string(10, $u->email));
				$code = $u->code;
				$isNTNUWebmail = true;
			}
		}
		
		/*if($this->register_manager->isPlayer($u->firstname,$u->lastname)){
			$u->account_permissions = 'b';
		}*/
		
		// Attempt to save the user into the database
		if($isNTNUWebmail && !$exist_username){
			if ($u->save()){
				//Send email confirmation
				$emailConfig = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://cpanel5.proisp.no',
					'smtp_port' => 465,
					'smtp_user' => 'omegafotball@omegafotball.no',
					'smtp_pass' => 'G)WI6FyuTtus',
					'smtp_timeout' => '30'
				);
				$this->load->library('email',$emailConfig);
				$this->email->set_newline("\r\n");
				$this->email->from('freworr@gmail.com', 'Fredrik Worren');
				$this->email->to($u->email);
				$this->email->subject('Aktivisering av bruker');
				$this->email->message('Hei '.$u->firstname."\n\n". 'Du er registrert, men du trenger og aktivisere din bruker.'."\n\n".'Trykk '.anchor(base_url().'activation/'.$u->code,'her'));
				if($this->email->send()){
					//Render success page for user and ask them to check email for activating their user
					$this->regSuccessView();
				}else{
					$error = $this->email->print_debugger().' Go to '.anchor(base_url());
					show_error($error);
				}
			}else{
				$errorMessages = $u->error->string;
				$this->register_view($errorMessages);
			}
		}else{
			if(!$isNTNUWebmail){
				$u->error_message('ntnuWebmail','Du må bruke en ntnu webmail!');
			}
			if($exist_username){
				$u->error_message('username','Brukernavnet finnes allerede!');
			}
			$errorMessages = $u->error->string;
			$this->register_view($errorMessages); 
		}
	}
	
	function register_view(){
		$page = 'signup_view';
		if ( ! file_exists('application/views/public/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = 'Registrering';
		$data['current'] = 'register';
		$this->load->view('template/header', $data);
		$this->load->view('public/'.$page, $data);
		$this->load->view('template/footer', $data);
	}
	
	/*
	|--------------------------------------------------------------------------
	|Rendering success pages for login and activation
	|--------------------------------------------------------------------------
	| 
	*/
}