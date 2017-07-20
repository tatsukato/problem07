<html>
  <head>
    <title>マイページ</title>
  </head>
  <body>
    <h1>マイページ</h1>
    <a href="http://localhost/problem07/mypage/update">ユーザーデータ変更</a>/<a href="http://localhost/problem07/member/index">トップ</a>
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
          <td><?php echo $user['created'] ?>2</td>
          <td><?php echo $user['modified'] ?></td>
        </tr>
      </tbody>
    </table>
  </body>
 
</html>