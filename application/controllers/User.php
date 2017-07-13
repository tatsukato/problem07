<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{   
    public function __construct()
    {
        parent::__construct();
                
    }
    
    public function login()
    {  
        $this->load->view('users/login');
    }
    
    public function login_submit()
    {
        $post = $_POST;
        
        $deta = $this->User_model->can_login($post);
        
                if($post['passward'] == $deta['passward']) {
                    $_SESSION['is_login'] = true;                    
                }
                else{
                    $_SESSION['is_login'] = false;
                }
                //var_dump($_SESSION['is_login']);exit;
        redirect('member/index');
        
        //ここで$_SESSION['is_login']に入れた情報はMenber.phpでは
        //保持されないのでしょうか？
     
    }
}
?>