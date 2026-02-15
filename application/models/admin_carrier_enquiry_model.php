<?php
class Admin_carrier_enquiry_model extends CI_Model
{

	public function showenquiry()
	{
		$this->db->select('*')->from('carrier_enquiry')->order_by('contact_id', 'DESC');

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	public function showenquiryProd($prodid)
	{
		
		$this->db->select('*')->from('carrier')->where('crr_id' ,$prodid)->order_by('crr_id', 'DESC');

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
}