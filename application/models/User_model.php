<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function new_user($post)
    {
        $sql = "INSERT INTO users (
                name,email)
                VALUES ('$post[name]','$post[email]')";

        $this->db->query($sql);
    }   
    
    public function new_passward($post,$user)
    {
        $hash = sha1($post[password].$user[created]);

        $sql = "UPDATE users SET 
                password = '$hash'
        
                WHERE id ='$user[id]'";

        $this->db->query($sql);
    }
    
    public function getUserList()
    {
        $sql = "SELECT * FROM users ORDER BY created DESC";

        return $this->db->query($sql)->result_array();
    }
    
    public function getUserByEmail($post)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
               
        $user = $this->db->query($sql, array($post['email']))->row_array();
         
        return $user;
    }
    
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ? ";

        return $this->db->query($sql,array($id))->row_array();
    }
    
    public function koushin($post,$user,$id)
    {
        $date = date('Y-m-d H:i:s');

        $hash = sha1($post[password].$user[created]);

        $sql = "UPDATE users SET 
                   name = '$post[name]',
                   email = '$post[email]',
                   password = '$hash',

                   modified = '$date'

                   WHERE id ='$id'";

        $this->db->query($sql);
    }
    
    public function sakujo($id)
    {
        $sql = "DELETE FROM users WHERE id ='$id'";

        $this->db->query($sql);
    }
}