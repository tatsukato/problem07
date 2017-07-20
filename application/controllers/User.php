<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function login()
    {
        $this->load->view('users/login');
    }
    
    public function login_submit()
    {
        $post = $_POST;

        $deta = $this->User_model->can_login($post);

        $hash = sha1("'$post[passward]'.'$deta[created]'");
        
               if($hash == $deta['passward']) {
                    $this->session->set_userdata('islogin', TRUE);
                    $this->session->set_userdata('id', $deta['id']);
                }
                else{
                    $this->session->set_userdata('islogin', FALSE);
                }
                
        redirect('member/index');
    }
    
    public function signup()
    {
	$this->load->view('signup');
    }
    
    public function signup_submit()
    {
	$post = $_POST;

        $this->User_model->new_member($post);
        
        $deta = $this->User_model->can_login($post);
 
        $this->User_model->new_passward($post,$deta);
        
        redirect('user/login');
    }
    
    public function mypage()
    {
	$this->load->view('user/mypage');
    }
}