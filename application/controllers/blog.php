<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller 
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
		$this->load->model('site_cms_model');
		$this->load->model('site_product_model');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['blog_list'] = $this->site_blog_model->get_blogs('*');
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(4);
		$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('blog_view',$data);
	}
	
	public function category()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
		$cat_id = $this->db->get_where('category', array('slug' => $this->uri->segment(2)))->row()->cat_id;
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['blog_list'] = $this->site_blog_model->get_blogs_by_filter($cat_id);
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
		$this->load->view('blog_category_view',$data);
	}
	
	public function detail()
	{
	    $data['meta_rec'] = $this->site_cms_model->get_meta_by_id(4);
		$data['social'] = $this->site_cms_model->get_social();
		//$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
		$slug = $this->uri->segment(3);
				
		$blog_detail = $this->site_blog_model->get_blog_details_by_slug($slug);
		$data['blog'] = $blog_detail;
		
		//$data['comments'] = $this->site_blog_model->get_blog_comments_by_id($blog_detail['b_id']);
		
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		
		$data['b_id'] = $blog_detail['b_id'];
		$data['message'] = FALSE;
		$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('blog_detail_view',$data);
	}
	
	public function submitComment()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$this->form_validation->set_rules('bcom_name','Name','required|trim|xss_clean');
		$this->form_validation->set_rules('bcom_email','Email','required|trim|xss_clean');
		$this->form_validation->set_rules('bcom_message','Message','required|trim|xss_clean');
		
		$referer = $this->agent->referrer();
		
		if ($this->form_validation->run())
		{
			$b_id = $this->security->xss_clean($this->input->post('b_id'));
			$bcom_name = $this->security->xss_clean($this->input->post('bcom_name'));
			$bcom_email = $this->security->xss_clean($this->input->post('bcom_email'));
			$b_id = $this->security->xss_clean($this->input->post('b_id'));
			
			$this->db->insert('blog_comment', array('b_id' => $b_id, 'bcom_name' => $bcom_name, 'bcom_email' => $bcom_email, 'bcom_message' => $bcom_message, 'bcom_date' => date('Y-m-d'), 'bcom_status' => 'inactive'));
					
			$this->session->set_flashdata('message','Record Added successfully!');
		}
		else
		{
			$this->session->set_flashdata('message',"Some of the required fields are missing!");
		}
		
		return redirect($referer);
	}
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */