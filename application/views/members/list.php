<html>
  <head>
    <title>社員一覧画面</title>
  </head>
  <body>
    <h1>社員一覧画面</h1>
    <a href="add">新規登録</a>
    <table border>
      <thead>
        <tr>
          <th>ID</th>
          <th>氏名</th>
          <th>年齢</th>
          <th>出身</th>
          <th>削除</th>
          <th>登録日時</th>
          <th>更新日時</th>
        </tr>
      </thead>
      <tbody>
        <?php // foreach ($prefs as $key => $val) : ?>
        <?php foreach ($members as $member) : ?>
        <tr>
          <!--こんな風に展開します-->
          <td><?php echo $member['id'] ?></td>
          <td>加藤竜彦</td>
          <td>41</td>
          <td>神奈川</td>
          <td><a href="update">削除</a></td>
          <td>17/01/03 10:12</td>
          <td>17/01/03 10:12</td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>