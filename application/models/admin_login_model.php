<?php
class Admin_login_model extends CI_Model
{
	public function validate_credentials($username, $password)
	{
		$result = $this->db->get_where('admin', array('username' => $username, 'password' => $password));
		
		
		if($result->num_rows())
		{
			$row = $result->row_array();
			
			$admin_details = array(
			   'admin_admin_id'     => $row["admin_id"],
			   'admin_username'     => stripslashes($row["username"]),
			   'admin_email'     => stripslashes($row["email"]),
			   'admin_contact_no'     => stripslashes($row["contact_no"]),
			   'admin_user_type'     => stripslashes($row["user_type"]),
			   'admin_name'     => stripslashes($row["name"])
			);
			$this->session->set_userdata($admin_details);
			$this->session->set_userdata('admin_logged_in',TRUE);				
			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function update_profile($array)
	{
		$data = array(
			'username' => $this->security->xss_clean($array['username']), 
			'email' => $this->security->xss_clean($array['email']), 
			'contact_no' => $this->security->xss_clean($array['contact_no'])
			);	
		
		$this->db->where('admin_id', $this->security->xss_clean($array['admin_id']));

		$this->db->update('admin', $data); 
		
		$qry1 = $this->db->affected_rows();
		
		if($qry1 > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function validate_password($array)
	{
		$result = $this->db->get_where('admin', array('password' => $array['old_password'],'admin_id' => $this->security->xss_clean($array['admin_id'])));

		if ($result->num_rows() > 0)
		{
		
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function change_password($array)
	{
		$data = array(
			'password' => $this->security->xss_clean($array['password'])
			);	
		
		$this->db->where('admin_id', $this->security->xss_clean($array['admin_id']));
		$this->db->update('admin', $data); 		
		
		$qry1 = $this->db->affected_rows();

		if($qry1 > 0)
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