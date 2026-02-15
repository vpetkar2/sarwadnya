<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller 
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
			$this->load->model('admin_social_model');
		}
	}

	public function index()
	{
		$data['conus'] = $this->admin_social_model->getDetails();
		$data['add_error'] = FALSE;
		$this->load->view('admin/social_add_view',$data);
	}

	public function submitContactUs()
	{		
		
			$this->admin_social_model->update_social();
			
			$this->session->set_flashdata('update_success','Details Updated Successfully');
			return redirect('admin/social');				
	}
}