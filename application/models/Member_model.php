<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 全レコードを取得する
     * @return array
     */
    public function getList()
    {
        $sql = "SELECT * FROM members";

        return $this->db->query($sql)->result_array();
    }

    /**
     * IDでレコードを１つ取得する
     * @param type $id
     * @return array
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM members WHERE id = ?";
        
        return $this->db->query($sql, array($id))->row_array();
    }
    
    public function touroku($post){

        $sql = "INSERT INTO members (
                 first_name,last_name,age,home)
                VALUES ('$post[first_name]','$post[last_name]','$post[age]','$post[home]')";

        $res = $this->db->query($sql);

    }
    
    public function koushin($post)
    {

        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE members SET 
                   first_name = '$post[first_name]',
                   last_name = '$post[last_name]',
                   age = '$post[age]',
                   home = '$post[home]',
                   modified = '$date'
                       
                   WHERE id =  ";

        $res = $this->db->query($sql);

    }
    
    public function sakujo($post)
    {
        
        $sql = "DELETE FROM members WHERE id = ";

        $res = $this->db->query($sql);
        
    }

}

?>
