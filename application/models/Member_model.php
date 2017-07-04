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
    
    public function touroku(){

        $sql = "INSERT INTO members (
                 first_name,last_name,age,home)
                VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[age]','$_POST[add]')";

        $res = $this->db->query($sql);

	}

}

?>
