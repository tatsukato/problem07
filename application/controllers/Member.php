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
        
        var_dump($this->var);
        exit;
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
        
        //PHP リダイレクト で単語を検索してみよう。
        //リダイレクトという概念を掴んでください。
        //Codeigniterにもredirect()という便利な関数が用意されている。
        redirect('member/index');
        
        //これはリダイレクトではなく、index()を呼び出している
        $this->index();
    }
    
    public function update()
    {          
        $this->load->view('members/update', $this->var);
    }
    
    public function update_submit()
    {          
        $members = $this->Member_model->koushin();
        
        $this->index();
    }
    
}
    $member = new Member();
    $member->index();
    
 ?>
