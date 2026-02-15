<?php
class Admin_seo_model extends CI_Model
{
	public function showall()
	{
		$result = $this->db->order_by("seo_id", "ASC")->get('pf_seo');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	public function citiesall()
	{
		$result = $this->db->order_by("id", "ASC")->get('pf_city');
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}

	public function addSEO($seo_file, $status)
	{
		$data_2 = array();
		
		$data_1 = array(
			'seo_title'=>$this->security->xss_clean($this->input->post('seo_title')),
			'seo_city'  =>$this->security->xss_clean($this->input->post('seo_city')),
			'seo_url'  =>$this->security->xss_clean($this->input->post('seo_url')),
			'seo_key'  =>$this->security->xss_clean($this->input->post('seo_key')),
			'seo_desc' =>$this->security->xss_clean($this->input->post('seo_desc')),
		);
		
		if($status==TRUE)
		{
			$data_2 = array('seo_image' => $seo_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->insert('pf_seo', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function editSEO($seo_id){
		
		$this->db->where('seo_id', $seo_id);
		$query = $this->db->get('pf_seo');

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}

    public function deleteSEO($seo_id)
	{
		$this->db->delete('pf_seo', array('seo_id' =>$seo_id));
		return TRUE;
	}

	Public function getRow($table, $id=0) 
	{
          $this->db->select('*');
          $query = $this->db->get_where($table, array('id' => $id));
          $data = $query->result();

          if (empty($data[0]))
          {
            return FALSE;
          } 
          else
           {
            return $data[0];
          }
       
    }

	public function updateSEO($seo_file, $status)
	{
		$data_2 = array();
		
		$seo_id = $this->security->xss_clean($this->input->post('seo_id'));
		
		$data_1 = array(
			'seo_title'=>$this->security->xss_clean($this->input->post('seo_title')),
			'seo_city'  =>$this->security->xss_clean($this->input->post('seo_city')),
			'seo_url'  =>$this->security->xss_clean($this->input->post('seo_url')),
			'seo_key'  =>$this->security->xss_clean($this->input->post('seo_key')),
			'seo_desc' =>$this->security->xss_clean($this->input->post('seo_desc')),
		);
		
		if($status==TRUE)
		{
			$data_2 = array('seo_image' => $seo_file);
		}
		
		$data = array_merge($data_1, $data_2);
		
		$this->db->where('seo_id', $seo_id);
		$this->db->update('pf_seo', $data);
		
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