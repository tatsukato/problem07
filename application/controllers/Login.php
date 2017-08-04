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
        
        $hash = sha1($post['password'].$user['created']);

        if($hash == $user['password'])
        {
            $this->session->set_userdata('user_id', $user[id]);
        }
         
        redirect('member/index');
    }
    
    public function logout()
    {
	$this->session->sess_destroy();

	redirect('login/index');
    }
}
        
