<html>
  <head>
    <title>コメント一覧画面</title>
  </head>
  <body>
    <h1>コメント一覧画面</h1>
    <a href="/comment/post/">新規登録</a>
    <table border>
      <thead>
        <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th>投稿者</th>
          <th>コメント</th>
          <th>登録日時</th>
          <th>更新日時</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($comments as $comment) : ?>
        <tr>
          <td><?php echo $comment['id'] ?></td>
          <td><?php echo $comment['title'] ?></td>
          <td><?php echo $comment['user_name'] ?></td>
          <td><?php echo $comment['comment'] ?></td>
          <td><?php echo $comment['created'] ?></td>
          <td><?php echo $comment['modified'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="/comment/index/">戻る</a>
   </body>
 </html>