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
        $sql = "SELECT * FROM users WHERE email = ?";
                
        $user = $this->db->query($sql, array($post['email']))->row_array();
        
        return $user;
    }
    
    public function new_member($post)
    {
        $sql = "INSERT INTO users (
                 name,email,passward)
                VALUES ('$post[name]','$post[email]','$post[passward]')";

        $this->db->query($sql);
    }   
}