<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mypage_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getdeta()
    {
        $sql = "SELECT * FROM users WHERE id = ? ";

        return $this->db->query($sql,array($this->session->userdata('id')))->row_array();
    }
 
    public function koushin($post,$user,$id)
    {
        $date = date('Y-m-d H:i:s');

        $hash = sha1('$post[passward].$user[created]');

        $sql = "UPDATE users SET 
                   name = '$post[name]',
                   email = '$post[email]',
                   passward = '$hash',

                   modified = '$date'

                   WHERE id ='$id'";

        $this->db->query($sql);
    }
}