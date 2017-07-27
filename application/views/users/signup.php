<html>
  <head>
      <title>新規ユーザー登録</title>
  </head>
  <body>
    <?php echo validation_errors(); ?>
    <?php echo form_open('user/signup_submit'); ?>
    <h1>新規ユーザー登録</h1>
   <form method="post" action="/user/signup_submit">
    <p>名前：<input type="text" name="name" /><p>
    <p>メールアドレス：<input type="text" name="email" /><p>
    <p>パスワード：<input type="text" name="password" /><p>
    <input type ="submit" value="登録">
   </form>
  </body>
</html>