<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getdata()
    {
        $sql = "SELECT * FROM user WHERE id = ? ";

        return $this->db->query($sql,array())->row_array();
    }
    
    public function koushin($post)
    {
        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE users SET 
                   email = '$post[first_name]',
                   passward = '$post[last_name]',
                   name = '$post[age]',
                   modified = '$date'

                   WHERE id ='$id'";

        $this->db->query($sql);
    }
}