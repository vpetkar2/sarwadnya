<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/team
	 *	- or -  
	 * 		http://example.com/index.php/team/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/team/<method_name>
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
			$this->load->model('admin_team_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['teams'] = $this->admin_team_model->showall();		
		$this->load->view('admin/team_index_view',$data);
	}

	public function addTeam()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/team_add_view',$data);
	}

	public function submitTeam()
	{
		$this->form_validation->set_rules('team_title','Member Name','required|trim|xss_clean');
		$this->form_validation->set_rules('team_designation','Designation','required|trim|xss_clean');
		$this->form_validation->set_rules('team_profile','Profile','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			if (!empty($_FILES['team']['name']))
			{
				$team = $this->file_upload('team', 'gif|jpg|png|jpeg', '2048', TRUE);

				$error = "error";
					
				if($team!=$error)
				{
					$this->admin_team_model->addTeam($team);
					
					$this->session->set_flashdata('add_success','Record Added successfully!');
					return redirect('admin/team');
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/team_add_view',$data);
				}
			}
			else
			{
				$data['add_error'] = "Some of the required fields are missing!.";
				$this->load->view('admin/team_add_view',$data);				
			}
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/team_add_view',$data);				
		}
	}

	public function editTeam()
	{
		$team_id = $this->uri->segment(4,0);
		$team_id = $this->security->xss_clean($team_id);
		if(isset($team_id) && !empty($team_id) && $team_id!=NULL && $team_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['team_id'] = $team_id;
			$data['team'] = $this->admin_team_model->editTeam($team_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/team_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateTeam()
	{	

		$this->form_validation->set_rules('team_title','Member Name','required|trim|xss_clean');
		$this->form_validation->set_rules('team_designation','Designation','required|trim|xss_clean');
		$this->form_validation->set_rules('team_profile','Profile','required|trim|xss_clean');
		$this->form_validation->set_rules('team_id','Member ID','required|trim|xss_clean');
		
		$team_id = $this->input->post('team_id');
		$team_id = $this->security->xss_clean($team_id);
		
		if ($this->form_validation->run())
		{
			$team = '';
			if (!empty($_FILES['team']['name']))
			{
				$team = $this->file_upload('team', 'gif|jpg|png', '2048', TRUE);

				$error = "error";
					
				if($team!=$error)
				{
					
					$old_file = $this->security->xss_clean($this->input->post('old_file'));
					if($old_file!="")
					{
						//$path_to_file = base_url().'upload/je/'.$old_file;
						@unlink('./upload/je/'.$old_file);
					}
				}
				else
				{
					
					$data['team_id'] = $team_id;
					$data['team'] = $this->admin_team_model->editTeam($team_id);//echo '<pre>';print_r($data);
					$data['add_error'] = "There is an error while uploading file. Please try again.";
					$this->load->view('admin/team_edit_view',$data);
				}
			}

			if($this->admin_team_model->updateTeam($team))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/team/index');
			}
			else
			{
				
				if(isset($team_id) && !empty($team_id) && $team_id!=NULL && $team_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['team_id'] = $team_id;
					$data['team'] = $this->admin_team_model->editTeam($team_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/team_edit_view',$data);
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
			$data['team_id'] = $team_id;
			$data['team'] = $this->admin_team_model->editTeam();//echo '<pre>';print_r($data);
			$this->load->view('admin/team_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$team_id = $this->uri->segment(4,0);
		$team_id = $this->security->xss_clean($team_id);
		if(isset($team_id) && !empty($team_id) && $team_id!=NULL && $team_id > 0)
		{
			$team_array = $this->admin_team_model->getStatus($team_id);
			if($team_array->team_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_team_model->updateStatus($team_id,$status))
			{
				
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/team/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/team/index');
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
	public function cmsIndex()
	{
		$data['cmses'] = $this->admin_team_model->showallCMS();		
		$this->load->view('admin/team_cms_index_view',$data);
	}

	public function addCMS()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/team_cms_add_view',$data);
	}

	public function submitCMS()
	{
		$this->form_validation->set_rules('tcms_title','Title','required|trim|xss_clean');
		$this->form_validation->set_rules('tcms_desc','Description','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$this->admin_team_model->addCMS();
					
			$this->session->set_flashdata('add_success','Record Added successfully!');
			return redirect('admin/team/cmsIndex');
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/team_cms_add_view',$data);				
		}
	}

	public function editCMS()
	{
		$tcms_id = $this->uri->segment(4,0);
		$tcms_id = $this->security->xss_clean($tcms_id);
		if(isset($tcms_id) && !empty($tcms_id) && $tcms_id!=NULL && $tcms_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['tcms_id'] = $tcms_id;
			$data['cms'] = $this->admin_team_model->editCMS($tcms_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/team_cms_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateCMS()
	{		
		$this->form_validation->set_rules('tcms_title','Title','required|trim|xss_clean');
		$this->form_validation->set_rules('tcms_desc','Description','required|trim|xss_clean');
		
		$tcms_id = $this->input->post('tcms_id');
		$tcms_id = $this->security->xss_clean($tcms_id);
		
		if ($this->form_validation->run())
		{
			if($this->admin_team_model->updateCMS())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/team/cmsIndex');
			}
			else
			{				
				if(isset($tcms_id) && !empty($tcms_id) && $tcms_id!=NULL && $tcms_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['tcms_id'] = $tcms_id;
					$data['cms'] = $this->admin_team_model->editCMS($tcms_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/team_cms_edit_view',$data);
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
			$data['tcms_id'] = $tcms_id;
			$data['cms'] = $this->admin_team_model->editCMS($tcms_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/team_cms_edit_view',$data);
		}		
	}

	public function updateCMSstatus()
	{
		$tcms_id = $this->uri->segment(4,0);
		$tcms_id = $this->security->xss_clean($tcms_id);
		if(isset($tcms_id) && !empty($tcms_id) && $tcms_id!=NULL && $tcms_id > 0)
		{
			$gal_array = $this->admin_team_model->getCMSstatus($tcms_id);
			if($gal_array->tcms_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_team_model->updateCMSstatus($tcms_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/team/cmsIndex');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/team/cmsIndex');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function CMSImages($tcms_id)
	{
		if(isset($tcms_id) && !empty($tcms_id) && $tcms_id!=NULL && $tcms_id > 0)
		{
			$data['bimages'] = $this->admin_team_model->showallImages($tcms_id);
			$data['tcms_id'] = $tcms_id;	
			$data['add_error'] = FALSE;
			//echo "<pre>";print_r($data);exit;
			$this->load->view('admin/team_cms_gallery_images_index_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function submitCMSImage()
	{
		$this->form_validation->set_rules('tcms_id','CMS ID','required|trim|xss_clean');
		if(empty($_FILES['gal_image']['name']))
		{
			$this->form_validation->set_rules('gal_image','Image','required');
		}
		
		$tcms_id = $this->input->post('tcms_id');
		$tcms_id = $this->security->xss_clean($tcms_id);

		if ($this->form_validation->run())
		{
			$gal_image = '';
			
			$gal_image = $this->file_upload('gal_image', 'jpg|jpeg|png|gif', '2048', TRUE);
			$error = "error";
			
			if($gal_image!=$error)
			{
				if($this->admin_team_model->addGalleryImage($gal_image, $status=TRUE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/team/CMSImages/'.$tcms_id);
				}
				else
				{
					@unlink('./upload/je/'.$gal_image);
					$data['bimages'] = $this->admin_team_model->showallImages($tcms_id);
					$data['tcms_id'] = $tcms_id;		
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/team_cms_gallery_images_index_view',$data);
				}
				
			}
			else
			{
				$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
				$data['bimages'] = $this->admin_team_model->showallImages($tcms_id);
				$data['tcms_id'] = $tcms_id;				
				$this->load->view('admin/team_cms_gallery_images_index_view',$data);
			}
		}
		else
		{
			$data['bimages'] = $this->admin_team_model->showallImages($tcms_id);
			$data['tcms_id'] = $tcms_id;	
			$data['add_error'] = FALSE;	
			$this->load->view('admin/team_cms_gallery_images_index_view',$data);
		}
	}
	
	public function deleteGalleryImage($tcms_id, $img_id)
	{
		if(isset($tcms_id) && !empty($tcms_id) && $tcms_id!=NULL && $tcms_id > 0)
		{
			if(isset($img_id) && !empty($img_id) && $img_id!=NULL && $img_id > 0)
			{
				$gal_image = $this->db->get_where('team_cms_gallery_image', array('img_id' => $img_id))->row()->gal_image;
								
				
				if($this->admin_team_model->deleteGalleryImage($tcms_id, $img_id))
				{
					@unlink('./upload/je/'.$gal_image);
					$this->session->set_flashdata('delete_success','Image Record Deleted successfully!');
					return redirect('admin/team/CMSImages/'.$tcms_id);
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
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
}

/* End of file team.php */
/* Location: ./application/controllers/team.php */