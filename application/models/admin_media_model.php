<?php
class Admin_media_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("media_id", "desc")->get('media');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	

	public function addMedia(){
		$field = array(
			'media_title'=>$this->security->xss_clean($this->input->post('media_title')),
			'media_url'=>$this->input->post('media_url'),
			'media_status'=>'active'
			);
		$this->db->insert('media', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editMedia($media_id){
		
		$this->db->where('media_id', $media_id);
		$query = $this->db->get('media');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateMedia(){
		$media_id = $this->input->post('media_id');
		$media_id = $this->security->xss_clean($media_id);
		$field = array(
		'media_title'=>$this->security->xss_clean($this->input->post('media_title')),
		'media_url'=>$this->input->post('media_url'),
		'media_status'=>'active'
		);
		$this->db->where('media_id', $media_id);
		$this->db->update('media', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($media_id,$status){
		
		$field = array(
		'media_status'=>$status
		);
		$this->db->where('media_id', $media_id);
		$this->db->update('media', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($media_id){
		$this->db->where('media_id', $media_id);
		$query = $this->db->get('media');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>