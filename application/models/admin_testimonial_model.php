<?php
class Admin_testimonial_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("tes_id", "ASC")->get('testimonial');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	public function addTestimonial()
	{
		$data = array(
			'tes_name'=>$this->security->xss_clean($this->input->post('tes_name')),
			'tes_company'=>$this->security->xss_clean($this->input->post('tes_company')),
			'tes_detail'=>$this->security->xss_clean($this->input->post('tes_detail'))
		);
		
		$this->db->insert('testimonial', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editTestimonial($tes_id){
		
		$this->db->where('tes_id', $tes_id);
		$query = $this->db->get('testimonial');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateTestimonial()
	{
		$tes_id = $this->security->xss_clean($this->input->post('tes_id'));
		
		$data = array(
			'tes_name'=>$this->security->xss_clean($this->input->post('tes_name')),
			'tes_company'=>$this->security->xss_clean($this->input->post('tes_company')),
			'tes_detail'=>$this->security->xss_clean($this->input->post('tes_detail'))
		);
		
		$this->db->where('tes_id', $tes_id);
		$this->db->update('testimonial', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function getStatus($b_id){
		$this->db->where('tes_id', $b_id);
		$query = $this->db->get('testimonial');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($b_id,$status){
		
		$field = array('tes_status'=>$status);
		$this->db->where('tes_id', $b_id);
		$this->db->update('testimonial', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}