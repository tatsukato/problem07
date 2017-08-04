<html>
  <head>
      <title>社員情報登録</title>
  </head>
  <body>
   <?php echo validation_errors(); ?>
   <h1>社員情報登録</h1>
   <?php echo form_open('member/add_submit'); ?>
    <p>氏：<input type = "text" name = "first_name" /><p>
    <p>名：<input type = "text" name = "last_name" /><p>
    <p>生年月日：<input type = "text" name = "birthday" /><p>
    <p>出身地：<input type = "text" name = "home" /><p>
    <input type = "submit" value= "登録">
   </form>
  </body>
</html>