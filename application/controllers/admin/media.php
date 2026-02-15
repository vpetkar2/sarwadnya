<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/media
	 *	- or -  
	 * 		http://example.com/index.php/media/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/media/<method_name>
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
			$this->load->model('admin_media_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['medias'] = $this->admin_media_model->showall();		
		$this->load->view('admin/media_index_view',$data);
	}

	public function addMedia()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/media_add_view',$data);
	}

	public function submitMedia()
	{
		$this->form_validation->set_rules('media_title','Media Title','required|trim|xss_clean');
		$this->form_validation->set_rules('media_url','Youtube URL','required|trim|xss_clean');
			

		if ($this->form_validation->run())
		{ 			
			if($this->admin_media_model->addMedia())
			{				
				$this->session->set_flashdata('add_success','New Record Added successfully!');
				return redirect('admin/media/index');
			}
			else
			{
				$data['add_error'] = 'Error while adding record. Try again';			
				$this->load->view('admin/media_add_view',$data);
			}
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/media_add_view',$data);
		}
	}

	public function editMedia()
	{
		$media_id = $this->uri->segment(4,0);
		$media_id = $this->security->xss_clean($media_id);
		if(isset($media_id) && !empty($media_id) && $media_id!=NULL && $media_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['media_id'] = $media_id;
			$data['media'] = $this->admin_media_model->editMedia($media_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/media_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateMedia()
	{		
		$this->form_validation->set_rules('media_title','Media Title','required|trim|xss_clean');
		$this->form_validation->set_rules('media_url','Youtube URL','required|trim|xss_clean');
		$this->form_validation->set_rules('media_id','Media ID','required|trim|xss_clean|numeric');				

		if ($this->form_validation->run())
		{ 			
			if($this->admin_media_model->updateMedia())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/media/index');
			}
			else
			{
				$media_id = $this->input->post('media_id');
				$media_id = $this->security->xss_clean($media_id);
				if(isset($media_id) && !empty($media_id) && $media_id!=NULL && $media_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['media_id'] = $media_id;
					$data['media'] = $this->admin_media_model->editMedia($media_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/media_edit_view',$data);
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
			$data['media_id'] = $media_id;
			$data['media'] = $this->admin_media_model->editMedia();//echo '<pre>';print_r($data);
			$this->load->view('admin/media_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$media_id = $this->uri->segment(4,0);
		$media_id = $this->security->xss_clean($media_id);
		if(isset($media_id) && !empty($media_id) && $media_id!=NULL && $media_id > 0)
		{
			$media_array = $this->admin_media_model->getStatus($media_id);
			if($media_array->media_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_media_model->updateStatus($media_id,$status))
			{
				
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/media/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/media/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
}

/* End of file media.php */
/* Location: ./application/controllers/media.php */