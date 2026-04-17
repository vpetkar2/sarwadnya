<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getSeoData($url_data, $cityname)
	{ 
	    $obj  =& get_instance();

        if ($url_data == "" ||  $url_data == "blog" ||  $url_data == "about-us" ||  $url_data == "career" ||  $url_data == "contact-us") {
            switch($url_data) {
                case "":
                    $meta_id = 1;
                    break;
                case "about-us":
                    $meta_id = 3;
                    break;
                case "blog":
                    $meta_id = 4;
                    break;
                case "career":
                    $meta_id = 5;
                    break;
                case "contact-us":
                    $meta_id = 6;
                    break;
            }
            // $q    = $obj->db->query("select * from pf_meta where meta_id ='$meta_id'");
            $q = $obj->db->get_where('pf_meta', ['meta_id' => $meta_id]);
            $res = $q->result();
            $row = $res[0]; // existing stdClass object
    
            $data = new stdClass();
            
            $data->id = $row->meta_id;
            $data->seo_title = $row->meta_title;
            $data->metaTitle = $row->meta_title;
            $data->slug = $row->slug;
            $data->seo_key = $row->meta_keywords;
            $data->seo_desc = $row->meta_desc;
            $data->seo_image = "https://sarwadnyaplay.com/assets/newsite/images/logo/icon.png";
            $data->seo_url = $url_data;
            // print_r($data);
            return $data;
    
        } else {
            $q    = $obj->db->query("select * from pf_seo where seo_url ='$url_data' and seo_city='".$cityname."'");
            $data = $q->result();
            // print_r($data[0]);
            if(empty($data[0]))
    		{
    			return FALSE;
    		}
    		else 
    		{
    			return $data[0];
    		}
        }
	  
	  
    }

    function getSeoDataProd($url_data)
    {   
        $obj  =& get_instance();
        // echo "SELECT pf_product.*, pf_product_image.prod_image, pf_product_image.prod_id
        //                                 FROM pf_product
        //                                 LEFT JOIN pf_product_image 
        //                                 ON pf_product.prod_id = pf_product_image.prod_id
        //                                 where pf_product.prod_url ='$url_data'";
        //                                 exit;
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
    
    // function getFooter() {
    //     $CI =& get_instance();

    //     $q = $CI->db->get('pf_social'); // your table name
    //     $social = $q->row();
    //     return $social;
    // }
    
    function getFooter() {
        $CI =& get_instance();
        $q = $CI->db->get('pf_social');
    
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return null;
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
