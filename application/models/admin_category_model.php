<?php
class Admin_category_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("cat_id", "desc")->get('category');		
		
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

	public function addCategory(){
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('cat_title')), 'dash', TRUE);

		$data = array(
		    'city_id'=>$this->security->xss_clean($this->input->post('city_id')),
			'cat_title'=>$this->security->xss_clean($this->input->post('cat_title')),
			'cat_desc'=>$this->security->xss_clean($this->input->post('cat_desc')),
			'slug' => $slug,
			'cat_status'=>'active'
			);
			
		$data_seo = array(
		    'seo_title'=>$this->security->xss_clean($this->input->post('cat_title')),
		    'seo_key'=>$this->security->xss_clean($this->input->post('cat_title')),
		    'seo_desc'=>$this->security->xss_clean($this->input->post('cat_title')),
		    'seo_url'=>$slug
		    );

		$this->db->insert('category', $data);
		$this->db->insert('pf_seo', $data_seo);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editCategory($cat_id){
		
		$this->db->where('cat_id', $cat_id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateCategory(){
		$cat_id = $this->input->post('cat_id');
		$cat_id = $this->security->xss_clean($cat_id);
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('cat_title')), 'dash', TRUE);

		$data = array(
		'city_id'=>$this->security->xss_clean($this->input->post('city_id')),
		'cat_title'=>$this->security->xss_clean($this->input->post('cat_title')),
		'cat_desc'=>$this->security->xss_clean($this->input->post('cat_desc')),
		'slug' => $slug,
		'cat_status'=>'active'
		);
		
		$this->db->where('cat_id', $cat_id);
		$this->db->update('category', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($cat_id,$status){
		
		$field = array('cat_status'=>$status);
		$this->db->where('cat_id', $cat_id);
		$this->db->update('category', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($cat_id){
		$this->db->where('cat_id', $cat_id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function getCategory($cat_id){
		$this->db->where('cat_id', $cat_id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	public function deleteCategory(){
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		
		$this -> db -> where('cat_id', $cat_id);
		$this -> db -> delete('category');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>