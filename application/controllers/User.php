<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    
    protected $var = [];
    
    public function login()
    {  
        $this->load->view('users/login');
    }
    
    public function login_submit()
    {
        $post = $_POST;

        $_SESSION['is_login'] = $this->User_model->can_login($post);
        
        //if
        //index()メソッドを呼ぶ
        
    }
}
?>