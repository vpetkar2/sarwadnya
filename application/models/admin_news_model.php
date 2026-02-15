<?php
class Admin_news_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("news_id", "ASC")->get('news');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	public function addnews($news_file, $status)
	{
		$data_2 = array();
		
		$date = @date('Y-m-d');
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('news_title')), 'dash', TRUE);
		
		$data_1 = array(
			'news_title'=>$this->security->xss_clean($this->input->post('news_title')),
			'slug' => $slug,
			'news_desc'=>$this->security->xss_clean($this->input->post('news_desc')),
			'news_date'=>$date
		);
		
		if($status==TRUE)
		{
			$data_2 = array('news_image' => $news_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('news', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editnews($news_id){
		
		$this->db->where('news_id', $news_id);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updatenews($news_file, $status)
	{
		$data_2 = array();
		
		$date = @date('Y-m-d');
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('news_title')), 'dash', TRUE);
		
		$news_id = $this->security->xss_clean($this->input->post('news_id'));
		
		
		
		$data_1 = array(
			'news_title'=>$this->security->xss_clean($this->input->post('news_title')),
			'slug' => $slug,
			'news_desc'=>$this->security->xss_clean($this->input->post('news_desc')),
			'news_date'=>$date
		);
		
		if($status==TRUE)
		{
			$data_2 = array('news_image' => $news_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->where('news_id', $news_id);
		$this->db->update('news', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function updateStatus($news_id,$status){
		
		$field = array('news_status'=>$status);
		$this->db->where('news_id', $news_id);
		$this->db->update('news', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($news_id){
		$this->db->where('news_id', $news_id);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>