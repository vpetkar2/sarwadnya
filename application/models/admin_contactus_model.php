<?php
class Admin_contactus_model extends CI_Model
{

	public function getDetails()
	{
		$this->db->select('*')->from('contact_us')->order_by('conus_id', 'DESC');

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}

	public function update_contact()
	{
		$conus_email = $this->security->xss_clean($this->input->post('conus_email'));
		//$conus_fax = $this->security->xss_clean($this->input->post('conus_fax'));
		$conus_phone = $this->security->xss_clean($this->input->post('conus_phone'));
		$conus_mobile = $this->security->xss_clean($this->input->post('conus_mobile'));
		$conus_address = $this->security->xss_clean($this->input->post('conus_address'));
		$conus_address2 = $this->security->xss_clean($this->input->post('conus_address2'));
		//$conus_map = $this->security->xss_clean($this->input->post('conus_map'));

		$data = array('conus_email'=>$conus_email, 'conus_phone'=>$conus_phone, 'conus_mobile'=>$conus_mobile, 'conus_address'=>$conus_address,'conus_address2'=>$conus_address2);
		
		$result = $this->db->update('contact_us', $data);

		return TRUE;
	}
	
}