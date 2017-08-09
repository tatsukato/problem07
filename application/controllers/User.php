<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
    
    public function index()
    {   
        $users = $this->User_model->getUserList();

        $this->var['users'] = $users;

        $this->load->view('users/userlist', $this->var);
    }
    
    public function signup()
    {
	$this->load->view('users/signup');
    }
    
    public function signup_submit()
    {
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("name", "名前", "required|trim");
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim|is_unique[users.email]|valid_email");
        $this->form_validation->set_rules("password", "パスワード", "required|trim|min_length[8]|max_length[16]|regex_match[/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}+\z/]");
        $this->form_validation->set_rules("password_check", "パスワード確認", "required|trim|matches[password]");
        
        if ($this->form_validation->run())
        {
            $this->User_model->new_user($post);
            
            $user = $this->User_model->getUserByEmail($post);
            
            $this->User_model->new_passward($post,$user);
             
            redirect('user/index');
        }
        else
        {
            $this->load->view('users/signup');
        }
    }
    
    public function update($id)
    {           
        $user = $this->User_model->getUserById($id);
        
        if (empty($user))
        {
            redirect('login/index');
        }

        $this->var['user'] = $user;

        $this->load->view('users/update', $this->var);
    }
    
    public function update_submit($id)
    {
        $id_check = is_numeric($id);
        if ($id_check == false)
        {
            redirect('login/index');
        }
        
        $post = $this->security->xss_clean($_POST);
        
        $user = $this->User_model->getUserById($id);        

        if ($post['email'] == $user['email'])
        {
            $this->form_validation->set_rules("email", "メールアドレス", "required|trim|valid_email");
        }
        else
        {
            $this->form_validation->set_rules("email", "メールアドレス", "required|trim|is_unique[users.email]|valid_email");
        }
        
        $this->form_validation->set_rules("name", "名前", "required|trim");    
        $this->form_validation->set_rules("password", "パスワード", "required|trim|min_length[8]|max_length[16]|regex_match[/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}+\z/]");
        $this->form_validation->set_rules("password_check", "パスワード確認", "required|trim|matches[password]");
        
        if ($this->form_validation->run())
        {
            $this->User_model->koushin($post,$user,$id);
            
            redirect('user/index');
        }
        else
        {
            $user = $this->User_model->getUserById($id);

            $this->var['user'] = $user;

            $this->load->view('users/update', $this->var);
        }
    }
    
     public function delete($id)
    {
        $this->User_model->sakujo($id);

        redirect('user/index');
    }
}