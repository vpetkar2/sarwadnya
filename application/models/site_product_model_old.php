<?php
class Site_product_model extends CI_Model
{
	public function get_products($limit, $start,$sch_prod)
	{
		
		$this->db->select('*');
		$this->db->from('product');
		if($sch_prod!='')
		{
			$this->db->like('prod_title',$sch_prod);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('prod_id','ASC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	public function get_products_cat($select,$limit, $start)
	{
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_cat_id', $select);
		$this->db->limit($limit, $start);
		$this->db->order_by('prod_id','ASC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	public function get_products_cnt($sch_prod)
	{
		
		$this->db->select('*');
		$this->db->from('product');
		if($sch_prod!='')
		{
			$this->db->like('prod_title',$sch_prod);
		}
		$this->db->order_by('prod_id','ASC');
		$query = $this->db->get();
		
		return$query->num_rows();
		//return $query->result_array();
	}
	public function get_products_cat_cnt($select)
	{
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_cat_id', $select);
			
		$this->db->order_by('prod_id','ASC');
		$query = $this->db->get();
		
		return$query->num_rows();
		//return $query->result_array();
	}
	
	public function get_category($select)
	{
		$this->db->select($select);
		$this->db->from('category');
		$this->db->where('cat_status', 'active');
		$this->db->order_by('cat_title','ASC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	
	public function get_category_by_id($cat_id)
	{
		
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cat_id', $cat_id);
		$this->db->order_by('cat_id','ASC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
	
	public function get_related_products($cat_id,$prod_id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_cat_id', $cat_id);
		$this->db->where('prod_id !=', $prod_id);
		$this->db->limit(8);
		$this->db->order_by('prod_id','ASC');
		$query = $this->db->get();
 
		return $query->result_array();
	}

	public function get_home_products($select)
	{
		$this->db->select($select);
		$this->db->from('product');
		$this->db->order_by('prod_id','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
 
		return $query->result_array();
	}

	public function get_products_by_id($prod_id)
	{
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_id', $prod_id);
		$this->db->order_by('prod_id','ASC');
		$query = $this->db->get();
 
		return $query->result_array();
	}
}
?>