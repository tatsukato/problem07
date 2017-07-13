<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    protected $var = [];
    
    public function __construct()
    {
        //親クラスにもコンストラクタが有る場合（CI_Controller）それも呼び出す
        parent::__construct();
        
        //ここで$_SESSION['is_login']に入れられた値はブラウザを
        //閉じるまで保持されるので毎回ログイン前に初期化するように
        //するべきでしょうか？（autoroad.phpで初期化されている？）
        
        if($_SESSION['is_login'] == false){
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
