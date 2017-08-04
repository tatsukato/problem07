<html>
  <head>
      <title>社員情報更新</title>
  </head>
  <body>
   <h1>社員情報更新</h1>
   <?php echo form_open("member/update_submit/$member[id]"); ?>
    <p>氏：<input type = "text" name = "first_name" value = "<?php echo $member['first_name'] ?>"/><p>
    <p>名：<input type = "text" name = "last_name" value = "<?php echo $member['last_name'] ?>"/><p>
    <p>生年月日：<input type = "text" name = "birthday" value = "<?php echo $member['birthday'] ?>"/><p>
    <p>出身地：<input type = "text" name = "home" value = "<?php echo $member['home'] ?>"/><p>
    <input type = "submit" value = "更新">
   </form>
  </body>
</html>