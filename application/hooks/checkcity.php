<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class Checkcity extends CI_Controller {
    
    function check() {
        
        
        if($this->session->userdata('cityId')){
             // do something when exist
             
        }else{
            // do something when doesn't exist

            $arr = explode("/", $_SERVER['SCRIPT_URL']);
            
            if ($arr['1'] == 'india' || $arr['1'] == 'mumbai' || $arr['1'] == 'nagpur') {
                if ($arr['1'] == 'india') {
                    $this->session->set_userdata('cityId', 3);
                }
                if ($arr['1'] == 'mumbai') {
                    $this->session->set_userdata('cityId', 2);
                }
                if ($arr['1'] == 'nagpur') {
                    $this->session->set_userdata('cityId', 1);
                }
            } else {
                $this->session->set_userdata('cityId', 1);
                // header('location:'.$_SERVER['REDIRECT_SCRIPT_URI']);
            }
        }
        
        
    }
}
?>