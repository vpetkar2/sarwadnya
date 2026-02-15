<?php
class Admin_client_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("client_id", "desc")->get('client');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	

	public function addClient($client){
		$field = array(
			'client_title'=>$this->security->xss_clean($this->input->post('client_title')),
			'client_logo'=>$client,
			'client_status'=>'active'
			);
		$this->db->insert('client', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editClient($client_id){
		
		$this->db->where('client_id', $client_id);
		$query = $this->db->get('client');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function updateClient($client){
		$client_id = $this->input->post('client_id');
		$client_id = $this->security->xss_clean($client_id);

		$data_1 = array();
		if($client!='')
		{
			$data_1 = array('client_logo'=>$client);			
		}
		
		$data_2 = array(
		'client_title'=>$this->security->xss_clean($this->input->post('client_title')),
		'client_status'=>'active'
		);

		$data = array_merge($data_1,$data_2);


		$this->db->where('client_id', $client_id);
		$this->db->update('client', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function updateStatus($client_id,$status){
		
		$field = array(
		'client_status'=>$status
		);
		$this->db->where('client_id', $client_id);
		$this->db->update('client', $field);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getStatus($client_id){
		$this->db->where('client_id', $client_id);
		$query = $this->db->get('client');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
}
?>