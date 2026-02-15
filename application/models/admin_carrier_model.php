<?php
class Admin_carrier_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("crr_id", "desc")->get('carrier');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	

	public function addCarrier(){
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('crr_title')), 'dash', TRUE);

		$data = array(
			'crr_title'=>$this->security->xss_clean($this->input->post('crr_title')),
			'crr_desc'=>$this->security->xss_clean($this->input->post('crr_desc')),
			'crr_no_of_position'=>$this->security->xss_clean($this->input->post('crr_no_of_position')),
			'crr_date'=>date('Y-m-d H:i:s'),
			'crr_status'=>'active'
			);
		$this->db->insert('carrier', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editCarrier($cat_id){
		
		$this->db->where('crr_id', $cat_id);
		$query = $this->db->get('carrier');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateCarrier(){
		$crr_id = $this->input->post('crr_id');
		$crr_id = $this->security->xss_clean($crr_id);
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('crr_title')), 'dash', TRUE);

		$data = array(
		'crr_title'=>$this->security->xss_clean($this->input->post('crr_title')),
		'crr_desc'=>$this->security->xss_clean($this->input->post('crr_desc')),
		'crr_no_of_position'=>$this->security->xss_clean($this->input->post('crr_no_of_position')),
		'crr_status'=>'active'
		);
		
		$this->db->where('crr_id', $crr_id);
		$this->db->update('carrier', $data);
		
		return TRUE;
	
	}
	
	public function updateStatus($cat_id,$status){
		
		$field = array('crr_status'=>$status);
		$this->db->where('crr_id', $cat_id);
		$this->db->update('carrier', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($cat_id){
		$this->db->where('crr_id', $cat_id);
		$query = $this->db->get('carrier');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function getCategory($cat_id){
		$this->db->where('crr_id', $cat_id);
		$query = $this->db->get('carrier');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>