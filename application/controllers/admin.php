<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Administrering';
		$data['current'] = 'admin';
		//Load the view and pass all necessery data
		$this->load->view('template/admin_header.php', $data);
		$this->load->view('admin/admin_view', $data);
		$this->load->view('template/admin_footer.php', $data);
	}
	
/*
|--------------------------------------------------------------------------
| Manage articles
|--------------------------------------------------------------------------
| 
|
*/
	
	function get_articles(){
	
	}
	
	function post_articles(){
		
	}
	
	function delete_articles(){
	
	}
	
/*
|--------------------------------------------------------------------------
| Manage images
|--------------------------------------------------------------------------
| 
|
*/
	
	function get_images(){
	
	}
	
	function upload_image(){
		if($this->input->post('upload')){
			$picture = new Gallery_model();
			$config = array(
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' => $this->gallery_path,
					'max_size' => 2048
			);
			$this->load->library('upload',$config);
			if($this->upload->do_upload()){
				$image_data = $this->upload->data();
				$picture->imagesrc = $image_data['file_name'];
				ini_set('date.timezone', 'Europe/Oslo');
				$picture->upload_time = date('Y-m-d H:i:s',time());
				$picture->save();
				$config = array(
						'source_image' => $image_data['full_path'],
						'new_image' => $this->gallery_path.'/thumbs',
						'maintain_ration' => true,
						'width' => 150,
						'height' => 100
				);
				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
				$error = 'The upload was successful! Go to '.anchor(base_url('admin'),'controllpanel');
				show_error($error);
				redirect('gallery');
			}else{
				$error = $this->upload->display_errors().'. Go to '.anchor(base_url('admin'), 'controllpanel');
				show_error($error);
			}
		}else{
			redirect('admin');
		}
	}
	
	function delete_image(){
	
	}
	
/*
|--------------------------------------------------------------------------
| Manage members
|--------------------------------------------------------------------------
| 
|
*/
	
	function get_users(){
		
	}
	
	function insert_user(){
	
	}
	
	function delete_user(){
		
	}
}

