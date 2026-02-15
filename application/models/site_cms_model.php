<?php
class Site_cms_model extends CI_Model
{	
    public function allcity()
	{
		$result = $this->db->get('pf_city');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}
    
    public function get_footer_cat($num) {
        return $this->db->order_by('cat_id', 'DESC')->limit($num)->get_where('category', array('cat_status' => 'active', 'city_id' => $this->session->userdata('cityId')))->result_array();
    }

	public function get_cms_by_url($url)
	{
		$this->db->from('content_master');
		$this->db->where('cms_url',$url);
		$query = $this->db->get();
 
		return $query->row();
	}	
	
	public function get_cms_by_id($cms_id)
	{
		$query = $this->db->get_where('content_master', array('cms_id' => $cms_id));
		return $query->row();
	}

	public function get_record_by_id($table_name, $where, $order_by_first, $order_by_second, $limit_first, $limit_second)
	{
		$query = $this->db->order_by($order_by_first, $order_by_second)->limit($limit_first, $limit_second)->get_where($table_name, $where);
		return $query->row();
	}
	
	public function get_meta_by_id($meta_id)
	{
		$query = $this->db->get_where('meta', array('meta_id' => $meta_id));
		return $query->result_array();
	}
	
	public function get_records_array($table_name, $where=FALSE, $order_by_first, $order_by_second, $limit_first, $limit_second)	
	{
		if($order_by_first!='' && $order_by_second!='')
		{
			$this->db->order_by($order_by_first, $order_by_second);
		}
		
		if($limit_first!='' && $limit_second!='')
		{
			$this->db->limit($limit_first, $limit_second);
		}
		
		if($where!=FALSE)
		{
			$query = $this->db->get_where($table_name, $where);
		}
		else
		{
			$query = $this->db->get($table_name);
		}
		
		//$query = $this->db->get_where($table_name, $where);
		return $query->result_array();
	}

	public function get_records_array_home($table_name, $where=FALSE, $order_by_first, $order_by_second, $limit_first, $limit_second)	
	{
		
			$this->db->order_by($order_by_first);
		
		
		
			$this->db->limit($limit_first);
		
		
		if($where!=FALSE)
		{
			$query = $this->db->get_where($table_name, $where);
		}
		else
		{
			$query = $this->db->get($table_name);
		}
		
		//$query = $this->db->get_where($table_name, $where);
		return $query->result_array();
	}
	
	public function addContact()
	{
		$field = array(
			'contact_name'=>$this->security->xss_clean($this->input->post('fname')."	".$this->input->post('lname')),
			'contact_email'=>$this->security->xss_clean($this->input->post('email')),
			'contact_mobile'=>$this->security->xss_clean($this->input->post('mobile')),
			'contact_message'=>$this->security->xss_clean($this->input->post('message')),
			'contact_applydate'=>date('Y-m-d H:i:s')
			);
		$this->db->insert('contact', $field);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function addEnq()
	{
		$field = array(
			'contact_name'=>$this->security->xss_clean($this->input->post('fname')."	".$this->input->post('lname')),
			'contact_email'=>$this->security->xss_clean($this->input->post('email')),
			'contact_mobile'=>$this->security->xss_clean($this->input->post('mobile')),
			'contact_message'=>$this->security->xss_clean($this->input->post('message')),
			'contact_prod_id'=>$this->security->xss_clean($this->input->post('prodid')),
			'contact_applydate'=>date('Y-m-d H:i:s')
			);
		$this->db->insert('prod_enq', $field);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function addride()
	{
		$field = array(
			'contact_name'=>$this->security->xss_clean($this->input->post('fname')),
			'contact_email'=>$this->security->xss_clean($this->input->post('email')),
			'contact_mobile'=>$this->security->xss_clean($this->input->post('mobile')),
			'contact_message'=>$this->security->xss_clean($this->input->post('message')),
			'contact_applydate'=>date('Y-m-d H:i:s')
			);
		$this->db->insert('ridenow', $field);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function get_social()
	{
		$this->db->from('social_media');
		$this->db->where('s_id ',1);
		$query = $this->db->get();
 
		return $query->row();
	}
	public function get_contact()
	{
		$this->db->from('contact_us');
		$this->db->where('conus_id ',1);
		$query = $this->db->get();
 
		return $query->row();
	}
	
	public function admin_detail()
	{
		$result = $this->db->order_by("admin_id", "desc")->get('admin');
		
		
		if($result->num_rows())
		{
			return $result->result_array();					
		}
		else
		{
			return FALSE;
		}
	}
}
?>