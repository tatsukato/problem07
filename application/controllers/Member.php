<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    protected $var = [];
    
    public function __construct()
    {
        
        parent::__construct();
        
        //User.phpで$_SESSION['is_login']に値を入れてもここではNULLになる
        //var_dump($_SESSION['is_login'] );exit;
        
        if($this->session->userdata('is_login') !=true){
            redirect('user/login');
        }
    }

    public function index()
    {   
        $members = $this->Member_model->getList();
        
        $this->var['members'] = $members;

        $this->load->view('members/list', $this->var);
    }
    
    public function add()
    {        
        $this->load->view('members/add', $this->var);
    }
    
    public function add_submit()
    {   
        $post = $_POST;

        $members = $this->Member_model->touroku($post);
        
        redirect('member/index');
        
    }
    
    public function update($id)
    {   

        $this->var['id'] = $id;
        
        $this->load->view('members/update',$this->var);
    }
    
    public function update_submit($id)
    {   
        $post = $_POST;
        
        $members = $this->Member_model->koushin($post,$id);
        
        redirect('member/index');
    }
    
    public function delete($id)
    {
        $members = $this->Member_model->sakujo($id);
        
        redirect('member/index');
    }
 
}

 ?>
