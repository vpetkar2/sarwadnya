<?php
class Site_blog_model extends CI_Model
{
	public function get_blogs($select)
	{
		$this->db->select($select);
		$this->db->from('blog');
		$this->db->where('b_status', 'active');
		$this->db->order_by('b_id','DESC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	
	public function get_blogs_home($select)
	{
		$this->db->select($select);
		$this->db->from('blog');
		$this->db->where('b_status', 'active');
		$this->db->order_by('b_id','DESC');
		$this->db->limit('6');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	
	public function get_blogs_by_filter($cat_id)
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('b_status', 'active');
		$this->db->like('cat_id', $cat_id);
		$this->db->order_by('b_id', 'DESC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	
	public function get_blog_details_by_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
 
		return $query->row_array();
	}
	
	public function get_blog_comments_by_id($b_id)
	{
		$this->db->select('*');
		$this->db->from('blog_comment');
		$this->db->where('b_id', $b_id);
		$this->db->where('bcom_status', 'active');
		$this->db->order_by('bcom_id', 'DESC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
}
?>