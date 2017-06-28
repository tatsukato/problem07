<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    protected $var = [];

    public function index()
    {
//        echo "pass";exit;
        
        $members = $this->Member_model->getList();
        
        $this->var['members'] = $members;
        $this->var['title'] = "テスト";
        
        $this->load->view('members/list', $this->var);
    }

}
