<?php
class Admin_blog_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("b_id", "ASC")->get('blog');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	public function addBlog($b_file, $status)
	{
		$data_2 = array();
		
		$date = @date('Y-m-d');
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('b_title')), 'dash', TRUE);
		
		$cat_ids = implode(',', $this->security->xss_clean($this->input->post('cat_id')));
		
		$data_1 = array(
			'cat_id'=>$cat_ids,
			'b_title'=>$this->security->xss_clean($this->input->post('b_title')),
			'slug' => $slug,
			'b_author'=>$this->security->xss_clean($this->input->post('b_author')),
			'b_desc'=>$this->security->xss_clean($this->input->post('b_desc')),
			'b_date'=>$date
		);
		
		if($status==TRUE)
		{
			$data_2 = array('b_image' => $b_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('blog', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editBlog($b_id){
		
		$this->db->where('b_id', $b_id);
		$query = $this->db->get('blog');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateBlog($b_file, $status)
	{
		$data_2 = array();
		
		$date = @date('Y-m-d');
		
		$this->load->helper('url');
		$slug = url_title($this->security->xss_clean($this->input->post('b_title')), 'dash', TRUE);
		
		$b_id = $this->security->xss_clean($this->input->post('b_id'));
		
		$cat_ids = implode(',', $this->security->xss_clean($this->input->post('cat_id')));
		
		$data_1 = array(
			'cat_id'=>$cat_ids,
			'b_title'=>$this->security->xss_clean($this->input->post('b_title')),
			'slug' => $slug,
			'b_author'=>$this->security->xss_clean($this->input->post('b_author')),
			'b_desc'=>$this->security->xss_clean($this->input->post('b_desc')),
			'b_date'=>$date
		);
		
		if($status==TRUE)
		{
			$data_2 = array('b_image' => $b_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->where('b_id', $b_id);
		$this->db->update('blog', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function updateStatus($b_id,$status){
		
		$field = array('b_status'=>$status);
		$this->db->where('b_id', $b_id);
		$this->db->update('blog', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($b_id){
		$this->db->where('b_id', $b_id);
		$query = $this->db->get('blog');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>