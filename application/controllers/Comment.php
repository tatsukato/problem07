<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('is_login') !=true)
        {
            redirect('login/index');            
        }
    }
    
    public function index()
    {
        $this->load->view('comments/commentlist');
    }
    
    public function post()
    {        
        $this->load->view('comments/post', $this->var);
    }
    
     public function post_submit()
    {   
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("title", "タイトル", "required|trim");
        $this->form_validation->set_rules("comment", "名コメント", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->comment_model->touroku($post);
        }
        else
        {
            redirect('comment/post');
        }
        
        redirect('comment/index');
    }
}