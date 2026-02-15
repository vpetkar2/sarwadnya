<?php
class Admin_cms_model extends CI_Model
{
	

	public function showall()
	{
		$result = $this->db->order_by("cms_id", "ASC")->get('content_master');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	

	public function addCMS($cms_file, $status)
	{
		$data_2 = array();
		
		$data_1 = array(
			'cms_title'=>$this->security->xss_clean($this->input->post('cms_title')),
			'cms_url'=>$this->security->xss_clean($this->input->post('cms_url')),
			'cms_metakey'=>$this->security->xss_clean($this->input->post('cms_metakey')),
			'cms_metadesc'=>$this->security->xss_clean($this->input->post('cms_metadesc')),
			'cms_window_title'=>$this->security->xss_clean($this->input->post('cms_window_title')),
			'cms_desc'=>$this->security->xss_clean($this->input->post('cms_desc'))			
		);
		
		if($status==TRUE)
		{
			$data_2 = array('cms_image' => $cms_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('content_master', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editCMS($cms_id){
		
		$this->db->where('cms_id', $cms_id);
		$query = $this->db->get('content_master');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateCMS($cms_file, $status)
	{
		$data_2 = array();
		
		$cms_id = $this->security->xss_clean($this->input->post('cms_id'));
		
		$data_1 = array(
			'cms_title'=>$this->security->xss_clean($this->input->post('cms_title')),
			'cms_url'=>$this->security->xss_clean($this->input->post('cms_url')),
			'cms_metakey'=>$this->security->xss_clean($this->input->post('cms_metakey')),
			'cms_metadesc'=>$this->security->xss_clean($this->input->post('cms_metadesc')),
			'cms_window_title'=>$this->security->xss_clean($this->input->post('cms_window_title')),
			'cms_desc'=>$this->security->xss_clean($this->input->post('cms_desc')),
		);
		
		if($status==TRUE)
		{
			$data_2 = array('cms_image' => $cms_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->where('cms_id', $cms_id);
		$this->db->update('content_master', $data);
		
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