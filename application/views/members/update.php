<html>
  <head>
      <title>社員情報更新</title>
  </head>
  <body>
      <h1>社員情報更新</h1>
   <form method="post" action="http://localhost/problem07/member/update_submit/<?php echo $id ?>">
    <p>氏：<input type="text" name="first_name" /><p>
    <p>名：<input type="text" name="last_name" /><p>
    <p>年齢：<input type="text" name="age" /><p>
    <p>出身地：<input type="text" name="home" /><p>
    <input type ="submit" value="更新">
   </form>
  </body>
</html>