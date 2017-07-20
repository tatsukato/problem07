<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller
{
    protected $var = [];
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {   
        $user = $this->Mypage_model->getdeta();

        $this->var['user'] = $user;

        $this->load->view('users/mypage', $this->var);
    }
    
    public function update()
    {
        $this->load->view('users/update');
    }
    
    public function update_submit($id)
    {
        $post = $_POST;

        $user = $this->Mypage_model->getdeta();

        $this->Mypage_model->koushin($post,$user,$id);

        redirect('mypage/index');
    }
}