<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getSeoData($url_data, $cityname)
	{ 
	  $obj  =& get_instance();

	  $q    = $obj->db->query("select * from pf_seo where seo_url ='$url_data' and seo_city='".$cityname."'");
	  $data = $q->result();
	  
	  if(empty($data[0]))
		{
			return FALSE;
		}
		else 
		{
			return $data[0];
		}
	  
    }

    /*function getSeoData($url_data)
	{ 
	  $obj  =& get_instance();
	  
	  $cityid = $obj->session->userdata('cityId');
	  $obj->db->select('*');
	  $obj->db->from('city');
      $obj->db->where('id', $cityid);
      $querys = $obj->db->get();
      $citydata = $querys->result_array();

        $city = '';
        if (@$citydata[0]) {
            $city = $citydata[0]['name'];
        }

	  $q    = $obj->db->query("select * from pf_seo where seo_url ='$url_data' and seo_city='".$city."'");
	  $data = $q->result();
	  
	  if(empty($data[0]))
		{
			return FALSE;
		}
		else 
		{
			return $data[0];
		}
	  
    }*/
    
    function getSeoDataProd($url_data)
    {   
        $obj  =& get_instance();
    	$q    = $obj->db->query("SELECT pf_product.*, pf_product_image.prod_image, pf_product_image.prod_id
                                        FROM pf_product
                                        LEFT JOIN pf_product_image 
                                        ON pf_product.prod_id = pf_product_image.prod_id
                                        where pf_product.prod_url ='$url_data'");
        $data = $q->result();
        
        if(empty($data[0]))
		{
			return FALSE;
		}
		else 
		{
			return $data[0];
		}
    }
?>