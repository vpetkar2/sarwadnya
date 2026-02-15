<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/blog
	 *	- or -  
	 * 		http://example.com/index.php/blog/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/blog/<method_name>
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
			$this->load->model('admin_blog_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['blogs'] = $this->admin_blog_model->showall();		
		$this->load->view('admin/blog_index_view',$data);
	}

	public function addBlog()
	{
		$data['add_error'] = FALSE;
		$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
		$this->load->view('admin/blog_add_view',$data);
	}

	public function submitBlog()
	{
		//$this->form_validation->set_rules('cat_id[]','Category','required|xss_clean');
		$this->form_validation->set_rules('b_title','Blog Title','required|trim|xss_clean');
		$this->form_validation->set_rules('b_author','Blog Author','required|trim|xss_clean');
		$this->form_validation->set_rules('b_desc','Description','required|trim|xss_clean');
		
		
		if ($this->form_validation->run())
		{
			$b_file = '';
			if (!empty($_FILES['b_file']['name']))
			{
				$b_file = $this->file_upload('b_file', 'jpg|jpeg|png|gif', '2048', TRUE);
				$error = "error";
				
				if($b_file!=$error)
				{
					if($this->admin_blog_model->addBlog($b_file, $status=TRUE))
					{				
						$this->session->set_flashdata('add_success','New Record Added successfully!');
						return redirect('admin/blog/index');
					}
					else
					{
						@unlink('./upload/je/'.$b_file);
						$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/blog_add_view',$data);
					}
				}
				else
				{
					$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/blog_add_view',$data);
				}
			}
			else
			{
				if($this->admin_blog_model->addBlog($b_file, $status=FALSE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/blog/index');
				}
				else
				{
					$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/blog_add_view',$data);
				}			
			}
		}
		else
		{
			$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['add_error'] = FALSE;			
			$this->load->view('admin/blog_add_view',$data);
		}
	}

	public function editBlog()
	{
		$b_id = $this->uri->segment(4,0);
		$b_id = $this->security->xss_clean($b_id);
		if(isset($b_id) && !empty($b_id) && $b_id!=NULL && $b_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['b_id'] = $b_id;
			
			$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['blog'] = $this->admin_blog_model->editBlog($b_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/blog_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateBlog()
	{		
		//$this->form_validation->set_rules('cat_id[]','Category','required');
		$this->form_validation->set_rules('b_title','Blog Title','required|trim|xss_clean');
		$this->form_validation->set_rules('b_author','Blog Author','required|trim|xss_clean');
		$this->form_validation->set_rules('b_desc','Description','required|trim|xss_clean');
		$this->form_validation->set_rules('b_id','Blog ID','required|trim|xss_clean|numeric');				
		
		$b_id = $this->input->post('b_id');
		$b_id = $this->security->xss_clean($b_id);
				
			
		if ($this->form_validation->run())
		{
			$b_file = ''; $status=FALSE;
			if (!empty($_FILES['b_file']['name']))
			{
				$b_file = $this->file_upload('b_file', 'jpg|jpeg|png|gif', '2048', TRUE);

				$error = "error";
					
				if($b_file!=$error)
				{
					$old_file = $this->security->xss_clean($this->input->post('old_file'));
					if($old_file!="")
					{
						//$path_to_file = base_url().'upload/je/'.$old_file;
						@unlink('./upload/je/'.$old_file);
					}
					
					$status=TRUE;
				}
				else
				{
					$data['add_error'] = 'There is an error while uploading file. Please try again.';
					$data['b_id'] = $b_id;
					$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
					$data['blog'] = $this->admin_blog_model->editBlog($b_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/blog_edit_view',$data);
				}
			}
			
			if($this->admin_blog_model->updateBlog($b_file, $status))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/blog/index');
			}
			else
			{
				if($b_file!="")
				{
					@unlink('./upload/je/'.$b_file);
				}
				
				if(isset($b_id) && !empty($b_id) && $b_id!=NULL && $b_id > 0)
				{
					$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
					$data['add_error'] = 'Error while updating record. Try again';
					$data['b_id'] = $b_id;
					$data['blog'] = $this->admin_blog_model->editBlog($b_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/blog_edit_view',$data);
				}
				else
				{ 
					return redirect('admin/fournotfour');
				}
			}				
		}
		else
		{
			$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['add_error'] = FALSE;
			$data['b_id'] = $b_id;
			$data['blog'] = $this->admin_blog_model->editBlog($b_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/blog_edit_view',$data);
		}		
	}	
	
	public function updateStatus()
	{
		$b_id = $this->uri->segment(4,0);
		$b_id = $this->security->xss_clean($b_id);
		if(isset($b_id) && !empty($b_id) && $b_id!=NULL && $b_id > 0)
		{
			$blog_array = $this->admin_blog_model->getStatus($b_id);
			if($blog_array->b_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_blog_model->updateStatus($b_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/blog/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/blog/index');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function file_upload($field_name, $type, $size, $encryption)
	{
		$config['upload_path']   = './upload/je/'; 
		$config['allowed_types'] = $type; 
		$config['max_size']      = $size; 
		/*$config['max_width']     = 1024; 
		$config['max_height']    = 768;*/
		$config['encrypt_name'] = $encryption;
		$this->load->library('upload', $config);
						
		if ( $this->upload->do_upload($field_name))
		{
			$upload = $this->upload->data();
			
			return $upload['file_name'];
		}					
		else
		{
			//$error = array('error' => $this->upload->display_errors());echo '<pre>';print_r($error);exit;
			return 'error';
		}
	}
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */