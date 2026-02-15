<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meta extends CI_Controller {

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
			$this->load->model('admin_meta_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['categorys'] = $this->admin_meta_model->showall();		
		$this->load->view('admin/meta_index_view',$data);
	}

	public function addMeta()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/meta_add_view',$data);
	}

	public function submitMeta()
	{
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cat_title','Meta Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cat_key','Meta Key','required|trim|xss_clean');
		$this->form_validation->set_rules('cat_desc','Meta Desc','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$this->admin_meta_model->addMeta();
					
			$this->session->set_flashdata('add_success','Record Added successfully!');
			return redirect('admin/meta');
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/meta_add_view',$data);				
		}
	}

	public function editMeta()
	{
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['cat_id'] = $cat_id;
			$data['meta'] = $this->admin_meta_model->editMeta($cat_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/meta_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateMeta()
	{		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cat_title','Meta Title','required|trim|xss_clean');
		$this->form_validation->set_rules('cat_key','Meta Key','required|trim|xss_clean');
		$this->form_validation->set_rules('cat_desc','Meta Desc','required|trim|xss_clean');
		
		$cat_id = $this->input->post('cat_id');
		$cat_id = $this->security->xss_clean($cat_id);
		
		if ($this->form_validation->run())
		{
			if($this->admin_meta_model->updateMeta())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/meta/index');
			}
			else
			{				
				if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['cat_id'] = $cat_id;
					$data['meta'] = $this->admin_meta_model->editMeta($cat_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/meta_edit_view',$data);
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
			$data['cat_id'] = $cat_id;
			$data['meta'] = $this->admin_meta_model->editMeta();//echo '<pre>';print_r($data);
			$this->load->view('admin/meta_edit_view',$data);
		}		
	}
}

/* End of file category.php */
/* Location: ./application/controllers/category.php */