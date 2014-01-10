<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Gallery extends CI_Controller {
	
	var $gallery_path;
	
	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->gallery_path = realpath(APPPATH.'../img/gallery');
	}

	public function index()
	{	
		$page = 'gallery_view';
		$this->load->library('pagination');
		if ( ! file_exists('application/views/public/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = 'Bildegalleri';
		$data['current'] = 'gallery';
		$data['pagination'] = '';
		$data['images'] = '';
		$picture = new Gallery_model();
		$total_rows = $picture->count();
		if($total_rows > 0){
			$per_page = '15';
			$picture = $picture->order_by('image_id','asc');
			$offset = $this->uri->segment(2);
			$data['images'] = $picture->get($per_page,$offset)->all;
			$config['base_url'] = base_url('gallery');
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
}