<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        $sql = "SELECT * FROM members ORDER BY created DESC";

        return $this->db->query($sql)->result_array();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM members WHERE id = ? ";

        return $this->db->query($sql,array($id))->row_array();
    }

    public function touroku($post)
    {
        $sql = "INSERT INTO members (
                 first_name,last_name,birthday,home)
                VALUES ('$post[first_name]','$post[last_name]','$post[birthday]','$post[home]')";

        $this->db->query($sql);
    }

    public function koushin($post,$id)
    {
        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE members SET 
                   first_name = '$post[first_name]',
                   last_name = '$post[last_name]',
                   birthday = '$post[birthday]',
                   home = '$post[home]',
                   modified = '$date'

                   WHERE id ='$id'";

        $this->db->query($sql);
    }

    public function sakujo($id)
    {
        $sql = "DELETE FROM members WHERE id ='$id'";

        $this->db->query($sql);
    }
}
