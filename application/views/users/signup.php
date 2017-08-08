<html>
  <head>
      <title>新規ユーザー登録</title>
  </head>
  <body>
    <?php echo validation_errors(); ?>
    <h1>新規ユーザー登録</h1>
    <?php echo form_open('user/signup_submit'); ?>
    <p>名前：<input type = "text" name = "name" /><p>
    <p>メールアドレス：<input type = "text" name = "email" /><p>
    <p>パスワード：<input type = "text" name = "password" /><p>
    <p>パスワード確認：<input type = "text" name = "password_check" /><p>
    <input type = "submit" value = "登録">
    <p><a href="/user/index">戻る</a></p>
   </form>
  </body>
</html>