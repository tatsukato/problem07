<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function can_login($post)
    {   
        $sql = "SELECT * FROM users WHERE email = $post[email]";
        
        $res = $this->db_conn->query($sql);

		while($data = $res->fetch_assoc()) {

		var_dump( $data );
                }
                
    }
}
?>

