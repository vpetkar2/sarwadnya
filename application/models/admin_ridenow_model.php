<?php
class Admin_ridenow_model extends CI_Model
{

	public function showcontact()
	{
		$this->db->select('*')->from('ridenow')->order_by('contact_id', 'DESC');

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