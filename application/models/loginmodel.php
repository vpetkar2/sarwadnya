<?php
class Loginmodel extends CI_Model
{
	public function validate_credentials($username, $password, $type)
	{
		if($type=="pwd")
		{
			$result = $this->db->get_where('contact_person', array('cp_email' => $username, 'cp_password' => $password));
		}
		if($type=="sap")
		{
			$result = $this->db->get_where('service_provider', array('sp_email' => $username, 'sp_password' => $password));
		}
		
		if($result->num_rows())
		{
			$row = $result->row_array();
			if($type == "pwd")
			{
				$userdetails = array(
                   'folder'  => 'pwd',
                   'site_type'     => 'PWD',
				   'pwd_user_id'     => $row["cp_id"],
				   'pwd_user_email'     => stripslashes($row["cp_email"]),
				   'pwd_user_mobile'     => stripslashes($row["cp_mobile_no"]),
				   'pwd_user_name'     => stripslashes($row["cp_name"]),
				   'pwd_office_id'     => stripslashes($row["cp_office_id"]),
				   'pwd_office_type'     => stripslashes($row["cp_office_type"])
				);
				$this->session->set_userdata($userdetails);
				$this->session->set_userdata('pwd_logged_in',TRUE);				
			}
			if($type=="sap")
			{
				$userdetails = array(
                   'folder'  => 'sap',
                   'site_type'     => 'SAP',
				   'sap_user_id'     => $row["sp_id"],
				   'sap_user_email'     => stripslashes($row["sp_email"]),
				   'sap_user_mobile'     => stripslashes($row["sp_mobile_no"]),
				   'sap_user_name'     => stripslashes($row["sp_name"])
				);
				$this->session->set_userdata($userdetails);
				$this->session->set_userdata('sap_logged_in',TRUE);	
			}
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
?>