<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SEO extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/seo
	 *	- or -  
	 * 		http://example.com/index.php/seo/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/seo/<method_name>
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
			$this->load->model('admin_seo_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['seoes'] = $this->admin_seo_model->showall();		
		$this->load->view('admin/seo_index_view',$data);
	}

	public function addSEO()
	{
	    $data['cities'] = $this->admin_seo_model->citiesall();
		$data['add_error'] = FALSE;
		$this->load->view('admin/seo_add_view',$data);
	}

	public function submitSEO()
	{
		$this->form_validation->set_rules('seo_title','SEO Title','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_url','SEO URL','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_key','SEO Key','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_desc','SEO Desc','required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			$seo_file = '';
			if (!empty($_FILES['seo_file']['name']))
			{
				$seo_file = $this->file_upload('seo_file', 'jpg|jpeg|png|gif', '2048', TRUE);
				$error = "error";
				
				if($seo_file!=$error)
				{
					if($this->admin_seo_model->addSEO($seo_file, $status=TRUE))
					{				
						$this->session->set_flashdata('add_success','New Record Added successfully!');
						return redirect('admin/seo/index');
					}
					else
					{
						@unlink('./upload/je/'.$seo_file);
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/seo_add_view',$data);
					}
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/seo_add_view',$data);
				}
			}
			else
			{
				if($this->admin_seo_model->addSEO($seo_file, $status=FALSE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/seo/index');
				}
				else
				{
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/seo_add_view',$data);
				}			
			}
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/seo_add_view',$data);
		}
	}

	public function editSEO()
	{
		$seo_id = $this->uri->segment(4,0);
		$seo_id = $this->security->xss_clean($seo_id);
		if(isset($seo_id) && !empty($seo_id) && $seo_id!=NULL && $seo_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['seo_id'] = $seo_id;
			$data['cities'] = $this->admin_seo_model->citiesall();
			$data['seo'] = $this->admin_seo_model->editSEO($seo_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/seo_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function deleteseo() {
	    $seo_id = $this->uri->segment(4,0);
		$seo_id = $this->security->xss_clean($seo_id);
		if(isset($seo_id) && !empty($seo_id) && $seo_id!=NULL && $seo_id > 0)
		{
		    $this->admin_seo_model->deleteSEO($seo_id);
		}
		return redirect('admin/seo/index');
	}

	public function updateSEO()
	{		
		$this->form_validation->set_rules('seo_title','SEO Title','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_url','SEO URL','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_key','SEO Key','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_desc','SEO Desc','required|trim|xss_clean');
		$this->form_validation->set_rules('seo_id','SEO ID','required|trim|xss_clean|numeric');				

		if ($this->form_validation->run())
		{
			$seo_file = ''; $status=FALSE;
			$seo_id   = $this->input->post('seo_id');
			$seo_id   = $this->security->xss_clean($seo_id);
				
			if (!empty($_FILES['seo_file']['name']))
			{
				$seo_file = $this->file_upload('seo_file', 'jpg|jpeg|png|gif', '2048', TRUE);

				$error = "error";
					
				if($seo_file!=$error)
				{
					$old_file = $this->security->xss_clean($this->input->post('old_file'));
					if($old_file!="")
					{
						//$path_to_file = base_url().'upload/je/'.$old_file;
						@unlink('./upload/je/'.$old_file);
					}
					
					$status=TRUE;
				}
				else
				{
					$data['add_error'] = 'There is an error while uploading file. Please try again.';
					$data['seo_id']    = $seo_id;
					$data['seo']       = $this->admin_seo_model->editSEO($seo_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/seo_edit_view',$data);
				}
			}
			
			if($this->admin_seo_model->updateSEO($seo_file, $status))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/seo/index');
			}
			else
			{
				if($seo_file!="")
				{
					@unlink('./upload/je/'.$seo_file);
				}
				
				
				if(isset($seo_id) && !empty($seo_id) && $seo_id!=NULL && $seo_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['seo_id'] = $seo_id;
					$data['seo'] = $this->admin_seo_model->editSEO($seo_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/seo_edit_view',$data);
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
			$data['seo_id'] = $seo_id;
			$data['seo'] = $this->admin_seo_model->editSEO($seo_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/seo_edit_view',$data);
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

/* End of file cms.php */
/* Location: ./application/controllers/cms.php */
