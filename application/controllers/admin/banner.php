<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/banner
	 *	- or -  
	 * 		http://example.com/index.php/banner/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/banner/<method_name>
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
			$this->load->model('admin_banner_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['banners'] = $this->admin_banner_model->showall();		
		$this->load->view('admin/banner_index_view',$data);
	}
	public function editcap()
	{
		$ban_id = $this->uri->segment(4,0);
		$img_id = $this->uri->segment(5,0);
		$data['ban_id'] = $ban_id;
		$data['img_id'] = $img_id;
		$data['banners'] = $this->admin_banner_model->Editcap($ban_id,$img_id);		
		$this->load->view('admin/banner_cap_view',$data);
	}

	public function submitCap()
	{
		$this->form_validation->set_rules('ban_cap','Caption','required|trim|xss_clean');
	    $ban_id = $this->input->post('ban_id');
		if ($this->form_validation->run())
		{
			$this->admin_banner_model->addCap();
					
			$this->session->set_flashdata('cap_success','Caption Edited successfully!');
			return redirect('admin/banner/bannerImages/'.$ban_id);
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/banner_cap_view',$data);				
		}
	}

	public function addBanner()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/banner_add_view',$data);
	}

	public function submitBanner()
	{
		$this->form_validation->set_rules('ban_title','Title','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$this->admin_banner_model->addBanner();
					
			$this->session->set_flashdata('add_success','Record Added successfully!');
			return redirect('admin/banner');
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/banner_add_view',$data);				
		}
	}

	public function editBanner()
	{
		$ban_id = $this->uri->segment(4,0);
		$ban_id = $this->security->xss_clean($ban_id);
		if(isset($ban_id) && !empty($ban_id) && $ban_id!=NULL && $ban_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['ban_id'] = $ban_id;
			$data['banner'] = $this->admin_banner_model->editBanner($ban_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/banner_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateBanner()
	{		
		$this->form_validation->set_rules('ban_title','Title','required|trim|xss_clean');
		
		$ban_id = $this->input->post('ban_id');
		$ban_id = $this->security->xss_clean($ban_id);
		
		if ($this->form_validation->run())
		{
			if($this->admin_banner_model->updateBanner())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/banner/index');
			}
			else
			{				
				if(isset($ban_id) && !empty($ban_id) && $ban_id!=NULL && $ban_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['ban_id'] = $ban_id;
					$data['banner'] = $this->admin_banner_model->editBanner($ban_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/banner_edit_view',$data);
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
			$data['ban_id'] = $ban_id;
			$data['banner'] = $this->admin_ban_model->editBanner();//echo '<pre>';print_r($data);
			$this->load->view('admin/banner_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$ban_id = $this->uri->segment(4,0);
		$ban_id = $this->security->xss_clean($ban_id);
		if(isset($ban_id) && !empty($ban_id) && $ban_id!=NULL && $ban_id > 0)
		{
			$ban_array = $this->admin_banner_model->getStatus($ban_id);
			if($ban_array->ban_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_banner_model->updateStatus($ban_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/banner/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/banner/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function bannerImages($ban_id)
	{
		if(isset($ban_id) && !empty($ban_id) && $ban_id!=NULL && $ban_id > 0)
		{
			$data['bimages'] = $this->admin_banner_model->showallImages($ban_id);
			$data['ban_id'] = $ban_id;	
			$data['add_error'] = FALSE;
			//echo "<pre>";print_r($data);exit;
			$this->load->view('admin/banner_images_index_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function submitBannerImage()
	{
		$this->form_validation->set_rules('ban_id','Banner ID','required|trim|xss_clean');
		if(empty($_FILES['ban_image']['name']))
		{
			$this->form_validation->set_rules('ban_image','Image','required');
		}
		
		$ban_id = $this->input->post('ban_id');
		$ban_id = $this->security->xss_clean($ban_id);

		if ($this->form_validation->run())
		{
			$ban_image = '';
			
			$ban_image = $this->file_upload('ban_image', 'jpg|jpeg|png|gif', '2048', TRUE);
			$error = "error";
			
			if($ban_image!=$error)
			{
				if($this->admin_banner_model->addBannerImage($ban_image, $status=TRUE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/banner/bannerImages/'.$ban_id);
				}
				else
				{
					@unlink('./upload/je/'.$ban_image);
					$data['bimages'] = $this->admin_banner_model->showallImages($ban_id);
					$data['ban_id'] = $ban_id;		
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/banner_images_index_view',$data);
				}
			}
			else
			{
				$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
				$data['bimages'] = $this->admin_banner_model->showallImages($ban_id);
				$data['ban_id'] = $ban_id;				
				$this->load->view('admin/banner_images_index_view',$data);
			}
		}
		else
		{
			$data['bimages'] = $this->admin_banner_model->showallImages($ban_id);
			$data['ban_id'] = $ban_id;	
			$data['add_error'] = FALSE;	
			$this->load->view('admin/banner_images_index_view',$data);
		}
	}
	
	public function deleteBannerImage($ban_id, $img_id)
	{
		if(isset($ban_id) && !empty($ban_id) && $ban_id!=NULL && $ban_id > 0)
		{
			if(isset($img_id) && !empty($img_id) && $img_id!=NULL && $img_id > 0)
			{
				$ban_image = $this->db->get_where('banner_image', array('img_id' => $img_id))->row()->ban_image;
				@unlink('./upload/je/'.$ban_image);
				
				$this->admin_banner_model->deleteBannerImage($ban_id, $img_id);
				
				$this->session->set_flashdata('delete_success','Image Record Deleted successfully!');
				return redirect('admin/banner/bannerImages/'.$ban_id);
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
		$config['upload_path']   = './upload/je/'; 
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
}

/* End of file banner.php */
/* Location: ./application/controllers/banner.php */