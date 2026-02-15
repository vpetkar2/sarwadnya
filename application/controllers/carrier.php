<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrier extends CI_Controller 
{
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
	 * map to /index.php/course/<method_name>
	 * @see http://codeigniter.com/course_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_blog_model');
		$this->load->model('site_carrier_model');
		$this->load->model('site_cms_model');
		$this->load->model('site_product_model');
		//$this->load->library('user_agent');
	}

	public function index()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(5);
			$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('carrier_view',$data);
	}
	
	public function detail()
	{
		$data['ids'] = $this->uri->segment(3);
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(5);
		$data['social'] = $this->site_cms_model->get_social();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$this->load->helper('captcha');
		$data['captcha_img'] = $this->creating_captcha();
			$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('carrier_registration_view',$data);
	}
	
	public function submitPost()
	{
		$data['social'] = $this->site_cms_model->get_social();
		//print_r($_POST);exit;
		$this->form_validation->set_rules('title','Name','required|trim|xss_clean');
		$this->form_validation->set_rules('email','Email Id','required|trim|email|xss_clean');
		$this->form_validation->set_rules('mobile','Mobile No.','required|trim|xss_clean');
		//$this->form_validation->set_rules('message','Message.','required|trim|xss_clean');
		
		$fname = $this->input->post('title');
		$email_id = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$messages = $this->input->post('message');
		
		if ($this->form_validation->run())
		{
			$security_code= $this->session->userdata("security_code");
			if($security_code['word'] == $this->security->xss_clean($this->input->post('captcha')))
			{
			if (!empty($_FILES['resume']['name']) || $messages!='')
			{
				$resume = '';
				if (!empty($_FILES['resume']['name']))
				{
				    //print_r($_FILES);
					$resume = $this->file_upload('resume', 'doc|docx|pdf|DOC|DOCX|PDF', '2048', TRUE);
					$error = "error";
					
					if($resume!=$error)
					{
						if($this->site_carrier_model->addcarrier($resume, $status=TRUE))
						{	
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
                            
                            $data['crr_det'] = $this->site_cms_model->get_records_array("carrier", array('crr_id' => $this->input->post('crrpost')), "crr_id", "ASC", '', '');
				            $crr_title = $data['crr_det']['0']['crr_title'];
                            
                            $this->email->from($this->input->post('email'),$this->input->post('title'));
                            $this->email->to($admin_email); 
    						
    						$this->email->subject("Carrier Enquiry recieved");
    						
    						$message = "Hello Admin<br/><br/>";
    						$message .= "Name :".$fname;
    						$message .= "<br/>Post Name :".$crr_title;
    						$message .= "<br/>Tel :".$mobile;
    						$message .= "<br/>Email :".$email_id;
    						$message .= "<br/>Message :".$messages;
    						$message .= "<br/><br/>Thanks & Regards,<br/>".$fname;
    						
    						
    									
    						$this->email->message($message);
    
    						$this->email->send();
							
							$this->session->set_flashdata('add_success','Resume Detail send successfully!');
							//return redirect('carrier/index');
							return redirect('success-career');
						}
						else
						{
							@unlink('./upload/resume/'.$resume);
							$data['ids'] = $this->input->post('crrpost');
							$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
							$data['categories'] = $this->site_product_model->get_category('*');
							//$data['error'] = 'Please enter the correct security code!.';
							$this->load->helper('captcha');
							$data['captcha_img'] = $this->creating_captcha();
							$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
							$data['contact_detail'] = $this->site_cms_model->get_contact();
							$data['add_error'] = 'Error while adding record. Try again';			
							$this->load->view('carrier_registration_view',$data);
						}
					}
					else
					{
						$data['ids'] = $this->input->post('crrpost');
						$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
						$data['categories'] = $this->site_product_model->get_category('*');
						$this->load->helper('captcha');
						$data['captcha_img'] = $this->creating_captcha();
						$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
						$data['contact_detail'] = $this->site_cms_model->get_contact();
						$data['add_error'] = "There is an error while uploading file. Please upload doc / pdf file only and try again.";
						$this->load->view('carrier_registration_view',$data);
					}
				}
				else
				{
					if($this->site_carrier_model->addcarrier($resume, $status=FALSE))
					{	
						$data['admin_email'] = $this->site_cms_model->get_records_array("admin", array('admin_id' => '1'), "admin_id", "ASC", '', '');
				            $admin_email = $data['admin_email']['0']['email'];
				            $this->load->library('email');
						
    							//$this->load->library('email');
    
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
                        
                        $data['crr_det'] = $this->site_cms_model->get_records_array("carrier", array('crr_id' => $this->input->post('crrpost')), "crr_id", "ASC", '', '');
				        $crr_title = $data['crr_det']['0']['crr_title'];
                        
                        $this->email->from($this->input->post('email'),$this->input->post('title'));
                        $this->email->to($admin_email); 
						
						$this->email->subject("Carrier Enquiry recieved");
						
						$message = "Hello Admin<br/><br/>";
						$message .= "Name :".$fname;
					    $message .= "<br/>Post Name :".$crr_title;
						$message .= "<br/>Tel :".$mobile;
						$message .= "<br/>Email :".$email_id;
						$message .= "<br/>Message :".$messages;
						$message .= "<br/><br/>Thanks & Regards,<br/>".$fname;
						
						
									
						$this->email->message($message);

						$this->email->send();
						$this->session->set_flashdata('add_success','Resume detail Send  successfully!');
					//	return redirect('carrier/index');
						return redirect('success-career');
					}
					else
					{
						$data['ids'] = $this->input->post('crrpost');
						$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
						$data['categories'] = $this->site_product_model->get_category('*');
						//$data['error'] = 'Please enter the correct security code!.';
						$this->load->helper('captcha');
						$data['captcha_img'] = $this->creating_captcha();
						$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
						$data['contact_detail'] = $this->site_cms_model->get_contact();
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('carrier_registration_view',$data);
					}			
				}
			}
			else
			{
				$data['ids'] = $this->input->post('crrpost');
				$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
				$data['categories'] = $this->site_product_model->get_category('*');
				$data['add_error'] = 'Please enter Message or Upload resume any one is required!.';
				$this->load->helper('captcha');
				$data['captcha_img'] = $this->creating_captcha();
				$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
				$data['contact_detail'] = $this->site_cms_model->get_contact();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('carrier_registration_view',$data);				
			}
			}
			else
			{
				$data['ids'] = $this->input->post('crrpost');
				$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
				$data['categories'] = $this->site_product_model->get_category('*');
				$data['add_error'] = 'Please enter the correct security code!.';
				$this->load->helper('captcha');
				$data['captcha_img'] = $this->creating_captcha();
				$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
				$data['contact_detail'] = $this->site_cms_model->get_contact();
				//echo "<pre>";print_r($data);exit;
				return redirect('carrier/success_career');
				//$this->load->view('carrier_registration_view',$data);				
			}
		}
		else
		{	
			$data['ids'] = $this->input->post('crrpost');
			$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['categories'] = $this->site_product_model->get_category('*');
			$data['carrier_list'] = $this->site_carrier_model->get_carrier('*');
			$this->load->helper('captcha');
			$data['captcha_img'] = $this->creating_captcha();			
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			$data['add_error'] = 'Please Fill All Required Fields!.';
			//$this->session->set_flashdata('error','Please Fill All Required Fields!.');	
			$this->load->view('carrier_registration_view',$data);
		}
	}
	public function success_career()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(6)->get_where('category', array('cat_status' => 'active'))->result_array();
		$this->load->helper('captcha');
		$data['captcha_img'] = $this->creating_captcha();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		//$data['projects'] = $this->db->order_by('proj_id', 'ASC')->get('project')->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->load->view('success_crr_view',$data);		
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
			'img_width' => 200,
			'img_height' => 50,
			'expiration' => 7200
		);
		$image = @create_captcha($data);
		$this->session->set_userdata("security_code",$image);
		return $image;
		
	}
	
	public function file_upload($field_name, $type, $size, $encryption)
	{
	   
		$config['upload_path']   = './upload/resume/'; 
		$config['allowed_types'] = $type; 
		$config['max_size']      = $size; 
		/*$config['max_width']     = 1024; 
		$config['max_height']    = 768;*/
		$config['encrypt_name'] = $encryption;
		//print_r($config);exit;
		 $this->load->library('upload', $config);
	    $this->upload->set_allowed_types($type);
						
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