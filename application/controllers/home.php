<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller 
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/course/<method_name>
	 * @see http://codeigniter.com/course_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_cms_model');
		$this->load->model('site_blog_model');
		$this->load->model('site_product_model');	
		$this->load->helper('download');
	}

    public function set_city() {
        $this->session->set_userdata('cityId', $_POST['city']);
        // print_r($_SERVER);
        header('location:'.$_SERVER['HTTP_ORIGIN']);
    }

	public function index()
	{	
	   // error_reporting(E_ALL);
    //     ini_set("display_errors", 1);

		$data['social'] = $this->site_cms_model->get_social();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
		$data['home_content'] = $this->site_cms_model->get_cms_by_id(2);
		$data['gallery_list'] = $this->site_cms_model->get_records_array_home("gallery_image", "", "img_id", "DESC", '12', '');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['testimonials'] = $this->site_cms_model->get_records_array("testimonial", array('tes_status' => 'active'), "tes_id", "DESC", '', '');
		$data['video'] = $this->site_cms_model->get_records_array("media", array('media_id' => 1), "media_id", "DESC", '', '');
		$data['product_home'] = $this->site_product_model->get_home_products('*');
		$data['cms_rec'] = $this->site_cms_model->get_cms_by_id(1);
		$data['blog'] = $this->site_blog_model->get_blogs_home('*');
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(1);
		$city_id = $this->session->userdata('cityId')=='' ? 1 : $this->session->userdata('cityId');
		$data['new_category'] = $this->site_cms_model->get_records_array("category", array('city_id' => $city_id), "cat_id", "ASC", "4", "");
		$data['cities'] = $this->site_cms_model->allcity();

		$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(9);
		//
		$data['title'] = $data['meta_rec'][0]['meta_title'] ;
		//echo "<pre>";print_r($data);
		$this->load->view('home_view',$data);		
	}
	
	public function about_us()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['about_us'] = $this->site_cms_model->get_cms_by_id(1);
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(3);
		$data['team'] = $this->site_cms_model->get_records_array("team",array('team_status' => 'active'), "team_id", "ASC", '', '');
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['footer_cat'] = $this->site_cms_model->get_footer_cat(9);
		$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('about_us_view',$data);		
	}
	
	public function team()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['our_team'] = $this->site_cms_model->get_cms_by_id(2);
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['team'] = $this->site_cms_model->get_records_array("team", FALSE, "team_id", "ASC", '', '');
		
		$data['team_cmses'] = $this->site_cms_model->get_records_array("team_cms", array('tcms_status' => 'active'), "tcms_id", "ASC", '', '');
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(9);
		$this->load->view('team_view',$data);		
	}
	
	public function gallery()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['albums'] = $this->site_cms_model->get_records_array("gallery", array('gal_status' => 'active'), "gal_id", "DESC", '', '');
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		
		$this->load->view('gallery_view',$data);		
	}
	
	public function galleryDetail()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$slug = $this->uri->segment(3);
		$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(6);
		$data['gallery'] = $this->site_cms_model->get_records_array("gallery_image", array('gal_id' => $slug), "img_id", "ASC", '', '');
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['album'] = stripslashes($this->db->get_where('gallery', array('gal_id' => $slug))->row()->gal_title);
		
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$this->load->view('gallery_detail_view',$data);		
	}
	
	public function testimonials()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['testimonials'] = $this->site_cms_model->get_records_array("testimonial", FALSE, "tes_id", "ASC", '', '');
		$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(9);
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		
		$this->load->view('testimonials_view',$data);		
	}
	
	public function page()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$arg_1 = $this->uri->segment(1,0);
		$data['page'] = $this->site_cms_model->get_cms_by_url($arg_1);
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$this->load->view('page_view',$data);		
	}
	
	public function contact_us()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(9);
		$this->load->helper('captcha');
		$data['captcha_img'] = $this->creating_captcha();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(6);
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		//$data['projects'] = $this->db->order_by('proj_id', 'ASC')->get('project')->result_array();
		$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('contact_us_view',$data);		
	}
	public function success()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(9);
		$this->load->helper('captcha');
		$data['captcha_img'] = $this->creating_captcha();
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(1);
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		//$data['projects'] = $this->db->order_by('proj_id', 'ASC')->get('project')->result_array();
			$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('success_view',$data);		
	}
	
	public function success_contact()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['footer_cat'] = $this->site_cms_model->get_footer_cat(6);
		$this->load->helper('captcha');
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(1);
		$data['captcha_img'] = $this->creating_captcha();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		//$data['projects'] = $this->db->order_by('proj_id', 'ASC')->get('project')->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('success_contact_view',$data);		
	}
	public function submitContact()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$this->form_validation->set_rules('fname','Name','required|trim|xss_clean');
		$this->form_validation->set_rules('email','Email Id','required|trim|email|xss_clean');
		$this->form_validation->set_rules('mobile','Mobile No.','required|trim|xss_clean');
		$this->form_validation->set_rules('message','Message.','required|trim|xss_clean');
		
		$fname = $this->input->post('fname');
		$email_id = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$messages = $this->input->post('message');
		
		if ($this->form_validation->run())
		{
			$security_code= $this->session->userdata("security_code");
			if($security_code['word'] == $this->security->xss_clean($this->input->post('captcha')))
			{
				$this->site_cms_model->addContact();
				
				$data['admin_email'] = $this->site_cms_model->get_records_array("admin", array('admin_id' => '1'), "admin_id", "ASC", '', '');
				$admin_email = $data['admin_email']['0']['email'];
				
				
				$this->load->library('email');
    
                $config['protocol']    = 'sendmail';
                
                $config['smtp_host']    = 'mail.brandbazzar.com';
                
                $config['smtp_port']    = '587';
                
                $config['smtp_timeout'] = '7';
                
                $config['smtp_user']    = 'sales@brandbazzar.com';
                
                $config['smtp_pass']    = 'R,jj1S1J)%L4';
                
                $config['charset']    = 'utf-8';
                
                $config['newline']    = "\r\n";
                
                $config['mailtype'] = 'html'; // or html
                
                $config['validation'] = TRUE; // bool whether to validate email or not      
                
                $this->email->initialize($config);
                
                
                $this->email->from($this->input->post('email'),$this->input->post('fname'));
                $this->email->to($admin_email);

                $this->email->subject('Parth Feedback details');

                $message = "Hello Admin<br/><br/>";
				$message .= "Feedback detail recieved.<br/><br/>";
				$message .= "Name :".$fname;
				$message .= "<br/>Tel :".$mobile;
				$message .= "<br/>Email :".$email_id;
				$message .= "<br/>Message :".$messages;
				$message .= "<br/><br/>Thanks & Regards,<br/>".$fname;
                
				$this->email->message($message);

				$this->email->send();
						
				$this->session->set_flashdata('add_success','Thanks for filling out the form!');
				return redirect('success-contact');
			}
			else
			{
				$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(6);
				$data['categories'] = $this->site_product_model->get_category('*');
				//$data['error'] = 'Please enter the correct security code!.';
				$this->load->helper('captcha');
				$data['captcha_img'] = $this->creating_captcha();
				
				$data['contact_detail'] = $this->site_cms_model->get_contact();
				$this->session->set_flashdata('error','Please enter the correct security code!.');				
				//echo "<pre>";print_r($data);exit;
				$this->load->view('contact_us_view',$data);				
			}
		}
		else
		{	
			$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(6);
			$data['categories'] = $this->site_product_model->get_category('*');
			
			$this->load->helper('captcha');
			$data['captcha_img'] = $this->creating_captcha();			
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			
			$this->load->view('contact_us_view',$data);
		}
	}
	

	public function submitEnquire()
	{
		$this->form_validation->set_rules('fname','Name','required|trim|xss_clean');
		$this->form_validation->set_rules('email','Email Id','required|trim|email|xss_clean');
		$this->form_validation->set_rules('mobile','Mobile No.','required|trim|xss_clean');
		$this->form_validation->set_rules('message','Message.','required|trim|xss_clean');
		
		$fname = $this->input->post('fname');
		$email_id = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$messages = $this->input->post('message');
		
		if ($this->form_validation->run())
		{
				$this->site_cms_model->addEnq();
				$data['admin_email'] = $this->site_cms_model->get_records_array("admin", array('admin_id' => '1'), "admin_id", "ASC", '', '');
				$admin_email = $data['admin_email']['0']['email'];
				
				
				$this->load->library('email');
    
                $config['protocol']    = 'sendmail';
                $config['smtp_host']    = 'mail.brandbazzar.com';
                $config['smtp_port']    = '587';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = 'sales@brandbazzar.com';
                $config['smtp_pass']    = 'R,jj1S1J)%L4';
                $config['charset']      = 'utf-8';
                $config['newline']      = "\r\n";
                $config['mailtype']     = 'html'; // or html
                $config['validation'] = TRUE; // bool whether to validate email or not      
                
                $this->email->initialize($config);
                
                $data['prod_det'] = $this->site_cms_model->get_records_array("product", array('prod_id' => $this->input->post('prodid')), "prod_id", "ASC", '', '');
				$prod_title = $data['prod_det']['0']['prod_title'];
				
                    $this->email->from($this->input->post('email'),$this->input->post('fname'));
                //  $this->email->to($admin_email); 
				    $this->email->to("parth.fibrotech@gmail.com");
				    $this->email->subject("Product Enquiry recieved");
						
					$message = "Hello Admin<br/><br/>";
					$message .= "Product Enquiry detail recieved.<br/><br/>";
					$message .= "Name :".$fname;
					$message .= "<br/>Product Name :".$prod_title;
					$message .= "<br/>Tel :".$mobile;
					$message .= "<br/>Email :".$email_id;
					$message .= "<br/>Message :".$messages;
					$message .= "<br/><br/>Thanks & Regards,<br/>".$fname;
						
						
									
				$this->email->message($message);
				$this->email->send();
						
			$data['social'] = $this->site_cms_model->get_social();
			$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(6);
			$data['categories'] = $this->site_product_model->get_category('*');
			
			$this->load->helper('captcha');
			$data['captcha_img'] = $this->creating_captcha();			
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			return redirect('home/success');
		}
		else
		{	
			$data['social'] = $this->site_cms_model->get_social();
			$data['footer_cat'] =  $this->site_cms_model->get_footer_cat(6);
			$data['categories'] = $this->site_product_model->get_category('*');
			
			$this->load->helper('captcha');
			$data['captcha_img'] = $this->creating_captcha();			
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			
			$this->load->view('contact_us_view',$data);
		}
	}
	
	public function creating_captcha()
	{	
		$data['social'] = $this->site_cms_model->get_social();

		$this->load->helper('string');
		$word = random_string($type = 'numeric', $len = 5);
		$data = array(
			'word' => $word,
			'word_length' => '4',
			'img_path' => './static/',
			'img_url' => base_url().'static/',
			'font_path' => base_url().'system/fonts/texb.ttf',
			'img_width' => 120,
			'img_height' => 25,
			'expiration' => 7200
		);
		$image = @create_captcha($data);
		$this->session->set_userdata("security_code",$image);
		return $image;
		
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */