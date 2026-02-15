<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
			$this->load->model('admin_category_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['categorys'] = $this->admin_category_model->showall();		
		$this->load->view('admin/category_index_view',$data);
	}

	public function addCategory()
	{
		$data['add_error'] = FALSE;
		$data['city']=$this->admin_category_model->getListTable("pf_city", "");
		$this->load->view('admin/category_add_view',$data);
	}

	public function submitCategory()
	{
		$this->form_validation->set_rules('cat_title','Title','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$this->admin_category_model->addCategory();
					
			$this->session->set_flashdata('add_success','Record Added successfully!');
			return redirect('admin/category');
		}
		else
		{
			$data['add_error'] = "Some of the required fields are missing!.";
			$this->load->view('admin/category_add_view',$data);				
		}
	}

	public function editCategory()
	{
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['cat_id']    = $cat_id;
			$data['category'] = $this->admin_category_model->editCategory($cat_id);
			$data['city']     = $this->admin_category_model->getListTable("pf_city", "");
		//	echo '<pre>';print_r($data); exit;
			$this->load->view('admin/category_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateCategory()
	{		
		$this->form_validation->set_rules('cat_title','Title','required|trim|xss_clean');
		
		$cat_id = $this->input->post('cat_id');
		$city_id = $this->input->post('city_id');
		$cat_id = $this->security->xss_clean($cat_id);
		
		if ($this->form_validation->run())
		{
			if($this->admin_category_model->updateCategory())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/category/index');
			}
			else
			{				
				if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['cat_id'] = $cat_id;
					$data['category'] = $this->admin_category_model->editCategory($cat_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/category_edit_view',$data);
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
			$data['category'] = $this->admin_cat_model->editCategory();//echo '<pre>';print_r($data);
			$this->load->view('admin/category_edit_view',$data);
		}		
	}

	public function updateStatus()
	{
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
		{
			$cat_array = $this->admin_category_model->getStatus($cat_id);
			if($cat_array->cat_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_category_model->updateStatus($cat_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/category/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/category/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	public function deleteCategory()
	{
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
		{
			if($this->admin_category_model->deleteCategory())
			{				
				$this->session->set_flashdata('delete_success','Record Deleted successfully!');
				return redirect('admin/category/index');
			}
			else
			{				
				if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['cat_id'] = $cat_id;
					//$data['category'] = $this->admin_category_model->editCategory($cat_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/category_index_view',$data);
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

/* End of file category.php */
/* Location: ./application/controllers/category.php */