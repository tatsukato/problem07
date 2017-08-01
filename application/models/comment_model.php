<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function touroku($post)
    {
        $sql = "INSERT INTO comments (
                 member_id,title,user_id,comment)
                VALUES ('','$post[title]','','$post[comment]]')";

        $this->db->query($sql);
    }
}

