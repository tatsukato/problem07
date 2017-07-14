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
                    $_SESSION['is_login'] = true;
                }
                else{
                    $_SESSION['is_login'] = false;
                }
                
        redirect('member/index');
        
        
        //うまくいかない場合は、$_SESSIONの代わりにこれを使ってみて。
        //$this->session->set_userdata('is_login', TRUE);
        
        //セッションから取り出す
        //$this->session->userdata('is_login');
     
    }
}
?>