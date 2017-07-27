<html>
  <head>
      <title>ユーザーデータ変更</title>
  </head>
  <body>
      <?php echo validation_errors(); ?>
      <h1>ユーザーデータ変更</h1>
   <form method="post" action="/user/update_submit/<?php echo $id ?>">
    <p>名前：<input type="text" name="name" /><p>
    <p>メールアドレス：<input type="text" name="email" /><p>
    <p>パスワード：<input type="text" name="password" /><p>
    <input type ="submit" value="変更">
   </form>
  </body>
</html>