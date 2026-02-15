<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrier extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/category
	 *	- or -  
	 * 		http://example.com/index.php/category/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/category/<method_name>
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
			$this->load->model('admin_carrier_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['carriers'] = $this->admin_carrier_model->showall();		
		$this->load->view('admin/carrier_index_view',$data);
	}

	public function addCarrier()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/carrier_add_view',$data);
	}

	public function submitCarrier()
	{
		$this->form_validation->set_rules('crr_title','Title','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$this->admin_carrier_model->addCarrier();
					
			$this->session->set_flashdata('add_success','Record Added successfully!');
			return redirect('admin/carrier');
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/carrier_add_view',$data);				
		}
	}

	public function editCarrier()
	{
		$crr_id = $this->uri->segment(4,0);
		$crr_id = $this->security->xss_clean($crr_id);
		if(isset($crr_id) && !empty($crr_id) && $crr_id!=NULL && $crr_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['crr_id'] = $crr_id;
			$data['carrier'] = $this->admin_carrier_model->editCarrier($crr_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/carrier_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateCarrier()
	{		
		$this->form_validation->set_rules('crr_title','Title','required|trim|xss_clean');
		
		$crr_id = $this->input->post('crr_id');
		$crr_id = $this->security->xss_clean($crr_id);
		
		if ($this->form_validation->run())
		{
			if($this->admin_carrier_model->updateCarrier())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/carrier/index');
			}
			else
			{				
				if(isset($crr_id) && !empty($crr_id) && $crr_id!=NULL && $crr_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['crr_id'] = $crr_id;
					$data['carrier'] = $this->admin_carrier_model->editCarrier($crr_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/carrier_edit_view',$data);
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
			$data['crr_id'] = $crr_id;
			$data['carrier'] = $this->admin_carrier_model->editCarrier();//echo '<pre>';print_r($data);
			$this->load->view('admin/carrier_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$crr_id = $this->uri->segment(4,0);
		$crr_id = $this->security->xss_clean($crr_id);
		if(isset($crr_id) && !empty($crr_id) && $crr_id!=NULL && $crr_id > 0)
		{
			$cat_array = $this->admin_carrier_model->getStatus($crr_id);
			if($cat_array->crr_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_carrier_model->updateStatus($crr_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/carrier/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/carrier/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
}

/* End of file category.php */
/* Location: ./application/controllers/category.php */