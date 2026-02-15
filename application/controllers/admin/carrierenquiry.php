<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrierenquiry extends CI_Controller 
{
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
			$this->load->model('admin_carrier_enquiry_model');
		}
	}

	public function index()
	{
		$data['enquirys'] = $this->admin_carrier_enquiry_model->showenquiry();				
		$this->load->view('admin/carrier_enquiry_index_view',$data);	
	}
}