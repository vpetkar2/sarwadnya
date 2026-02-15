<?php
class Site_carrier_model extends CI_Model
{
	public function get_carrier($select)
	{
		$this->db->select($select);
		$this->db->from('carrier');
		$this->db->where('crr_status', 'active');
		$this->db->order_by('crr_id','DESC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	
	public function addcarrier($prod_file, $status)
	{
		$data_2 = array();
		
		$data_1 = array(
			'contact_name'=>$this->security->xss_clean($this->input->post('title')),
			'contact_mobile'=>$this->security->xss_clean($this->input->post('mobile')),
			'contact_email'=>$this->security->xss_clean($this->input->post('email')),
			'contact_message'=>$this->security->xss_clean($this->input->post('message')),
			'contact_apply_for'=>$this->security->xss_clean($this->input->post('crrpost')),
			'contact_applydate'=>date('Y-m-d H:i:s'),
		);
		
		if($status==TRUE)
		{
			$data_2 = array('contact_resume' => $prod_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('carrier_enquiry', $data);
		
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