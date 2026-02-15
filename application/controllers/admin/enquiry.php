<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends CI_Controller 
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
			$this->load->model('admin_enquiry_model');
		}
	}

	public function index()
	{
		$data['enquirys'] = $this->admin_enquiry_model->showenquiry();				
		$this->load->view('admin/enquiry_index_view',$data);	
	}
	
	public function deleteEnquiry()
	{
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
		{
			if($this->admin_enquiry_model->deleteEnquiry())
			{				
				$this->session->set_flashdata('delete_success','Record Deleted successfully!');
				return redirect('admin/enquiry/index');
			}
			else
			{				
				if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['cat_id'] = $cat_id;
					//$data['category'] = $this->admin_category_model->editCategory($cat_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/enquiry_index_view',$data);
				}
				else
				{ 
			
					return redirect('admin/fournotfour');
				}
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
}