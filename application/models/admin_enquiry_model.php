<?php
class Admin_enquiry_model extends CI_Model
{

	public function showenquiry()
	{
		$this->db->select('*')->from('prod_enq')->order_by('contact_id', 'DESC');

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
		
		$this->db->select('*')->from('product')->where('prod_id' ,$prodid)->order_by('prod_id', 'DESC');

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


    public function deleteEnquiry(){
		$cat_id = $this->uri->segment(4,0);
		$cat_id = $this->security->xss_clean($cat_id);
		
		$this -> db -> where('contact_id', $cat_id);
		$this -> db -> delete('prod_enq');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
}