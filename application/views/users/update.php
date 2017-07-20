<html>
  <head>
      <title>ユーザーデータ変更</title>
  </head>
  <body>
      <h1>ユーザーデータ変更</h1>
   <form method="post" action="http://localhost/problem07/mypage/update_submit/<?php echo $this->session->userdata('id') ?>">
    <p>名前：<input type="text" name="name" /><p>
    <p>メールアドレス：<input type="text" name="email" /><p>
    <p>パスワード：<input type="text" name="passward" /><p>
    <input type ="submit" value="変更">
   </form>
  </body>
</html>