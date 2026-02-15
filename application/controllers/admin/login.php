<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -  
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/login/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $office_name;
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('admin_logged_in'))
		{
			redirect('admin/dashboard');
		}
		else
		{
			$this->load->helper('captcha');
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$image = $this->creating_captcha();
		
		$this->load->view('admin/login_view',$image);
	}

	public function creating_captcha()
	{
		$this->load->helper('string');
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

	public function submit_login()
	{
// 		echo "<pre>"; print_r('hiiii'); exit;
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean|md5');
		$this->form_validation->set_rules('admin_captcha','Captcha','required|xss_clean|is_natural');

		if ($this->form_validation->run())
		{ 
			$admin_security_code= $this->session->userdata("admin_security_code");
			$admin_captcha = $this->input->post('admin_captcha');
			
			//echo $captcha.'<=>'.$security_code['word'];exit;
			if($admin_captcha === $admin_security_code['word'])
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				

				$this->load->model('admin_login_model');

				if($this->admin_login_model->validate_credentials($username,$password))
				{
					return redirect('admin/dashboard');
				}
				else
				{
					$this->session->set_flashdata('invalid','Username/Password is invalid');
					return redirect('admin/login');
				}
			}
			else
			{
				$this->session->set_flashdata('captcha','Please enter correct Captcha');
				return redirect('admin/login');
			}
		}
		else
		{
			$image = $this->creating_captcha();
			$this->load->view('admin/login_view',$image);
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */