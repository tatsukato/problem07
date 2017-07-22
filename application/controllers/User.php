<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    protected $var = [];
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {   
        $users = $this->User_model->getUserList();

        $this->var['users'] = $users;

        $this->load->view('users/userlist', $this->var);
    }
    
    public function signup()
    {
	$this->load->view('signup');
    }
    
    public function signup_submit()
    {
	$post = $_POST;

        $this->User_model->new_user($post);
             
        $user = $this->User_model->getUserByEmail($post);

        $this->User_model->new_passward($post,$user);

        redirect('user/index');
    }
    
    public function update($id)
    {
        $this->var['id'] = $id;
        
        $this->load->view('users/update',$this->var);
    }
    
    public function update_submit($id)
    {
        $post = $_POST;
        
        $user = $this->User_model->getUserById($id);

        $this->User_model->koushin($post,$user,$id);

        redirect('user/index');
    }
    
     public function delete($id)
    {
        $this->User_model->sakujo($id);

        redirect('user/index');
    }
}