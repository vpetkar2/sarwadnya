<?php
class General_model extends CI_Model
{
	function get_admin_detail()
	{
		$result = $this->db->order_by('admin_id', 'ASC')->limit(1,0)->get_where('admin', array('user_type' => 'super'));
				
		return $result->row();
	}
	
	function get_sub_admin_detail()
	{
		$result = $this->db->order_by('admin_id', 'ASC')->limit(1,0)->get_where('admin', array('user_type' => 'sub'));
				
		return $result->row();
	}

	public function validate_credential($username, $type, $random_string)
	{
		$username = $this->security->xss_clean($username);
		$type = $this->security->xss_clean($type);
		if($type=="pwd")
		{
			$query = $this->db->get_where('contact_person', array('cp_email' => $username, 'cp_status' => 'active'));
		}
		if($type=="sap")
		{
			$query = $this->db->get_where('service_provider', array('sp_email' => $username, 'sp_status' => 'active'));
		}
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			if($type==="pwd")
			{
				$data = array(
				'cp_password' => md5($random_string)
				);	
			
				$this->db->where('cp_id', $row->cp_id);
				$qry1 = $this->db->update('contact_person', $data);
			}
			if($type==="sap")
			{
				$data = array(
				'sp_password' => md5($random_string)
				);	
			
				$this->db->where('sp_id', $row->sp_id);
				$qry1 = $this->db->update('service_provider', $data);
			}
		
			return $query->row();
		}
		else
		{
			return 0;
		}
	}

	public function reset_admin_password($username, $random_string)
	{
		$query = $this->db->get_where('admin', array('username' => $this->security->xss_clean($username)));
		
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			$data = array(
				'password' => md5($random_string)
			);	
			
			$this->db->where('admin_id', $row->admin_id);
			$qry1 = $this->db->update('admin', $data);
					
			return $query->row();
		}
		else
		{
			return 0;
		}
	}

	public function get_column_value($table_name,$column_name,$passed_value,$field_name)
	{
		$result = $this->db->get_where($table_name, array($column_name => $passed_value));
		$row_off = $result->row_array();
		
		return stripslashes($row_off[$field_name]);
	}

	public function get_row_value($table_name,$column_name,$passed_value)
	{
		$result = $this->db->get_where($table_name, array($column_name => $passed_value));
		return $result->row_array();
	}

	public function get_result_value($table_name,$condition_array,$order_by_column,$sort)
	{
		$this->db->order_by($order_by_column, $sort);
		$result = $this->db->get_where($table_name, $condition_array);
		return $result->result_array();
	}

	public function get_count_value($table_name,$condition_array)
	{
		$result = $this->db->get_where($table_name, $condition_array);
		return $result->num_rows();
	}
}
?>