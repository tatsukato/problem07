<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
        $users = $this->User_model->getUserList();

        $this->var['users'] = $users;

        $this->load->view('users/userlist', $this->var);
    }
    
    public function signup()
    {
	$this->load->view('users/signup');
    }
    
    public function signup_submit()
    {
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("name", "名前", "required|trim");
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim|is_unique[users.email]");
        $this->form_validation->set_rules("password", "パスワード", "required|trim");
        
        if ($this->form_validation->run())
        {
            $this->User_model->new_user($post);
        }
        else
        {
            redirect('user/signup');
        }
        
        
             
        $user = $this->User_model->getUserByEmail($post);

        $this->User_model->new_passward($post,$user);

        redirect('user/index');
    }
    
    public function update($id)
    {
        $this->var['id'] = $id;
                
        $this->load->view('users/update',$this->var);
    }
    
    public function update_submit($id)
    {
        $post = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_rules("name", "名前", "required|trim");
        //ここでis_unique[users.email]を設定するとメールアドレスは変更したくない時
        //elseになってしまうので省いています。ので同じアドレスを入力するとデータベース
        //の設定で更新はできないのですがエラーになってしまいます。
        //他にいい方法はありますでしょうか？
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim");
        $this->form_validation->set_rules("password", "パスワード", "required|trim");
        
        if ($this->form_validation->run())
        {
            $user = $this->User_model->getUserById($id);
        }
        else
        {
            //redirect('user/update');にリダイレクトさせるとURLの最後のidが
            //とれてしまってエラーが表示されるので.redirect('user/index')に
            //リダイレクトさせてます。
            //このままでいいのかそれともidを保持させる方法はありますでしょうか？
            redirect('user/index');
        }
        
        $this->User_model->koushin($post,$user,$id);

        redirect('user/index');
    }
    
     public function delete($id)
    {
        $this->User_model->sakujo($id);

        redirect('user/index');
    }
}