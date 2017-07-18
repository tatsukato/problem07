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
        
                if($post['passward'] == $deta['passward']) {
                    $this->session->set_userdata('islogin', TRUE);
                }
                else{
                    $this->session->set_userdata('islogin', FALSE);
                }
        
        redirect('member/index');
     
    }
}
?>