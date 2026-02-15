<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/forgot
	 *	- or -  
	 * 		http://example.com/index.php/forgot/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/forgot/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('admin_logged_in'))
		{
			redirect('admin/dashboard');
		}
		else
		{
			//$this->load->helper('MY_general');
			$this->load->model('general_model');
			$this->load->helper('string');
			$this->load->helper('captcha');
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$image = $this->creating_captcha();
		
		$this->load->view('admin/forgot_view',$image);
	}

	public function creating_captcha()
	{		
		$word = random_string($type = 'numeric', $len = 5);
		$data = array(
			'word' => $word,
			'word_length' => '4',
			'img_path' => './static/',
			'img_url' => base_url().'static/',
			'font_path' => base_url().'system/fonts/texb.ttf',
			'img_width' => 120,
			'img_height' => 34,
			'expiration' => 7200
		);
		$image = @create_captcha($data);
		$this->session->set_userdata("admin_security_code",$image);
		return $image;
	}

	public function submit_forgot()
	{
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('admin_captcha','Captcha','required|xss_clean|is_natural');

		if ($this->form_validation->run())
		{ 
			$admin_security_code= $this->session->userdata("admin_security_code");
			$admin_captcha = $this->input->post('admin_captcha');
			
			
			if($admin_captcha === $admin_security_code['word'])
			{
				$username = $this->security->xss_clean($this->input->post('username'));				
				
				$random_string = random_string($type = 'alnum', $len = 10);

				$res = $this->general_model->reset_admin_password($username, $random_string);

				//print_r($res);exit;

				if($res)
				{
					$to = stripslashes($res->email);
					

					/*$this->load->library('email');

					$row_admin = $this->general_model->get_admin_detail();				
					$from_email = stripslashes($row_admin->email);
					$from_name = stripslashes($row_admin->name);

					$this->email->from($from_email, $from_name);
					

					$this->email->to($to);
					
					$this->email->subject("Ticketing System - Password Retrivation Email");*/

					/***********Mail Body Start*******************/
					$message = "Hello<br/><br/>";
					$message .= "You have successfully retrieved your password at ".base_url()." . <br/> Username:".$username." <br/> Password:".$random_string."<br/><br/>";
					
					$message .= "<br/><br/>Thanks & Regards,<br/>Administrator Ticketing System";
					/***********Mail Body End*******************/
					//$this->email->message($message);

					//$this->email->send();

					$this->session->set_flashdata('sent','New Password sent on your Email-Id.');
					return redirect('admin/forgot');
				}
				else
				{
					$this->session->set_flashdata('wrong','Username is invalid');
					return redirect('admin/forgot');
				}
			}
			else
			{
				$this->session->set_flashdata('captcha','Please enter correct Captcha');
				return redirect('admin/forgot');
			}
		}
		else
		{
			$image = $this->creating_captcha();
			$this->load->view('admin/forgot_view',$image);
		}
	}
}

/* End of file forgot.php */
/* Location: ./application/controllers/forgot.php */