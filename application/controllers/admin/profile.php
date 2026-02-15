<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/profile
	 *	- or -  
	 * 		http://example.com/index.php/profile/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/profile/<method_name>
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
			//$this->load->helper('string');
			$this->load->model('general_model');
			$this->load->model('admin_login_model');
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['update'] = FALSE;
		$data['error'] = FALSE;
		$data['password'] = FALSE;
		$data['wrong'] = FALSE;
		$data['error1'] = FALSE;

		$data['admin_detail'] = $this->profile_detail();

		$this->load->view('admin/profile_view',$data);
	}

	public function update_profile()
	{
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('email','Email ID','required|trim|xss_clean|valid_email');
		$this->form_validation->set_rules('contact_no','Contact No.','required|xss_clean');
		$post = $this->input->post();	
		$post['admin_id'] = $this->security->xss_clean($this->session->userdata('admin_admin_id'));
		
		if ($this->form_validation->run())
		{			
			if($this->admin_login_model->update_profile($post))
			{
				
				$data['update'] = 'Profile Updated Successfully!';
				$data['error'] = FALSE;
				$data['password'] = FALSE;
				$data['wrong'] = FALSE;
				$data['error1'] = FALSE;
				
				$data['admin_detail'] = $this->profile_detail();

				$this->load->view('admin/profile_view',$data);
			}
			else
			{
				$data['update'] = FALSE;
				$data['error'] = 'Error while updating record. Try again!';
				$data['password'] = FALSE;
				$data['wrong'] = FALSE;
				$data['error1'] = FALSE;
				
				$data['admin_detail'] = $this->profile_detail();
				
				$this->load->view('admin/profile_view',$data);
			}
		}
		else
		{
			$data['update'] = FALSE;
			$data['error'] = FALSE;
			$data['password'] = FALSE;
			$data['wrong'] = FALSE;
			$data['error1'] = FALSE;
			
			$data['admin_detail'] = $this->profile_detail();
			
			$this->load->view('admin/profile_view',$data);
		}
	}

	public function change_password()
	{
		$this->form_validation->set_rules('old_password','Old Password','required|trim|xss_clean|md5');
		$this->form_validation->set_rules('password','New Password','required|trim|xss_clean|md5');
		$post = $this->input->post();	
		$post['admin_id'] = $this->security->xss_clean($this->session->userdata('admin_admin_id'));
		
		if ($this->form_validation->run())
		{
			$array = array(
					'old_password' => $this->security->xss_clean($this->input->post('old_password')),
					'password' => $this->security->xss_clean($this->input->post('password')),
					'admin_id' => $this->security->xss_clean($this->session->userdata('admin_admin_id'))
				);
			if($this->admin_login_model->validate_password($array))
			{
				if($this->admin_login_model->change_password($array))
				{
					
					$data['update'] = FALSE;
					$data['error'] = FALSE;
					$data['password'] = 'Password Changed Successfully!';
					$data['wrong'] = FALSE;
					$data['error1'] = FALSE;
					
					$data['admin_detail'] = $this->profile_detail();

					$this->load->view('admin/profile_view',$data);
				}
				else
				{
					$data['update'] = FALSE;
					$data['error'] = FALSE;
					$data['password'] = FALSE;
					$data['wrong'] = FALSE;
					$data['error1'] = 'Error while updating record. Try again!';;
					
					$data['admin_detail'] = $this->profile_detail();
					
					$this->load->view('admin/profile_view',$data);
				}
			}
			else
			{
				$data['update'] = FALSE;
				$data['error'] = FALSE;
				$data['password'] = FALSE;
				$data['wrong'] = 'Please Enter Correct Password';
				$data['error1'] = FALSE;
				
				$data['admin_detail'] = $this->profile_detail();
				
				$this->load->view('admin/profile_view',$data);
			}
		}
		else
		{
			$data['update'] = FALSE;
			$data['error'] = FALSE;
			$data['password'] = FALSE;
			$data['wrong'] = FALSE;
			$data['error1'] = FALSE;
			
			$data['admin_detail'] = $this->profile_detail();
			
			$this->load->view('admin/profile_view',$data);
		}
	}

	public function profile_detail()
	{
		
		if($this->session->userdata('admin_user_type')=='super')
		{
			return $this->general_model->get_admin_detail();
		}
		else
		{
			return $this->general_model->get_sub_admin_detail();
		}
	}

	
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */