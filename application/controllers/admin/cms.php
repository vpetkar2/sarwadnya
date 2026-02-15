<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMS extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/cms
	 *	- or -  
	 * 		http://example.com/index.php/cms/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/cms/<method_name>
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
			$this->load->model('admin_cms_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['cmses'] = $this->admin_cms_model->showall();		
		$this->load->view('admin/cms_index_view',$data);
	}

	public function addCMS()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/cms_add_view',$data);
	}

	public function submitCMS()
	{
		$this->form_validation->set_rules('cms_title','CMS Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cms_url','CMS URL','required|trim|xss_clean');
		$this->form_validation->set_rules('cms_window_title','CMS Window Title','required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			$cms_file = '';
			if (!empty($_FILES['cms_file']['name']))
			{
				$cms_file = $this->file_upload('cms_file', 'jpg|jpeg|png|gif', '2048', TRUE);
				$error = "error";
				
				if($cms_file!=$error)
				{
					if($this->admin_cms_model->addCMS($cms_file, $status=TRUE))
					{				
						$this->session->set_flashdata('add_success','New Record Added successfully!');
						return redirect('admin/cms/index');
					}
					else
					{
						@unlink('./upload/je/'.$cms_file);
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/cms_add_view',$data);
					}
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/cms_add_view',$data);
				}
			}
			else
			{
				if($this->admin_cms_model->addCMS($cms_file, $status=FALSE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/cms/index');
				}
				else
				{
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/cms_add_view',$data);
				}			
			}
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/cms_add_view',$data);
		}
	}

	public function editCMS()
	{
		$cms_id = $this->uri->segment(4,0);
		$cms_id = $this->security->xss_clean($cms_id);
		if(isset($cms_id) && !empty($cms_id) && $cms_id!=NULL && $cms_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['cms_id'] = $cms_id;
			$data['cms'] = $this->admin_cms_model->editCMS($cms_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/cms_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateCMS()
	{		
		$this->form_validation->set_rules('cms_title','CMS Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cms_url','CMS URL','required|trim|xss_clean');
		$this->form_validation->set_rules('cms_window_title','CMS Window Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cms_id','CMS ID','required|trim|xss_clean|numeric');				

		if ($this->form_validation->run())
		{
			$cms_file = ''; $status=FALSE;
			$cms_id = $this->input->post('cms_id');
			$cms_id = $this->security->xss_clean($cms_id);
				
			if (!empty($_FILES['cms_file']['name']))
			{
				$cms_file = $this->file_upload('cms_file', 'jpg|jpeg|png|gif', '2048', TRUE);

				$error = "error";
					
				if($cms_file!=$error)
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
					$data['cms_id'] = $cms_id;
					$data['cms'] = $this->admin_cms_model->editCMS($cms_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/cms_edit_view',$data);
				}
			}
			
			if($this->admin_cms_model->updateCMS($cms_file, $status))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/cms/index');
			}
			else
			{
				if($cms_file!="")
				{
					@unlink('./upload/je/'.$cms_file);
				}
				
				
				if(isset($cms_id) && !empty($cms_id) && $cms_id!=NULL && $cms_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['cms_id'] = $cms_id;
					$data['cms'] = $this->admin_cms_model->editCMS($cms_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/cms_edit_view',$data);
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
			$data['cms_id'] = $cms_id;
			$data['cms'] = $this->admin_cms_model->editCMS($cms_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/cms_edit_view',$data);
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