<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getCommentById($id)
    {
        $sql = "SELECT * FROM comments WHERE member_id = ? ORDER BY created DESC";
               
        return $this->db->query($sql, array( $id ))->result_array();
    }
    
    public function getNameById($comment)
    {
        $sql = "SELECT * FROM users WHERE id = ? ";

        $user = $this->db->query($sql,array($comment['user_id']))->row_array();
        
        return $user['name'];
    }
    
    public function toukou($post, $member_id, $user_id)
    {   
        $sql = "INSERT INTO comments (
                 member_id, title, user_id, comment)
                VALUES ('{$member_id}', '{$post[title]}', '{$user_id}', '{$post[comment]}')";

        $this->db->query($sql);
    }
    
    public function sakujo($id)
    {
        $sql = "DELETE FROM comments WHERE member_id ='$id'";
        
        $this->db->query($sql);
    }
}

