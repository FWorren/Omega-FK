<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Contact extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$page = 'contact_view';
		if ( ! file_exists('application/views/public/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = 'Kontakt';
		$data['current'] = 'kontakt';
		//Load the view and pass all necessery data
		$this->load->view('template/header.php', $data);
		$this->load->view('public/'.$page, $data);
		$this->load->view('template/footer.php', $data);
	}
}