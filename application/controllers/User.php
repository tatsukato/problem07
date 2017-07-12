<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    protected $var = [];
    
    public function login()
    {  
        $this->load->view('users/login');
    }
    
    public function login_submit()
    {
        $post = $_POST;
        
        $_SESSION['is_login'] = $this->User_model->can_login($post);
        
        //そもそもですが、User_modelからは、メールアドレスに紐づくレコードを取得するだけです。
        //コントローラで、パスワードが一致しているか確認してください。
        //一致していたら、セッションにtrueを入れます。
        
        //$_SESSION['is_login']に ture or false を入れたあと
        //ここで Menber.php の index() を呼び出して一覧画面を
        //表示させるのでしょうか？
        
        // リダイレクトをしましょう。
        // コントローラから別のコントローラを呼ぶ事はしません。
        // リダイレクトを覚えましょう。
    }
}
?>