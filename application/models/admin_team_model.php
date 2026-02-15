<?php
class Admin_team_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("team_id", "desc")->get('team');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	

	public function addTeam($team){
		$field = array(
			'team_title'=>$this->security->xss_clean($this->input->post('team_title')),
			'team_designation'=>$this->security->xss_clean($this->input->post('team_designation')),
			'team_profile'=>$this->security->xss_clean($this->input->post('team_profile')),
			'team_logo'=>$team,
			'team_status'=>'active'
			);
		$this->db->insert('team', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editTeam($team_id){
		
		$this->db->where('team_id', $team_id);
		$query = $this->db->get('team');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateTeam($team){
		$team_id = $this->input->post('team_id');
		$team_id = $this->security->xss_clean($team_id);

		$data_1 = array();
		if($team!='')
		{
			$data_1 = array('team_logo'=>$team);			
		}
		
		$data_2 = array(
		'team_title'=>$this->security->xss_clean($this->input->post('team_title')),
		'team_designation'=>$this->security->xss_clean($this->input->post('team_designation')),
		'team_profile'=>$this->security->xss_clean($this->input->post('team_profile')),
		'team_status'=>'active'
		);

		$data = array_merge($data_1,$data_2);


		$this->db->where('team_id', $team_id);
		$this->db->update('team', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($team_id,$status){
		
		$field = array(
		'team_status'=>$status
		);
		$this->db->where('team_id', $team_id);
		$this->db->update('team', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($team_id){
		$this->db->where('team_id', $team_id);
		$query = $this->db->get('team');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function showallCMS()
	{
		$result = $this->db->order_by("tcms_id", "ASC")->get('team_cms');
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}	

	public function addCMS()
	{
		$data = array(
			'tcms_title'=>$this->security->xss_clean($this->input->post('tcms_title')),
			'tcms_desc'=>$this->security->xss_clean($this->input->post('tcms_desc'))			
		);
		
		$this->db->insert('team_cms', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editCMS($tcms_id){
		
		$this->db->where('tcms_id', $tcms_id);
		$query = $this->db->get('team_cms');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateCMS()
	{
		$tcms_id = $this->security->xss_clean($this->input->post('tcms_id'));
		
		$data = array(
			'tcms_title'=>$this->security->xss_clean($this->input->post('tcms_title')),
			'tcms_desc'=>$this->security->xss_clean($this->input->post('tcms_desc')),
		);
		
		$this->db->where('tcms_id', $tcms_id);
		$this->db->update('team_cms', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function updateCMSstatus($tcms_id, $status){
		
		$field = array(
		'tcms_status'=>$status
		);
		$this->db->where('tcms_id', $tcms_id);
		$this->db->update('team_cms', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getCMSstatus($tcms_id){
		$this->db->where('tcms_id', $tcms_id);
		$query = $this->db->get('team_cms');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	public function showallImages($tcms_id)
	{
		$result = $this->db->order_by("img_id", "ASC")->where('tcms_id',$tcms_id)->get('team_cms_gallery_image');		
		
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
		
		$data_1 = array('tcms_id'=>$this->security->xss_clean($this->input->post('tcms_id')));
		
		if($status==TRUE)
		{
			$data_2 = array('gal_image' => $gal_image);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('team_cms_gallery_image', $data);
		
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
		$this->db->delete('team_cms_gallery_image', array('img_id' =>$img_id));
		return TRUE;
	}
}
?>