<?php
class Admin_social_model extends CI_Model
{

	public function getDetails()
	{
		$this->db->select('*')->from('social_media')->order_by('s_id', 'DESC');

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

	public function update_social()
	{
		$fb_social = $this->security->xss_clean($this->input->post('fb_social'));
		//$conus_fax = $this->security->xss_clean($this->input->post('conus_fax'));
		$tw_social = $this->security->xss_clean($this->input->post('tw_social'));
		$ln_social = $this->security->xss_clean($this->input->post('ln_social'));
		$yt_social = $this->security->xss_clean($this->input->post('yt_social'));
		//$conus_map = $this->security->xss_clean($this->input->post('conus_map'));

		$data = array('fb_social'=>$fb_social, 'tw_social'=>$tw_social, 'ln_social'=>$ln_social, 'yt_social'=>$yt_social);
		
		$result = $this->db->update('social_media', $data);

		return TRUE;
	}
	
}