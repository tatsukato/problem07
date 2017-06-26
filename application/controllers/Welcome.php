<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $member_list = $this->Member_model->getList();
        
        $this->load->view('members/list', $member_list);
    }

}
