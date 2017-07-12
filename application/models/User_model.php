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
        
        //単純に true or false を返すために下記はコメントアウトしたのですが
        //必要なコードでしょうか？またどのような処理でしょうか？
        
        /*return $user;
        
        $res = $this->db->query($sql);

		while($data = $res->fetch_assoc()) {

                    var_dump( $data );
                }*/
        
                if($post['email'] == $user['passward']) {
                    return true;
                }

                else{
                    return false;
                }
        
    }
}
?>

