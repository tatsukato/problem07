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
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim");
        $this->form_validation->set_rules("password", "パスワード", "required|trim");
        
        if ($this->form_validation->run())
        {
            $user = $this->User_model->getUserByEmail($post);
        
            $hash = sha1($post['password'].$user['created']);

            if($hash == $user['password'])
            {
                $this->session->set_userdata('user_id', $user[id]);
                
                redirect('member/index');
            }
            
            else
            {
                $this->session->set_flashdata('login_error', true);
                $this->load->view('logins/login');
            }
        }
        else
        {
            $this->load->view('logins/login');
        }
    }
    
    public function logout()
    {
	$this->session->sess_destroy();

	redirect('login/index');
    }
}
        
