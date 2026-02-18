<?php
class Site_product_model extends CI_Model
{
	var $cityId = 0;

	function __construct()
	{
		$this->cityId = $this->session->userdata('cityId') == '' ? 1 : $this->session->userdata('cityId');

		// echo "city id = ".$this->cityId;
	}

	public function getCityNameById()
	{
		$this->db->select('*');
		$this->db->from('city');
		$this->db->where('id', $this->cityId);
		$querys = $this->db->get();
		$citydata = $querys->result_array();
		return $citydata[0]['name'];
	}

	public function get_products($limit, $start, $sch_prod)
	{
		if ($sch_prod != '') {
			$this->db->select('*');
			$this->db->like('cat_title', $sch_prod);
			$this->db->from('category');
			$this->db->where('city_id', $this->cityId);
			$this->db->order_by('cat_id', 'ASC');
			$query = $this->db->get();
			$num = $query->num_rows();
			if ($query->num_rows() > 0) {

				$row = $query->result_array();
				$msg = "IN";
				foreach ($row as $rows) {
					$arr[] = $rows['cat_id'];

				}
				$imp = implode(',', $arr);
				$imps = "(" . $imp . ")";
				$this->db->select('*');
				$this->db->from('product');
				$where = "(prod_title LIKE " . "'%" . $sch_prod . "%'" . " OR prod_cat_id  IN (" . $imp . ")) and prod_city_id = " . $this->cityId;
				$this->db->where($where);
				$this->db->limit($limit, $start);
				$this->db->order_by('prod_id', 'ASC');
				$querys = $this->db->get();
				return $querys->result_array();
			} else {
				$this->db->select('*');
				$this->db->from('product');
				$this->db->like('prod_title', $sch_prod);
				$this->db->where('prod_city_id', $this->cityId);
				$this->db->limit($limit, $start);
				$this->db->order_by('prod_id', 'ASC');
				$querys = $this->db->get();
				return $querys->result_array();
			}
		} else {
			$this->db->select('*');
			$this->db->from('product');
			$this->db->limit($limit, $start);
			$this->db->where('prod_city_id', $this->cityId);
			$this->db->order_by('prod_id', 'ASC');
			$querys = $this->db->get();
			return $querys->result_array();
		}


	}
	public function get_products_cat($select, $limit, $start, $city = '')
	{

		if ($city != "") {
			$this->db->select('*');
			$this->db->from('city');
			$this->db->where('name', $city);
			$querys = $this->db->get();
			$citydata = $querys->result_array();
		}

		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('slug', $select);
		if ($city != "") {
			$this->db->where('city_id', $citydata[0]['id']);
		}
		$this->db->order_by('cat_id', 'ASC');
		$querys = $this->db->get();

		$cat = $querys->result_array();


		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_cat_id', $cat[0]['cat_id']);
		if ($city != "") {
			$this->db->where('prod_city_id', $citydata[0]['id']);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('prod_id', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}
	// public function get_products_cnt($sch_prod)
	// {
	// 	if($sch_prod!='')
	// 	{
	// 		$this->db->select('*');
	// 		$this->db->like('cat_title',$sch_prod);
	// 		$this->db->from('category');
	// 		$this->db->order_by('cat_id','ASC');
	// 		$query = $this->db->get();
	// 		$num = $query->num_rows();
	// 		if($query->num_rows() > 0 )
	// 		{

	// 			$row = $query->result_array();
	// 			$msg = "IN";
	// 			foreach($row as $rows)
	// 			{
	// 				$arr[] = $rows['cat_id'] ;

	// 			}
	// 			 $imp = implode(',',$arr);
	// 			 $imps = "(".$imp.")";
	// 			//echo $imp = $msg ." (".$imp.")";
	// 			//print_r($arr);
	// 			$this->db->select('*');
	// 			$this->db->from('product');
	// 			$where = "prod_title LIKE "."'%".$sch_prod."%'". " OR prod_cat_id  IN (".$imp.")";
	// 			$this->db->where($where);
	// 			$this->db->order_by('prod_id','ASC');
	// 			$querys = $this->db->get();
	// 			return $querys->num_rows();
	// 		}
	// 		else
	// 		{
	// 			$this->db->select('*');
	// 			$this->db->from('product');
	// 			$this->db->like('prod_title',$sch_prod);
	// 			$this->db->order_by('prod_id','ASC');
	// 			$querys = $this->db->get();
	// 			return $querys->num_rows();
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$this->db->select('*');
	// 		$this->db->from('product');
	// 		$this->db->order_by('prod_id','ASC');
	// 		$querys = $this->db->get();
	// 		return $querys->num_rows();
	// 	}

	// 	//return $query->result_array();
	// }

	public function get_products_cnt($sch_prod)
	{
		if ($sch_prod != '') {
			$this->db->select('*');
			$this->db->from('product');
			$this->db->where('prod_city_id', $this->cityId);   // 🔴 ADD THIS

			$this->db->group_start();
			$this->db->like('prod_title', $sch_prod);

			// Category match
			$cats = $this->db->select('cat_id')
				->from('category')
				->like('cat_title', $sch_prod)
				->where('city_id', $this->cityId)
				->get()
				->result_array();

			if (!empty($cats)) {
				$catIds = array_column($cats, 'cat_id');
				$this->db->or_where_in('prod_cat_id', $catIds);
			}

			$this->db->group_end();

			return $this->db->count_all_results();
		} else {
			$this->db->from('product');
			$this->db->where('prod_city_id', $this->cityId);   // 🔴 ADD THIS
			return $this->db->count_all_results();
		}
	}


	public function get_products_cat_cnt($select, $city)
	{

		if ($city != "") {
			$this->db->select('*');
			$this->db->from('city');
			$this->db->where('name', $city);
			$querys = $this->db->get();
			$citydata = $querys->result_array();
		}

		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('slug', $select);
		if ($city != "") {
			$this->db->where('city_id', $citydata[0]['id']);
		}
		$this->db->order_by('cat_id', 'ASC');
		$querys = $this->db->get();
		$cat = $querys->result_array();
		if (empty($cat)) {
			return 0;
		}
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_cat_id', $cat[0]['cat_id']);
		if ($city != "") {
			$this->db->where('prod_city_id', $citydata[0]['id']);
		}
		$this->db->order_by('prod_id', 'ASC');
		$query = $this->db->get();

		return $query->num_rows();
		//return $query->result_array();
	}

	public function get_category($select)
	{
		$this->db->select($select);
		$this->db->from('category');
		$this->db->where('cat_status', 'active');
		$this->db->where('city_id', $this->cityId);
		$this->db->order_by('cat_title', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}
	public function get_category_slug($select)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cat_status', 'active');
		$this->db->where('slug', $select);
		$this->db->order_by('cat_title', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}


	public function get_category_by_id($cat_id)
	{

		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cat_id', $cat_id);
		$this->db->order_by('cat_id', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_related_products($cat_id, $prod_id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_cat_id', $cat_id);
		$this->db->where('prod_id !=', $prod_id);
		$this->db->where('prod_city_id', $this->cityId);
		$this->db->limit(8);
		$this->db->order_by('prod_id', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_home_products($select)
	{
		$this->db->select($select);
		$this->db->from('product');
		$this->db->order_by('prod_id', 'DESC');
		$this->db->limit(6);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_products_by_id($prod_id)
	{

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_id', $prod_id);
		$this->db->order_by('prod_id', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_products_by_url($prod_id)
	{

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_url', $prod_id);
		$this->db->order_by('prod_id', 'ASC');
		$this->db->where('prod_city_id', $this->cityId);
		$query = $this->db->get();

		return $query->result_array();
	}
}
?>