<?php
class Admin_product_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("prod_id", "ASC")->get('product');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}
	
	public function getListTable($table, $order_by='') {

        $this->db->select("*");

        $this->db->from($table);
        if (!empty($order_by)) {
            $this->db->order_by($order_by, 'asc');
        }
        $query = $this->db->get();

        return $result = $query->result();

    }
    
	public function addproduct($prod_file, $status)
	{
		$data_2 = array();
		
        $this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('prod_title')), 'dash', TRUE);


		$data_1 = array(
			'prod_title'=>$this->security->xss_clean($this->input->post('prod_title')),
			'prod_url' => $slug,
			'prod_cost'=>$this->security->xss_clean($this->input->post('prod_cost')),
			'prod_code'=>$this->security->xss_clean($this->input->post('prod_code')),
			'prod_short_desc'=>$this->security->xss_clean($this->input->post('prod_short_desc')),
			'prod_cat_id'=>$this->security->xss_clean($this->input->post('cat_id')),
			'prod_city_id'=>$this->security->xss_clean($this->input->post('city_id')),
			'prod_desc'=>$this->security->xss_clean($this->input->post('prod_desc'))
		);
		
		$data_seo = array(
	    'seo_title'=>$this->security->xss_clean($this->input->post('prod_title')),
	    'seo_key'  =>$this->security->xss_clean($this->input->post('prod_title')),
	    'seo_desc' =>$this->security->xss_clean($this->input->post('prod_title')),
	    'seo_url'  =>$slug
	    );
	    // $this->db->insert('pf_seo', $data_seo);
	    
		if($status==TRUE)
		{
			$data_2 = array('prod_image' => $prod_file);
		}
	   //print_r($status);	print_r($data_1); echo "<pre>"; print_r($data_2); exit;
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('product', $data);
		$this->db->insert('pf_seo', $data_seo);
		
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editproduct($prod_id){
		
		$this->db->where('prod_id', $prod_id);
		$query = $this->db->get('product');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateproduct($prod_file, $status)
	{
		$data_2 = array();
		
		$prod_id = $this->security->xss_clean($this->input->post('prod_id'));
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('prod_title')), 'dash', TRUE);
		
		$data_1 = array(
			'prod_title'=>$this->security->xss_clean($this->input->post('prod_title')),
			'prod_url' => $slug,
			'prod_cost'=>$this->security->xss_clean($this->input->post('prod_cost')),
			'prod_code'=>$this->security->xss_clean($this->input->post('prod_code')),
			'prod_short_desc'=>$this->security->xss_clean($this->input->post('prod_short_desc')),
			'prod_cat_id'=>$this->security->xss_clean($this->input->post('cat_id')),
			'prod_city_id'=>$this->security->xss_clean($this->input->post('city_id')),
			'prod_desc'=>$this->security->xss_clean($this->input->post('prod_desc'))
		);
		
		if($status==TRUE)
		{
			$data_2 = array('prod_image' => $prod_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->where('prod_id', $prod_id);
		$this->db->update('product', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function showallImages($prod_id)
	{
		$result = $this->db->order_by("img_id", "ASC")->where('prod_id',$prod_id)->get('product_image');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}
	
	public function addproductImage($prod_image, $status)
	{
		$data_2 = array();
		
		$data_1 = array(
			'prod_id'=>$this->security->xss_clean($this->input->post('prod_id'))
		);
		
		if($status==TRUE)
		{
			$data_2 = array('prod_image' => $prod_image);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('product_image', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function deleteproductImage($prod_id, $img_id)
	{
		$this->db->delete('product_image', array('img_id' =>$img_id));
		return TRUE;
	}
	
	public function showallproductFeatures($prod_id)
	{
		$this->db->where('prod_id', $prod_id);
		$query = $this->db->get('product_feature');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	
	public function createFeature()
	{		
		$data = array(
			'pf_name'=>$this->security->xss_clean($this->input->post('pf_name')),
			'pf_detail'=>$this->security->xss_clean($this->input->post('pf_detail')),
			'prod_id'=>$this->security->xss_clean($this->input->post('prod_id'))
		);
		
		$this->db->insert('product_feature', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editFeature($prod_id, $pf_id)
	{
		
		$this->db->where('pf_id', $pf_id);
		$this->db->where('prod_id', $prod_id);
		$query = $this->db->get('product_feature');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}

	public function updateFeature()
	{
		$pf_id = $this->security->xss_clean($this->input->post('pf_id'));
		$prod_id = $this->security->xss_clean($this->input->post('prod_id'));
		
		$data = array(
			'pf_name'=>$this->security->xss_clean($this->input->post('pf_name')),
			'pf_detail'=>$this->security->xss_clean($this->input->post('pf_detail'))
		);
		
		
		$this->db->where('pf_id', $pf_id);
		$this->db->where('prod_id', $prod_id);
		$this->db->update('product_feature', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function deleteProduct(){
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		
		$this -> db -> where('prod_id', $cat_id);
		$this -> db -> delete('product');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function deleteMultipleFeatures($feature_ids)
	{
		$this->db->where_in('pf_id', $feature_ids);
		$this->db->delete('pf_product_feature');
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
?>