<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function login()
    {
        $this->load->view('users/login');
    }
    
    public function login_submit()
    {
        $post = $_POST;
        
        //意味のあるネーミングをメソッドに付けましょう。
        //can_login()は引数にメールアドレスを取って、userテーブルから該当するメールアドレスを
        //引っ張ってくる機能を持ちます。ログインに特化した機能では無いはずです。
        //getUserByEmail()
        //という名前にしましょう。
        //そして、引数はメールアドレスを取りましょう。
        //返り値は、$dataでもいいのですが、ITはdataを扱う業種なので、いわばすべてデータです。
        //非常にわかりづらいので、$user にしましょう。ユーザレコードが配列で帰ってくるのだから
        //それが自然です。
        $deta = $this->User_model->can_login($post);
        
        
        //ここは普通に
        //$hash = sha1($post[passward] . $deta[created]);
        //でいいと思います。ダブルクオテーションとシングルクォーテーションをいつ使うか勉強してください。
        //もしくはこういう書き方もできます。
        //$hash = sha1("{$post[passward]}{$deta[created]}");
        $hash = sha1("'$post[passward]'.'$deta[created]'");
                
                //インデントがおかしい
               if($hash == $deta['passward']) {
                   //idをセッションに入れるのであれば、isloginはいらないのではないか？
                   //ログインチェックはidの有無を確認すればいいのだから。
                    $this->session->set_userdata('islogin', TRUE);
                    $this->session->set_userdata('id', $deta['id']);
                }
                else{
                    $this->session->set_userdata('islogin', FALSE);
                }
                
        redirect('member/index');
    }
    
    public function signup()
    {
	$this->load->view('signup');
    }
    
    public function signup_submit()
    {
	$post = $_POST;

        $this->User_model->new_member($post);
        
        $deta = $this->User_model->can_login($post);
 
        $this->User_model->new_passward($post,$deta);
        
        redirect('user/login');
    }
    
    public function mypage()
    {
	$this->load->view('user/mypage');
    }
}