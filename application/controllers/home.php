<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('posts_model');
	}

	public function index()
	{	
		$this->load->library('pagination');
		$page = 'home_view';
		if ( ! file_exists('application/views/public/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = 'Hjem';
		$data['current'] = 'home';
		//Get posts from database
		$posts = new Posts_model();
		$total_rows = $posts->count();
		if($total_rows > 0){
			$per_page = '6';
			$posts = $posts->order_by('id','desc');
			$offset = $this->uri->segment(2);
			$data['posts'] = $posts->get($per_page,$offset)->all;
				
			//Configurate pagination for posts
			if($offset > 0 && $offset < 5){
				$config['base_url'] = base_url();
			}else{
				$config['base_url'] = base_url('archive');
			}
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $per_page;
			$config['uri_segment'] = 2;
			$config['num_links'] = 5;
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li><a>';
			$config['cur_tag_close'] = '</a></li>';
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
		}
		//Load the view and pass all necessery data
		$this->load->view('template/header.php', $data);
		$this->load->view('public/'.$page, $data);
		$this->load->view('template/footer.php', $data);
	}
	
	function showArticle($title)
	{
		$data['title'] = $title;
		$title = str_replace('-',' ',$title);
		$article = new Posts_model;
		$article->where('title',$title);
		$data['article'] = $article->get();
		$page = 'article_view';
		$data['current'] = $article->title;
		//Load the view and pass all necessery data
		$this->load->view('template/header.php', $data);
		$this->load->view('public/'.$page, $data);
		$this->load->view('template/footer.php', $data);
	}
}