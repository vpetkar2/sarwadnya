<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/news
	 *	- or -  
	 * 		http://example.com/index.php/news/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/news/<method_name>
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
			$this->load->model('admin_news_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['news'] = $this->admin_news_model->showall();		
		$this->load->view('admin/news_index_view',$data);
	}

	public function addnews()
	{
		$data['add_error'] = FALSE;
		$this->load->view('admin/news_add_view',$data);
	}

	public function submitnews()
	{
		$this->form_validation->set_rules('news_title','news Title','required|trim|xss_clean');
		$this->form_validation->set_rules('news_desc','Description','required|trim|xss_clean');
		
		
		if ($this->form_validation->run())
		{
			$news_file = '';
			if (!empty($_FILES['news_file']['name']))
			{
				$news_file = $this->file_upload('news_file', 'jpg|jpeg|png|gif', '2048', TRUE);
				$error = "error";
				
				if($news_file!=$error)
				{
					if($this->admin_news_model->addnews($news_file, $status=TRUE))
					{				
						$this->session->set_flashdata('add_success','New Record Added successfully!');
						return redirect('admin/news/index');
					}
					else
					{
						@unlink('./upload/je/'.$news_file);
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/news_add_view',$data);
					}
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/news_add_view',$data);
				}
			}
			else
			{
				if($this->admin_news_model->addnews($news_file, $status=FALSE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/news/index');
				}
				else
				{
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/news_add_view',$data);
				}			
			}
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/news_add_view',$data);
		}
	}

	public function editnews()
	{
		$news_id = $this->uri->segment(4,0);
		$news_id = $this->security->xss_clean($news_id);
		if(isset($news_id) && !empty($news_id) && $news_id!=NULL && $news_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['news_id'] = $news_id;
			
			$data['news'] = $this->admin_news_model->editnews($news_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/news_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updatenews()
	{		
		
		$this->form_validation->set_rules('news_title','news Title','required|trim|xss_clean');
		$this->form_validation->set_rules('news_desc','Description','required|trim|xss_clean');
		$this->form_validation->set_rules('news_id','news ID','required|trim|xss_clean|numeric');				
		
		$news_id = $this->input->post('news_id');
		$news_id = $this->security->xss_clean($news_id);
				
			
		if ($this->form_validation->run())
		{
			$news_file = ''; $status=FALSE;
			if (!empty($_FILES['news_file']['name']))
			{
				$news_file = $this->file_upload('news_file', 'jpg|jpeg|png|gif', '2048', TRUE);

				$error = "error";
					
				if($news_file!=$error)
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
					$data['news_id'] = $news_id;
					$data['news'] = $this->admin_news_model->editnews($news_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/news_edit_view',$data);
				}
			}
			
			if($this->admin_news_model->updatenews($news_file, $status))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/news/index');
			}
			else
			{
				if($news_file!="")
				{
					@unlink('./upload/je/'.$news_file);
				}
				
				if(isset($news_id) && !empty($news_id) && $news_id!=NULL && $news_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['news_id'] = $news_id;
					$data['news'] = $this->admin_news_model->editnews($news_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/news_edit_view',$data);
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
			$data['news_id'] = $news_id;
			$data['news'] = $this->admin_news_model->editnews($news_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/news_edit_view',$data);
		}		
	}	
	
	public function updateStatus()
	{
		$news_id = $this->uri->segment(4,0);
		$news_id = $this->security->xss_clean($news_id);
		if(isset($news_id) && !empty($news_id) && $news_id!=NULL && $news_id > 0)
		{
			$news_array = $this->admin_news_model->getStatus($news_id);
			if($news_array->news_status=='active')
			{
				$status = 'inactive';
			}
			else
			{
				$status = 'active';
			}
			if($this->admin_news_model->updateStatus($news_id,$status))
			{
				if($status=='active')
				{
					$this->session->set_flashdata('status_active','active');
				}
				else
				{
					$this->session->set_flashdata('status_inactive','inactive');
				}
				
				return redirect('admin/news/index');
			}
			else
			{
				$this->session->set_flashdata('error','Error while updating record. Try again');
				return redirect('admin/news/index');
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

/* End of file news.php */
/* Location: ./application/controllers/news.php */