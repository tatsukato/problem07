<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
   
    public function can_login($post){	

            $this->db->where("email", $this->input->post("email"));	
            $this->db->where("password",$this->input->post("password"));
            $query = $this->db->get("users");

            if($query->num_rows() == 1){	
                    return true;
            }else{					
                    return false;
            }
    }

        
    
}    
?>

