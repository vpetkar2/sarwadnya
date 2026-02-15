<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/gallery
	 *	- or -  
	 * 		http://example.com/index.php/gallery/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/gallery/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('admin_logged_in'))
		{
			redirect('admin/login');
		}
		else
		{
			$this->load->model('admin_gallery_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['gallerys'] = $this->admin_gallery_model->showall();		
		$this->load->view('admin/gallery_index_view',$data);
	}

	public function addGallery()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/gallery_add_view',$data);
	}

	public function submitGallery()
	{
		$this->form_validation->set_rules('gal_title','Title','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$this->admin_gallery_model->addGallery();
					
			$this->session->set_flashdata('add_success','Record Added successfully!');
			return redirect('admin/gallery');
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/gallery_add_view',$data);				
		}
	}

	public function editGallery()
	{
		$gal_id = $this->uri->segment(4,0);
		$gal_id = $this->security->xss_clean($gal_id);
		if(isset($gal_id) && !empty($gal_id) && $gal_id!=NULL && $gal_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['gal_id'] = $gal_id;
			$data['gallery'] = $this->admin_gallery_model->editGallery($gal_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/gallery_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateGallery()
	{		
		$this->form_validation->set_rules('gal_title','Title','required|trim|xss_clean');
		
		$gal_id = $this->input->post('gal_id');
		$gal_id = $this->security->xss_clean($gal_id);
		
		if ($this->form_validation->run())
		{
			if($this->admin_gallery_model->updateGallery())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/gallery/index');
			}
			else
			{				
				if(isset($gal_id) && !empty($gal_id) && $gal_id!=NULL && $gal_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['gal_id'] = $gal_id;
					$data['gallery'] = $this->admin_gallery_model->editGallery($gal_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/gallery_edit_view',$data);
				}
				else
				{ 
					return redirect('admin/fournotfour');
				}
			}				
		}
		else
		{
			$data['add_error'] = FALSE;
			$data['gal_id'] = $gal_id;
			$data['gallery'] = $this->admin_gal_model->editGallery();//echo '<pre>';print_r($data);
			$this->load->view('admin/gallery_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$gal_id = $this->uri->segment(4,0);
		$gal_id = $this->security->xss_clean($gal_id);
		if(isset($gal_id) && !empty($gal_id) && $gal_id!=NULL && $gal_id > 0)
		{
			$gal_array = $this->admin_gallery_model->getStatus($gal_id);
			if($gal_array->gal_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_gallery_model->updateStatus($gal_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/gallery/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/gallery/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function galleryImages($gal_id)
	{
		if(isset($gal_id) && !empty($gal_id) && $gal_id!=NULL && $gal_id > 0)
		{
			$data['bimages'] = $this->admin_gallery_model->showallImages($gal_id);
			$data['gal_id'] = $gal_id;	
			$data['add_error'] = FALSE;
			//echo "<pre>";print_r($data);exit;
			$this->load->view('admin/gallery_images_index_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function submitGalleryImage()
	{
		$this->form_validation->set_rules('gal_id','Gallery ID','required|trim|xss_clean');
		if(empty($_FILES['gal_image']['name']))
		{
			$this->form_validation->set_rules('gal_image','Image','required');
		}
		
		$gal_id = $this->input->post('gal_id');
		$gal_id = $this->security->xss_clean($gal_id);

		if ($this->form_validation->run())
		{
			$gal_image = '';
			
			$gal_image = $this->file_upload('gal_image', 'jpg|jpeg|png|gif', '2048', TRUE);
			$error = "error";
			
			if($gal_image!=$error)
			{
				$path = base_url()."upload/gallery/";
				$thumb_image = $this->generate_thumbnail($gal_image, $height=276, $width=551);
				
				if($thumb_image!=$error)
				{				
					if($this->admin_gallery_model->addGalleryImage($gal_image, $status=TRUE))
					{				
						$this->session->set_flashdata('add_success','New Record Added successfully!');
						return redirect('admin/gallery/galleryImages/'.$gal_id);
					}
					else
					{
						@unlink('./upload/gallery/'.$gal_image);
						$data['bimages'] = $this->admin_gallery_model->showallImages($gal_id);
						$data['gal_id'] = $gal_id;		
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/gallery_images_index_view',$data);
					}
				}
				else
				{
					@unlink('./upload/gallery/'.$gal_image);
					@unlink('./upload/gallery/'.$thumb_image);
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$data['bimages'] = $this->admin_gallery_model->showallImages($gal_id);
					$data['gal_id'] = $gal_id;				
					$this->load->view('admin/gallery_images_index_view',$data);
				}
			}
			else
			{
				@unlink('./upload/gallery/'.$gal_image);
				$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
				$data['bimages'] = $this->admin_gallery_model->showallImages($gal_id);
				$data['gal_id'] = $gal_id;				
				$this->load->view('admin/gallery_images_index_view',$data);
			}
		}
		else
		{
			$data['bimages'] = $this->admin_gallery_model->showallImages($gal_id);
			$data['gal_id'] = $gal_id;	
			$data['add_error'] = FALSE;	
			$this->load->view('admin/gallery_images_index_view',$data);
		}
	}
	
	public function deleteGalleryImage($gal_id, $img_id)
	{
		if(isset($gal_id) && !empty($gal_id) && $gal_id!=NULL && $gal_id > 0)
		{
			if(isset($img_id) && !empty($img_id) && $img_id!=NULL && $img_id > 0)
			{
				$gal_image = $this->db->get_where('gallery_image', array('img_id' => $img_id))->row()->gal_image;
				@unlink('./upload/gallery/'.$gal_image);
				
				$image_document = './upload/gallery/'.stripslashes($gal_image);
	
				$path = pathinfo($image_document);
				
				$gal_thumb_path = './upload/gallery/'.$path['filename'] .'_thumb.'.$path['extension'];
				@unlink('./upload/gallery/'.$gal_thumb_path);
				
				$this->admin_gallery_model->deleteGalleryImage($gal_id, $img_id);
				
				$this->session->set_flashdata('delete_success','Image Record Deleted successfully!');
				return redirect('admin/gallery/galleryImages/'.$gal_id);
			}
			else
			{ 
				return redirect('admin/fournotfour');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function file_upload($field_name, $type, $size, $encryption)
	{
		$config['upload_path']   = './upload/gallery/'; 
		$config['allowed_types'] = $type; 
		$config['max_size']      = $size; 
		/*$config['max_width']     = 1024; 
		$config['max_height']    = 768;*/
		$config['encrypt_name'] = $encryption;
		$this->load->library('upload', $config);
						
		if ( $this->upload->do_upload($field_name))
		{
			$upload = $this->upload->data();
			
			return $upload['file_name'];
		}					
		else
		{
			//$error = array('error' => $this->upload->display_errors());echo '<pre>';print_r($error);exit;
			return 'error';
		}
	}
	
	public function generate_thumbnail($file_name, $height, $width)
	{
		$gal_image = realpath ( "upload/gallery/" ) . "/" .stripslashes($file_name);					
					
		$path = pathinfo($gal_image);
		
		$gal_thumb_path_exist =realpath ( "upload/gallery/" ) . "/" . $path['filename'] .'_thumb.'.$path['extension'];
		
		if (file_exists($gal_thumb_path_exist))
		{
			$thumb_file_name = $path['filename'].'_thumb.'.$path['extension'];
		}
		else
		{
			//echo "nope...";
			$config['image_library'] = 'gd2';
			$config['source_image'] = $gal_image;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $width;
			$config['height'] = $height;					
			
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);						
			
			if($this->image_lib->resize())
			{
				$thumb_file_name = $path['filename'].'_thumb.'.$path['extension'];
			}
			else
			{
				$thumb_file_name='error';
			}
			$this->image_lib->clear();
		}
		
		return $thumb_file_name;
	}
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */