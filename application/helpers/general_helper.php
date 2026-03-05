<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getSeoData($url_data, $cityname)
	{ 
	  $obj  =& get_instance();

    if ($url_data == "") {
        $url_data = "home";
    }
    if ($cityname == "") {
        $cityname = "nagpur";
    }

    // echo "select * from pf_seo where seo_url ='$url_data' and seo_city='".$cityname."'";
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
    
    function sendMail($to,$subject,$message,$from_email='no_reply@sarwadnyaplay.com',$from_name='Sarwadnya Play')
    {
        $CI =& get_instance();
    
        $CI->load->library('email');
    
        $CI->email->from($from_email,$from_name);
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);
    
        if($CI->email->send())
        {
            return TRUE;
        }
        else
        {
            return $CI->email->print_debugger();
        }
    }
?>
