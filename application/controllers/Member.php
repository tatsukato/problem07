<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
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
        $members = $this->Member_model->getList();

        $members_with_age = [];
        foreach($members as $member)
        {
            $member['age'] = floor((date('Ymd') - date('Ymd', strtotime($member['birthday']))) / 10000);

            $members_with_age[] = $member;
        }
        
        $this->var['members'] = $members_with_age;

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
        $this->form_validation->set_rules("birthday", "生年月日", "required|trim|regex_match[^\d{4}\-\d{2}\-\d{2}$]");
        $this->form_validation->set_rules("home", "出身地", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->Member_model->touroku($post);
            redirect('member/index');
        }
        else
        {
            $this->load->view('members/add');
        }
    }

    public function update($id)
    {
        $member = $this->Member_model->getById($id);

        if (empty($member))
        {
            redirect('login/index');
        }
        
        $member = $this->Member_model->getById($id);
        
        $this->var['member'] = $member;

        $this->load->view('members/update',$this->var);
    }

    public function update_submit($id)
    {
        $id_check = is_numeric($id);
        if ($id_check == false)
        {
            redirect('login/index');
        }
        
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("first_name", "氏", "required|trim");
        $this->form_validation->set_rules("last_name", "名", "required|trim");
        $this->form_validation->set_rules("birthday", "生年月日", "required|trim|regex_match[^\d{4}\-\d{2}\-\d{2}$]]");
        $this->form_validation->set_rules("home", "出身地", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->Member_model->koushin($post,$id);
            
            redirect('member/index');
        }
        else
        {
            $member = $this->Member_model->getById($id);
        
            $this->var['member'] = $member;

            $this->load->view('members/update',$this->var);
        }
    }

    public function delete($id)
    {
        $this->Member_model->sakujo($id);
        
        $this->Comment_model->sakujo($id);

        redirect('member/index');
    }
}