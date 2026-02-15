<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fournotfour extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/fournotfour
	 *	- or -  
	 * 		http://example.com/index.php/fournotfour/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/fournotfour/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();		
	}

	public function index()
	{
		$this->load->view('admin/fournotfour_view');
	}
}

/* End of file fournotfour.php */
/* Location: ./application/controllers/fournotfour.php */