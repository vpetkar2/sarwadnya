<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/logout
	 *	- or -  
	 * 		http://example.com/index.php/logout/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/logout/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();		
	}

	public function index()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('logout','You have successfully logged Out');
		return redirect('admin/login');
		
	}

	
}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */