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
                name,email)
                VALUES ('$post[name]','$post[email]')";

        $this->db->query($sql);
    }   
    
    public function new_passward($post,$deta)
    {
        $hash = sha1('$post[passward]'.'$deta[created]');

        $sql = "UPDATE users SET 
                passward = '$hash'
        
                WHERE id ='$deta[id]'";

        $this->db->query($sql);
    }   
}