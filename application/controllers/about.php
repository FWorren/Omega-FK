<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{	
		$page = 'about_view';
		if ( ! file_exists('application/views/public/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = 'Klubb';
		$data['current'] = 'about';
		//Load the view and pass all necessery data
		$this->load->view('template/header.php', $data);
		$this->load->view('public/'.$page, $data);
		$this->load->view('template/footer.php', $data);
	}
	
	public function about_articles_view($title){
		$page = 'about_view';
		if ( ! file_exists('application/views/public/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		if ($title == 'squad' ) {
			$title = 'Spillerstall';
		}
		else if ($title == 'halloffame' ) {
			$title = 'Hall of Fame';
		}
		$data['title'] = $title;
		$data['current'] = 'about';
		$article = new Posts_model;
		$article->where('title',$title);
		$data['article'] = $article->get();
		//Load the view and pass all necessery data
		$this->load->view('template/header.php', $data);
		$this->load->view('public/'.$page, $data);
		$this->load->view('template/footer.php', $data);
	}
}