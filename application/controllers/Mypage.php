<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller
{
    protected $var = [];
    
    public function index()
    {   
        $date = $this->Mtpage_model->getdata();
        
        $this->var['date'] = $date;

        $this->load->view('users/mypage',$this->var);
    }
    
    public function update()
    {
        $this->load->view('users/update');
    }
    
    public function update_submit()
    {
        $post = $_POST;

        $this->Member_model->koushin($post);

        redirect('mypage/index');
    }
}