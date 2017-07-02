<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    protected $var = [];

    /**
     * 社員一覧画面
     */
    public function index()
    {   
        $members = $this->Member_model->getList();
        
        $this->var['members'] = $members;
        
        $this->load->view('members/list', $this->var);
    }

}
