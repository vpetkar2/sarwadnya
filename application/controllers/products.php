<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller 
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/products
	 *	- or -  
	 * 		http://example.com/index.php/products/index
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
		$this->load->model('site_product_model');
		$this->load->model('site_cms_model');
		// Load form Pagination library
			$this->load->library('pagination');
			$this->prePage = 3;
	}

	public function index()
	{

		$sch_prod = $this->input->post('sch_prod');			
		$config = array();
		
		$config["base_url"] = base_url() . "products/";
		
        $config["total_rows"] = $this->site_product_model->get_products_cnt($sch_prod);
        $config["per_page"] = 16;
        $config["uri_segment"] = 2;
		
        $data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
		$this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		
		$data['product_detail'] = $this->site_product_model->get_products($config["per_page"] ,$page,$sch_prod);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['social'] = $this->site_cms_model->get_social();
	
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['categories'] = $this->site_product_model->get_category('*');
		
		
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		//$data['category'] = $this->site_cms_model->get_records_array("category", array('cat_id'=>$cat_id), "cat_id", "ASC", "1", "");
		$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
		$data['title'] = $data['meta_rec'][0]['meta_title'];
		$data['sch'] = $sch_prod;
		
		//print_r($data["links"]);
		$this->load->view('product_view',$data);
	}
	
	public function productcat($city)
	{
	    // echo "hello 2"; exit;
		$cat_id = $this->uri->segment(2);
			
		$config = array();
		$city_name = $this->site_product_model->getCityNameById();
		$config["base_url"] = base_url() . strtolower($city_name) ."/".$cat_id;
		
        $config["total_rows"] = $this->site_product_model->get_products_cat_cnt($cat_id, $city);
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
		
		
		$this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['product_detail'] = $this->site_product_model->get_products_cat($cat_id,$config["per_page"], $page, $city_name);
		
		$data["links"] = $this->pagination->create_links();
		 $data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
		$data['social'] = $this->site_cms_model->get_social();
	    $data['slug'] = $this->site_product_model->get_category_slug($cat_id);
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['categories'] = $this->site_product_model->get_category('*');
		
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['category'] = $this->site_cms_model->get_records_array("category", array('cat_id'=>$cat_id), "cat_id", "ASC", "1", "");
		$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
		if($cat_id=='')
		{
		    $data['title'] = "Products";
		}
		else
		{
		    $data['title'] = "category";
		}
		$data['title'] = $data['slug'][0]['cat_title'];
		//print_r($data);
		$this->load->view('product_cat_view',$data);
	}
	
	public function detail()
	{
		$data['social'] = $this->site_cms_model->get_social();
		$data['categories'] = $this->site_product_model->get_category('*');
		$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
		$prod_url = $this->uri->segment(3);
		
		$data['product_detail'] = $this->site_product_model->get_products_by_url($prod_url);
		$prod_id =	$data['product_detail']['0']['prod_id'];
		 $data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
		$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
		$data['product_list'] = $this->site_product_model->get_related_products($data['product_detail'][0]['prod_cat_id'],$prod_id);
		$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
		$data['category'] = $this->site_product_model->get_category_by_id($data['product_detail'][0]['prod_cat_id']);
		$data['contact_detail'] = $this->site_cms_model->get_contact();
		$data['albums'] = $this->site_cms_model->get_records_array("product_image", array('prod_id' => $prod_id), "img_id", "DESC", '', '');
		$data['features'] = $this->site_cms_model->get_records_array("product_feature", array('prod_id' => $prod_id), "pf_id", "ASC", '', '');
		//print_r($data['product_list']);
		$data['title'] = $data['meta_rec'][0]['meta_title'];
		$this->load->view('product_details_view',$data);
	}

	function show_slug($city, $param) {
        // echo "<pre>"; print_r($city.' -- '.$param); exit;
		$data_count = $this->site_product_model->get_products_cat_cnt($param, $city);
// 		print_r($data_count);
		if ($data_count) {
			// For category
			$cat_id = $param;
			$city_name = $this->site_product_model->getCityNameById();
			$config = array();
	        $config["total_rows"] = $this->site_product_model->get_products_cat_cnt($cat_id, $city);
			$config["base_url"] = base_url() . strtolower($city_name)."/".$cat_id;
	        $config["per_page"] = 12;
	        $config["uri_segment"] = 2;		
			$this->pagination->initialize($config);
	        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        // print_r($cat_id);
	        // print_r($page);
	        // print_r($config["per_page"]);
	        // exit;
			$data['product_detail'] = $this->site_product_model->get_products_cat($cat_id, $config["per_page"] ,$page, $city);
			$data["links"] = $this->pagination->create_links();
	 		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
			$data['social'] = $this->site_cms_model->get_social();
		    $data['slug'] = $this->site_product_model->get_category_slug($cat_id);
			$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['categories'] = $this->site_product_model->get_category('*');
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
			$data['category'] = $this->site_cms_model->get_records_array("category", array('cat_id'=>$cat_id), "cat_id", "ASC", "1", "");
			$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
			if($cat_id=='') { $data['title'] = "Products"; }
			else { $data['title'] = "category"; }
			$data['title'] = $data['slug'][0]['cat_title'];
			$this->load->view('product_cat_view',$data);
			// ./ For category /.
		} else {

			// Product Detail Page
			$data['social'] = $this->site_cms_model->get_social();
			$data['categories'] = $this->site_product_model->get_category('*');
			$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
			$prod_url = $param;

			$data['product_detail'] = $this->site_product_model->get_products_by_url($prod_url);
			if (!empty($data['product_detail'])) {
			    $prod_id =	$data['product_detail']['0']['prod_id'];
			    
			    $data['product_list'] = $this->site_product_model->get_related_products($data['product_detail'][0]['prod_cat_id'],$prod_id);

			    $data['category'] = $this->site_product_model->get_category_by_id($data['product_detail'][0]['prod_cat_id']);
			    $data['albums'] = $this->site_cms_model->get_records_array("product_image", array('prod_id' => $prod_id), "img_id", "DESC", '', '');
			    $data['features'] = $this->site_cms_model->get_records_array("product_feature", array('prod_id' => $prod_id), "pf_id", "ASC", '', '');    
			}
			
			$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
			$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
			$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			$data['title'] = $data['meta_rec'][0]['meta_title'];
			$this->load->view('product_details_view',$data);
			// ./ Product Detail Page /.
		}
	}
	
	function show_slug2($param) {
	    $url = base_url()."nagpur/".$param;
        // echo "<pre>"; print_r($param); exit;
        header("location: $url");
		$data_count = $this->site_product_model->get_products_cat_cnt($param, '');
// 		print_r($data_count);
		if ($data_count) {
			// For category
			$cat_id = $param;
			$config = array();
	        $config["total_rows"] = $this->site_product_model->get_products_cat_cnt($cat_id, '');
			$config["base_url"] = base_url() . "product/".$cat_id;
	        $config["per_page"] = 12;
	        $config["uri_segment"] = 2;		
			$this->pagination->initialize($config);
	        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        // print_r($cat_id);
	        // print_r($page);
	        // print_r($config["per_page"]);
	        // exit;
			$data['product_detail'] = $this->site_product_model->get_products_cat($cat_id, $config["per_page"] ,$page);
			$data["links"] = $this->pagination->create_links();
	 		$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
			$data['social'] = $this->site_cms_model->get_social();
		    $data['slug'] = $this->site_product_model->get_category_slug($cat_id);
			$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['categories'] = $this->site_product_model->get_category('*');
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
			$data['category'] = $this->site_cms_model->get_records_array("category", array('cat_id'=>$cat_id), "cat_id", "ASC", "1", "");
			$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
			if($cat_id=='') { $data['title'] = "Products"; }
			else { $data['title'] = "category"; }
			$data['title'] = $data['slug'][0]['cat_title'];
			$this->load->view('product_cat_view',$data);
			// ./ For category /.
		} else {

			// Product Detail Page
			$data['social'] = $this->site_cms_model->get_social();
			$data['categories'] = $this->site_product_model->get_category('*');
			$data['footer_cat'] = $this->db->order_by('cat_id', 'DESC')->limit(9)->get_where('category', array('cat_status' => 'active'))->result_array();
			$prod_url = $param;

			$data['product_detail'] = $this->site_product_model->get_products_by_url($prod_url);
			if (!empty($data['product_detail'])) {
			    $prod_id =	$data['product_detail']['0']['prod_id'];
			    
			    $data['product_list'] = $this->site_product_model->get_related_products($data['product_detail'][0]['prod_cat_id'],$prod_id);

			    $data['category'] = $this->site_product_model->get_category_by_id($data['product_detail'][0]['prod_cat_id']);
			    $data['albums'] = $this->site_cms_model->get_records_array("product_image", array('prod_id' => $prod_id), "img_id", "DESC", '', '');
			    $data['features'] = $this->site_cms_model->get_records_array("product_feature", array('prod_id' => $prod_id), "pf_id", "ASC", '', '');    
			}
			
			$data['meta_rec'] = $this->site_cms_model->get_meta_by_id(2);
			$data['new_category'] = $this->site_cms_model->get_records_array("category", '', "cat_id", "ASC", "4", "");
			$data['header_banners'] = $this->site_cms_model->get_records_array("banner_image", FALSE, "img_id", "ASC", "", "");
			$data['contact_detail'] = $this->site_cms_model->get_contact();
			$data['title'] = $data['meta_rec'][0]['meta_title'];
			$this->load->view('product_details_view',$data);
			// ./ Product Detail Page /.
		}
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */