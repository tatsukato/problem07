<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    protected $var = [];

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
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("first_name", "氏", "required|trim");
        $this->form_validation->set_rules("last_name", "名", "required|trim");
        $this->form_validation->set_rules("birthday", "生年月日", "required|trim");
        $this->form_validation->set_rules("home", "出身地", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->Member_model->touroku($post);
        }
        else
        {
            redirect('member/add');
        }
        
        redirect('member/index');
    }

    public function update($id)
    {
        $member = $this->Member_model->getById($id);
        
        $this->var['member'] = $member;

        $this->load->view('members/update',$this->var);
    }

    public function update_submit($id)
    {   
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("first_name", "氏", "required|trim");
        $this->form_validation->set_rules("last_name", "名", "required|trim");
        $this->form_validation->set_rules("birthday", "生年月日", "required|trim");
        $this->form_validation->set_rules("home", "出身地", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->Member_model->koushin($post,$id);
        }
        else
        {
            redirect('member/index');
        }

        redirect('member/index');
    }

    public function delete($id)
    {
        $this->Member_model->sakujo($id);

        redirect('member/index');
    }
}