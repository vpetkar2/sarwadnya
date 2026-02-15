<?php
class Admin_banner_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("ban_id", "desc")->get('banner');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	
	
	public function editCap($ban_id,$img_id)
	{
		$this->db->where('ban_id', $ban_id);
		$this->db->where('img_id', $img_id);
		$query = $this->db->get('banner_image');
		
		if($query->num_rows())
		{
			return $query->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	

	public function addBanner(){
		$field = array(
			'ban_title'=>$this->security->xss_clean($this->input->post('ban_title')),
			'ban_status'=>'active'
			);
		$this->db->insert('banner', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function addCap(){
		$ban_id = $this->input->post('ban_id');
		$img_id = $this->input->post('img_id');
		$ban_id = $this->security->xss_clean($ban_id);
		$img_id = $this->security->xss_clean($img_id);

		$data = array(
		'ban_cap'=>$this->security->xss_clean($this->input->post('ban_cap'))
		);
		
		$this->db->where('ban_id', $ban_id);
		$this->db->where('img_id', $img_id);
		$this->db->update('banner_image', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editBanner($ban_id){
		
		$this->db->where('ban_id', $ban_id);
		$query = $this->db->get('banner');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateBanner(){
		$ban_id = $this->input->post('ban_id');
		$ban_id = $this->security->xss_clean($ban_id);

		$data = array(
		'ban_title'=>$this->security->xss_clean($this->input->post('ban_title')),
		'ban_status'=>'active'
		);
		
		$this->db->where('ban_id', $ban_id);
		$this->db->update('banner', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($ban_id,$status){
		
		$field = array('ban_status'=>$status);
		$this->db->where('ban_id', $ban_id);
		$this->db->update('banner', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($ban_id){
		$this->db->where('ban_id', $ban_id);
		$query = $this->db->get('banner');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function showallImages($ban_id)
	{
		$result = $this->db->order_by("img_id", "ASC")->where('ban_id',$ban_id)->get('banner_image');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}
	
	public function addBannerImage($ban_image, $status)
	{
		$data_2 = array();
		
		$data_1 = array('ban_id'=>$this->security->xss_clean($this->input->post('ban_id')));
		$data_3 = array('ban_cap'=>$this->security->xss_clean($this->input->post('ban_cap')));
		if($status==TRUE)
		{
			$data_2 = array('ban_image' => $ban_image);
		}
		
		$data = array_merge($data_1, $data_2, $data_3);
		
		$this->db->insert('banner_image', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function deleteBannerImage($ban_id, $img_id)
	{
		$this->db->delete('banner_image', array('img_id' =>$img_id));
		return TRUE;
	}
}
?>