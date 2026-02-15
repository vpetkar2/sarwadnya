<?php
class Admin_gallery_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("gal_id", "desc")->get('gallery');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	

	public function addGallery(){
		$field = array(
			'gal_title'=>$this->security->xss_clean($this->input->post('gal_title')),
			'gal_status'=>'active'
			);
		$this->db->insert('gallery', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editGallery($gal_id){
		
		$this->db->where('gal_id', $gal_id);
		$query = $this->db->get('gallery');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateGallery(){
		$gal_id = $this->input->post('gal_id');
		$gal_id = $this->security->xss_clean($gal_id);

		$data = array(
		'gal_title'=>$this->security->xss_clean($this->input->post('gal_title')),
		'gal_status'=>'active'
		);
		
		$this->db->where('gal_id', $gal_id);
		$this->db->update('gallery', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($gal_id,$status){
		
		$field = array('gal_status'=>$status);
		$this->db->where('gal_id', $gal_id);
		$this->db->update('gallery', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($gal_id){
		$this->db->where('gal_id', $gal_id);
		$query = $this->db->get('gallery');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function showallImages($gal_id)
	{
		$result = $this->db->order_by("img_id", "ASC")->where('gal_id',$gal_id)->get('gallery_image');		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}
	
	public function addGalleryImage($gal_image, $status)
	{
		$data_2 = array();
		
		$data_1 = array(
			'gal_id'=>$this->security->xss_clean($this->input->post('gal_id')),
			'gal_title'=>$this->security->xss_clean($this->input->post('gal_title_1'))
		);
		
		if($status==TRUE)
		{
			$data_2 = array('gal_image' => $gal_image);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('gallery_image', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function deleteGalleryImage($gal_id, $img_id)
	{
		$this->db->delete('gallery_image', array('img_id' =>$img_id));
		return TRUE;
	}
}
?>