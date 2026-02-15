<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends CI_Controller 
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/contactus
	 *	- or -  
	 * 		http://example.com/index.php/contactus/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/contactus/<method_name>
	 * @see http://codeigniter.com/course_guide/general/urls.html
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
			$this->load->model('admin_contactus_model');
		}
	}

	public function index()
	{
		$data['conus'] = $this->admin_contactus_model->getDetails();
		$data['add_error'] = FALSE;
		$this->load->view('admin/contactus_add_view',$data);
	}

	public function submitContactUs()
	{		
		$this->form_validation->set_rules('conus_email', 'Email', 'required');
	
		$this->form_validation->set_rules('conus_phone', 'Phone', 'required');
		
		
		if ($this->form_validation->run())
		{
			$this->admin_contactus_model->update_contact();
			
			$this->session->set_flashdata('update_success','Details Updated Successfully');
			return redirect('admin/contactus');				
		}
		else
		{
			$data['contacts'] = $this->admin_contactus_model->getDetails();
			$data['add_error'] = validation_errors();
			$this->load->view('admin/contactus_add_view',$data);
		}			
	}
}