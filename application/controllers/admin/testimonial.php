<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/testimonial
	 *	- or -  
	 * 		http://example.com/index.php/testimonial/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/testimonial/<method_name>
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
			$this->load->model('admin_testimonial_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['testimonials'] = $this->admin_testimonial_model->showall();		
		$this->load->view('admin/testimonial_index_view',$data);
	}

	public function addTestimonial()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/testimonial_add_view',$data);
	}

	public function submitTestimonial()
	{
		$this->form_validation->set_rules('tes_name','Name','required|trim|xss_clean');
		//$this->form_validation->set_rules('tes_company','Company Name','required|trim|xss_clean');
		$this->form_validation->set_rules('tes_detail','Details','required|trim|xss_clean');

		if ($this->form_validation->run())
		{	
			if($this->admin_testimonial_model->addTestimonial())
			{				
				$this->session->set_flashdata('add_success','New Testimonial Added successfully!');
				return redirect('admin/testimonial/index');
			}
			else
			{
				$data['add_error'] = 'Error while adding record. Try again';			
				$this->load->view('admin/testimonial_add_view',$data);
			}
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/testimonial_add_view',$data);
		}
	}

	public function editTestimonial()
	{
		$tes_id = $this->uri->segment(4,0);
		$tes_id = $this->security->xss_clean($tes_id);
		if(isset($tes_id) && !empty($tes_id) && $tes_id!=NULL && $tes_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['tes_id'] = $tes_id;
			$data['testimonial'] = $this->admin_testimonial_model->editTestimonial($tes_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/testimonial_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateTestimonial()
	{		
		$this->form_validation->set_rules('tes_name','Name','required|trim|xss_clean');
		//$this->form_validation->set_rules('tes_company','Company Name','required|trim|xss_clean');
		$this->form_validation->set_rules('tes_detail','Details','required|trim|xss_clean');
		$this->form_validation->set_rules('tes_id','Testimonial ID','required|trim|xss_clean|numeric');				

		if ($this->form_validation->run())
		{
			$tes_id = $this->input->post('tes_id');
			$tes_id = $this->security->xss_clean($tes_id);
				
			if($this->admin_testimonial_model->updateTestimonial())
			{				
				$this->session->set_flashdata('update_success','Testimonial Updated successfully!');
				return redirect('admin/testimonial/index');
			}
			else
			{
				$data['add_error'] = 'Error while updating record. Try again';
				$data['tes_id'] = $tes_id;
				$data['testimonial'] = $this->admin_testimonial_model->editTestimonial($tes_id);//echo '<pre>';print_r($data);
				$this->load->view('admin/testimonial_edit_view',$data);
			}				
		}
		else
		{
			$data['add_error'] = FALSE;
			$data['tes_id'] = $tes_id;
			$data['testimonial'] = $this->admin_testimonial_model->editTestimonial($tes_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/testimonial_edit_view',$data);
		}		
	}
	
	public function updateStatus()
	{
		$tes_id = $this->uri->segment(4,0);
		$tes_id = $this->security->xss_clean($tes_id);
		if(isset($tes_id) && !empty($tes_id) && $tes_id!=NULL && $tes_id > 0)
		{
			$blog_array = $this->admin_testimonial_model->getStatus($tes_id);
			if($blog_array->tes_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_testimonial_model->updateStatus($tes_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/testimonial/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/testimonial/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
}

/* End of file testimonial.php */
/* Location: ./application/controllers/testimonial.php */