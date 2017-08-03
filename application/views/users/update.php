<html>
  <head>
      <title>ユーザーデータ変更</title>
  </head>
  <body>
    <?php echo validation_errors(); ?>
    <h1>ユーザーデータ変更</h1>
    <table border>
      <thead>
        <tr>
          <th>ID</th>
          <th>氏名</th>
          <th>メールアドレス</th>
          <th>登録日時</th>
          <th>更新日時</th>
        </tr>
      </thead>
      <tbody>
          <tr>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td><?php echo $user['created'] ?></td>
          <td><?php echo $user['modified'] ?></td>
        </tr>
      </tbody>
    </table>
    <?php echo form_open("user/update_submit/$user[id]"); ?>
    <p>名前：<input type="text" name="name" /><p>
    <p>メールアドレス：<input type="text" name="email" /><p>
    <p>パスワード：<input type="text" name="password" /><p>
    <input type ="submit" value="変更">
    </form>
  </body>
</html>