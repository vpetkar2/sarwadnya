<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/product
	 *	- or -  
	 * 		http://example.com/index.php/product/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/product/<method_name>
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
			$this->load->model('admin_product_model');		
			$this->output->enable_profiler(FALSE);
		}
	}

	public function index()
	{
		$data['products'] = $this->admin_product_model->showall();	
					
		$this->load->view('admin/product_index_view',$data);
	}

	public function addproduct()
	{   
		$data['add_error'] = FALSE;
		$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
		$data['city']=$this->admin_product_model->getListTable("pf_city", "");
		$this->load->view('admin/product_add_view',$data);
	}

	public function submitproduct()
	{
		$this->form_validation->set_rules('prod_title','product Title','required|trim|xss_clean');
		
		if ($this->form_validation->run())
		{
			$prod_file = '';
			if (!empty($_FILES['prod_file']['name']))
			{
				$prod_file = $this->file_upload('prod_file', 'jpg|jpeg|png|gif', '2048', TRUE);
				$error = "error";
				
				if($prod_file!=$error)
				{
					if($this->admin_product_model->addproduct($prod_file, $status=TRUE))
					{				
						$this->session->set_flashdata('add_success','New Record Added successfully!');
						return redirect('admin/product/index');
					}
					else
					{
						@unlink('./upload/je/'.$prod_file);
						$data['add_error'] = 'Error while adding record. Try again';			
						$this->load->view('admin/product_add_view',$data);
					}
				}
				else
				{
					$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
					$this->load->view('admin/product_add_view',$data);
				}
			}
			else
			{
				if($this->admin_product_model->addproduct($prod_file, $status=FALSE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/product/index');
				}
				else
				{
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/product_add_view',$data);
				}			
			}
		}
		else
		{
			$data['add_error'] = FALSE;			
			$this->load->view('admin/product_add_view',$data);
		}
	}

	public function editproduct()
	{
		$prod_id = $this->uri->segment(4,0);
		$prod_id = $this->security->xss_clean($prod_id);
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			$data['add_error'] = FALSE;
			$data['categories'] = $this->db->order_by('cat_title', 'ASC')->get_where('category', array('cat_status' => 'active'))->result_array();
			$data['prod_id'] = $prod_id;
			$data['product'] = $this->admin_product_model->editproduct($prod_id);//echo '<pre>';print_r($data);
			$data['city']=$this->admin_product_model->getListTable("pf_city", "");
			$this->load->view('admin/product_edit_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function updateproduct()
	{		
		$this->form_validation->set_rules('prod_title','product Title','required|trim|xss_clean');
		$this->form_validation->set_rules('prod_id','product ID','required|trim|xss_clean|numeric');				

		if ($this->form_validation->run())
		{
			$prod_id = $this->input->post('prod_id');
			$prod_id = $this->security->xss_clean($prod_id);
				
			$prod_file = ''; $status=FALSE;
			if (!empty($_FILES['prod_file']['name']))
			{
				$prod_file = $this->file_upload('prod_file', 'jpg|jpeg|png|gif', '2048', TRUE);

				$error = "error";
					
				if($prod_file!=$error)
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
					$data['prod_id'] = $prod_id;
					$data['product'] = $this->admin_product_model->editproduct($prod_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/product_edit_view',$data);
				}
			}
			
			if($this->admin_product_model->updateproduct($prod_file, $status))
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/product/index');
			}
			else
			{
				if($prod_file!="")
				{
					@unlink('./upload/je/'.$prod_file);
				}
				
				if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['prod_id'] = $prod_id;
					$data['product'] = $this->admin_product_model->editproduct($prod_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/product_edit_view',$data);
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
			$data['prod_id'] = $prod_id;
			$data['product'] = $this->admin_product_model->editproduct($prod_id);//echo '<pre>';print_r($data);
			$this->load->view('admin/product_edit_view',$data);
		}		
	}	
	
	public function productImages($prod_id)
	{
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			$data['pimages'] = $this->admin_product_model->showallImages($prod_id);
			$data['prod_id'] = $prod_id;	
			$data['add_error'] = FALSE;
			//echo "<pre>";print_r($data);exit;
			$this->load->view('admin/product_images_index_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function submitproductImage()
	{
		$this->form_validation->set_rules('prod_id','product ID','required|trim|xss_clean');
		if(empty($_FILES['prod_image']['name']))
		{
			$this->form_validation->set_rules('prod_image','Image','required');
		}
		
		$prod_id = $this->input->post('prod_id');
		$prod_id = $this->security->xss_clean($prod_id);

		if ($this->form_validation->run())
		{
			$prod_image = '';
			
			$prod_image = $this->file_upload('prod_image', 'jpg|jpeg|png|gif', '2048', TRUE);
			$error = "error";
			
			if($prod_image!=$error)
			{
				if($this->admin_product_model->addproductImage($prod_image, $status=TRUE))
				{				
					$this->session->set_flashdata('add_success','New Record Added successfully!');
					return redirect('admin/product/productImages/'.$prod_id);
				}
				else
				{
					@unlink('./upload/je/'.$prod_image);
					$data['pimages'] = $this->admin_product_model->showallImages($prod_id);
					$data['prod_id'] = $prod_id;		
					$data['add_error'] = 'Error while adding record. Try again';			
					$this->load->view('admin/product_images_index_view',$data);
				}
			}
			else
			{
				$data['add_error'] = "There is an error while uploading file. Please upload image file only and try again.";
				$data['pimages'] = $this->admin_product_model->showallImages($prod_id);
				$data['prod_id'] = $prod_id;				
				$this->load->view('admin/product_images_index_view',$data);
			}
		}
		else
		{
			$data['pimages'] = $this->admin_product_model->showallImages($prod_id);
			$data['prod_id'] = $prod_id;	
			$data['add_error'] = FALSE;	
			$this->load->view('admin/product_images_index_view',$data);
		}
	}
	
	public function deleteproductImage($prod_id, $img_id)
	{
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			if(isset($img_id) && !empty($img_id) && $img_id!=NULL && $img_id > 0)
			{
				$prod_image = $this->db->get_where('product_image', array('img_id' => $img_id))->row()->prod_image;
				@unlink('./upload/je/'.$prod_image);
				
				$this->admin_product_model->deleteproductImage($prod_id, $img_id);
				
				$this->session->set_flashdata('delete_success','Image Record Deleted successfully!');
				return redirect('admin/product/productImages/'.$prod_id);
			}
			else
			{ 
				return redirect('admin/fournotfour');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function productFeatures($prod_id)
	{
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			$data['features'] = $this->admin_product_model->showallproductFeatures($prod_id);
			$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
			$data['prod_id'] = $prod_id;	
			$data['add_error'] = FALSE;
			
			$this->load->view('admin/product_features_index_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function addFeature($prod_id)
	{
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			$data['prod_id'] = $prod_id;	
			$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
			$data['add_error'] = FALSE;
			
			$this->load->view('admin/product_features_add_view',$data);
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}

	public function submitFeature()
	{
		$this->form_validation->set_rules('pf_name','Feature Title','required|trim|xss_clean');
		$this->form_validation->set_rules('pf_detail','Feature Detail','required|trim|xss_clean');
		$this->form_validation->set_rules('prod_id','product ID','required|trim|xss_clean');
		
		$prod_id = $this->input->post('prod_id');
		$prod_id = $this->security->xss_clean($prod_id);				
				
		if ($this->form_validation->run())
		{			
			if($this->admin_product_model->createFeature())
			{				
				$this->session->set_flashdata('add_success','New Record Added successfully!');
				return redirect('admin/product/productFeatures/'.$prod_id);
			}
			else
			{
				$data['prod_id'] = $prod_id;
				$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
				$data['add_error'] = 'Error while adding record. Try again';			
				$this->load->view('admin/product_features_add_view',$data);
			}			
		}
		else
		{
			$data['prod_id'] = $prod_id;	
			$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
			$data['add_error'] = FALSE;
			
			$this->load->view('admin/product_features_add_view',$data);
		}
	}
	
	public function editFeature($prod_id, $pf_id)
	{
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			if(isset($pf_id) && !empty($pf_id) && $pf_id!=NULL && $pf_id > 0)
			{
				$data['prod_id'] = $prod_id;
				$data['pf_id'] = $pf_id;
				$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
				$data['feature'] = $this->admin_product_model->editFeature($prod_id, $pf_id);
				$data['add_error'] = FALSE;
				
				$this->load->view('admin/product_features_edit_view',$data);
			}
			else
			{ 
				return redirect('admin/fournotfour');
			}
		}
		else
		{ 
			return redirect('admin/fournotfour');
		}
	}
	
	public function updateFeature()
	{
		$this->form_validation->set_rules('pf_name','Feature Title','required|trim|xss_clean');
		$this->form_validation->set_rules('pf_detail','Feature Detail','required|trim|xss_clean');
		$this->form_validation->set_rules('pf_id','Feature ID','required|trim|xss_clean');
		$this->form_validation->set_rules('prod_id','product ID','required|trim|xss_clean');
		
		$prod_id = $this->input->post('prod_id');
		$prod_id = $this->security->xss_clean($prod_id);
		
		$pf_id = $this->input->post('pf_id');
		$pf_id = $this->security->xss_clean($pf_id);
			
		if ($this->form_validation->run())
		{
			if($this->admin_product_model->updateFeature())
			{				
				$this->session->set_flashdata('update_success','Record Updated successfully!');
				return redirect('admin/product/productFeatures/'.$prod_id);
			}
			else
			{
				$data['prod_id'] = $prod_id;
				$data['pf_id'] = $pf_id;			
				$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
				$data['feature'] = $this->admin_product_model->editFeature($prod_id, $pf_id);
				$data['add_error'] = 'Error while updating record. Try again';			
				$this->load->view('admin/product_features_edit_view',$data);
			}			
		}
		else
		{
			$data['prod_id'] = $prod_id;
			$data['pf_id'] = $pf_id;			
			$data['product_name'] = $this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title;
			$data['feature'] = $this->admin_product_model->editFeature($prod_id, $pf_id);
			$data['add_error'] = FALSE;
			
			$this->load->view('admin/product_features_edit_view',$data);
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

	public function deleteProduct()
	{
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
		{
			if($this->admin_product_model->deleteProduct())
			{				
				$this->session->set_flashdata('delete_success','Record Deleted successfully!');
				return redirect('admin/product/index');
			}
			else
			{				
				if(isset($cat_id) && !empty($cat_id) && $cat_id!=NULL && $cat_id > 0)
				{
					$data['add_error'] = 'Error while updating record. Try again';
					$data['cat_id'] = $cat_id;
					//$data['category'] = $this->admin_category_model->editCategory($cat_id);//echo '<pre>';print_r($data);
					$this->load->view('admin/product_index_view',$data);
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

	public function deleteMultipleFeatures($prod_id)
	{
		if(isset($prod_id) && !empty($prod_id) && $prod_id!=NULL && $prod_id > 0)
		{
			$feature_ids = $this->input->post('feature_ids');
			if(!empty($feature_ids) && is_array($feature_ids))
			{
				// Remove any non-numeric values for security
				$feature_ids = array_filter($feature_ids, 'is_numeric');

				if($this->admin_product_model->deleteMultipleFeatures($feature_ids))
				{
					$this->session->set_flashdata('delete_success', count($feature_ids).' feature(s) deleted successfully!');
					return redirect('admin/product/productFeatures/'.$prod_id);
				}
				else
				{
					$this->session->set_flashdata('error', 'Error while deleting features. Try again');
					return redirect('admin/product/productFeatures/'.$prod_id);
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Please select at least one feature to delete');
				return redirect('admin/product/productFeatures/'.$prod_id);
			}
		}
		else
		{
			return redirect('admin/fournotfour');
		}
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */