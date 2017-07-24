<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('logins/login');
    }
    
    public function login_submit()
    {
        $post = $_POST;
        
        $user = $this->User_model->getUserByEmail($post);
        
        $hash = sha1($post[passward].$user[created]);

        if($hash == $user['passward'])
        {
            $this->session->set_userdata('is_login', TRUE);
        }
        else
        {
            $this->session->set_userdata('is_login', FALSE);
        }
         
        redirect('member/index');
    }
    
    public function logout()
    {
	$this->session->sess_destroy();

	redirect('login/index');
    }
}
        
