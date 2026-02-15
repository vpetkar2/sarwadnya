<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/client
	 *	- or -  
	 * 		http://example.com/index.php/client/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/client/<method_name>
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
			$this->load->model('admin_client_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['clientes'] = $this->admin_client_model->showall();		
		$this->load->view('admin/client_index_view',$data);
	}

	public function addClient()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/client_add_view',$data);
	}

	public function submitClient()
	{
		$this->form_validation->set_rules('client_title','Client Title','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			if (!empty($_FILES['client']['name']))
			{
				$client = $this->file_upload('client', 'gif|jpg|png|jpeg', '2048', TRUE);

				$error = "error";
					
				if($client!=$error)
				{
					$this->admin_client_model->addClient($client);
					
					$this->session->set_flashdata('add_success','Record Added successfully!');
					return redirect('admin/client');
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/client_add_view',$data);
				}
			}
			else
			{
				$data['add_error'] = "Some of the required fields are missing!.";
				$this->load->view('admin/client_add_view',$data);				
			}
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/client_add_view',$data);				
		}
	}

	public function editClient()
	{
		$client_id = $this->uri->segment(4,0);
		$client_id = $this->security->xss_clean($client_id);
		if(isset($client_id) && !empty($client_id) && $client_id!=NULL && $client_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['client_id'] = $client_id;
			$data['client'] = $this->admin_client_model->editClient($client_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/client_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateClient()
	{		
		$this->form_validation->set_rules('client_title','Client Question','required|trim|xss_clean');
		
		$client_id = $this->input->post('client_id');
		$client_id = $this->security->xss_clean($client_id);
		
		if ($this->form_validation->run())
		{
			$client = '';
			if (!empty($_FILES['client']['name']))
			{
				$client = $this->file_upload('client', 'gif|jpg|png', '2048', TRUE);

				$error = "error";
					
				if($client!=$error)
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
					$data['client_id'] = $client_id;
					$data['client'] = $this->admin_client_model->editClient($client_id);//echo '<pre>';print_r($data);
					$data['add_error'] = "There is an error while uploading file. Please try again.";
					$this->load->view('admin/client_edit_view',$data);
				}
			}

			if($this->admin_client_model->updateClient($client))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/client/index');
			}
			else
			{
				
				if(isset($client_id) && !empty($client_id) && $client_id!=NULL && $client_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['client_id'] = $client_id;
					$data['client'] = $this->admin_client_model->editClient($client_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/client_edit_view',$data);
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
			$data['client_id'] = $client_id;
			$data['client'] = $this->admin_client_model->editClient();//echo '<pre>';print_r($data);
			$this->load->view('admin/client_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$client_id = $this->uri->segment(4,0);
		$client_id = $this->security->xss_clean($client_id);
		if(isset($client_id) && !empty($client_id) && $client_id!=NULL && $client_id > 0)
		{
			$client_array = $this->admin_client_model->getStatus($client_id);
			if($client_array->client_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_client_model->updateStatus($client_id,$status))
			{
				
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/client/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/client/index');
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

/* End of file client.php */
/* Location: ./application/controllers/client.php */