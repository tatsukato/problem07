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
        //SQL文だが、メールアドレスの部分は?にして、SQL文発行時に値をはめ込むことができる。
        $sql = "SELECT * FROM users WHERE email = ?";
        
        //SQL発行。
        // array($post['email'])
        // の部分は?の部分に当てはめる値。配列にしているのは、?が複数ある場合、配列のゼロ番目に一番最初の?が
        // 置き換わる仕組み。
        // ここで何をしているかというと、レコードを１つ取得し、連想配列にして返している。
        $user = $this->db->query($sql, array($post['email']))->row_array();
        
        return $user;
        
        $res = $this->db_conn->query($sql);

		while($data = $res->fetch_assoc()) {

		var_dump( $data );
                }
                
    }
}
?>

