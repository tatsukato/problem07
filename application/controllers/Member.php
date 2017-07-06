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

        //membersというキーでviewに渡しているので、view内では。$membersという変数になります。
        $this->load->view('members/list', $this->var);
        
    }
    
    public function add()
    {        
        $this->load->view('members/add', $this->var);
    }
    
    public function add_submit()
    {   
        //コントローラ内でPOST値を受け取りましょう。
        $post = $_POST;
        //そして、引数としてモデルに渡します。
        $members = $this->Member_model->touroku($post);
        
        $this->load->helper('url');
        
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
        
        $this->load->helper('url');
        
        redirect('member/index');
    }
    
    public function delete()
    {
       
        $members = $this->Member_model->sakujo();
        
        $this->load->helper('url');
        
        redirect('member/index');
    }
    
}

 ?>
