<html>
  <head>
      <title>ログイン画面</title>
  </head>
  <body>
   <h1>ログイン画面</h1>
   <?php if($this->session->flashdata('login_error') == true): ?>
    IDまたはパスワードが一致しません
   <?php endif; ?>
   <?php echo validation_errors(); ?>
   <?php echo form_open('login/login_submit'); ?>
    <p>メールアドレス：<input type="text" name="email" /><p>
    <p>パスワード：<input type="text" name="password" /><p>
    <input type ="submit" value="ログイン">
   </form>
  </body>
</html>