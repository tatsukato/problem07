<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller
{
    protected $var = [];
    
    public function __construct()
    {
        parent::__construct();
        
        if(empty($this->session->userdata('user_id')))
        {
            redirect('login/index');            
        }
    }

    public function index($id)
    {
        $this->session->set_userdata('member_id', $id);
        
        if (empty($this->session->userdata('member_id')))
        {
            redirect('member/index');
        }
        
        $comments = $this->Comment_model->getCommentById($id);
        
        $commnts_with_name = [];
        foreach($comments as $comment)
        {            
            $comment['user_name'] = $this->Comment_model->getNameById($comment);
                   
            $commnts_with_name[] = $comment;
        }
        
        $this->var['comments'] = $commnts_with_name;
        
        $this->load->view('comments/commentlist', $this->var);
    }
    
    public function post()
    {   
        $this->load->view('comments/post');
    }
    
     public function post_submit()
    {   
        $post = $this->security->xss_clean($_POST);
        
        $member_id = $this->session->userdata('member_id');
        
        $user_id = $this->session->userdata('user_id'); 

        $this->form_validation->set_rules("title", "タイトル", "required|trim");
        $this->form_validation->set_rules("comment", "名コメント", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->Comment_model->toukou($post,$member_id,$user_id);
        }
        else
        {
            redirect('comment/post');
        }
        
        redirect("comment/index/{$member_id}");
    }
}