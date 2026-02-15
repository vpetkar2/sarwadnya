<?php
class Admin_meta_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("meta_id", "Asc")->get('meta');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	

	public function addMeta(){
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('cat_title')), 'dash', TRUE);

		$data = array(
			'title'=>$this->security->xss_clean($this->input->post('title')),
			'meta_title'=>$this->security->xss_clean($this->input->post('cat_title')),
			'meta_keywords'=>$this->security->xss_clean($this->input->post('cat_key')),
			'meta_desc'=>$this->security->xss_clean($this->input->post('cat_desc')),
			'slug' => $slug
			);
		$this->db->insert('meta', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editMeta($meta_id){
		
		$this->db->where('meta_id', $meta_id);
		$query = $this->db->get('meta');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateMeta(){
		$meta_id = $this->input->post('cat_id');
		$meta_id = $this->security->xss_clean($meta_id);
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('cat_title')), 'dash', TRUE);

		$data = array(
			'title'=>$this->security->xss_clean($this->input->post('title')),
			'meta_title'=>$this->security->xss_clean($this->input->post('cat_title')),
			'meta_keywords'=>$this->security->xss_clean($this->input->post('cat_key')),
			'meta_desc'=>$this->security->xss_clean($this->input->post('cat_desc')),
			'slug' => $slug
		);
		
		$this->db->where('meta_id', $meta_id);
		$this->db->update('meta', $data);
		
		return TRUE;
		
	}
	
	public function updateStatus($meta_id,$status){
		
		$field = array('meta_status'=>$status);
		$this->db->where('meta_id', $meta_id);
		$this->db->update('meta', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($meta_id){
		$this->db->where('meta_id', $meta_id);
		$query = $this->db->get('meta');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function getMeta($meta_id){
		$this->db->where('meta_id', $meta_id);
		$query = $this->db->get('meta');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>