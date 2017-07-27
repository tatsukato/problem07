<html>
  <head>
    <title>ユーザー一覧画面</title>
  </head>
  <body>
    <h1>ユーザー一覧画面</h1>
    <a href="/user/signup">新規ユーザー登録</a>
    <table border>
      <thead>
        <tr>
          <th>ID</th>
          <th>氏名</th>
          <th>メールアドレス</th>
          <th>削除</th>
          <th>登録日時</th>
          <th>更新日時</th>
        </tr>
      </thead>
      <tbody>
        <?php // foreach ($prefs as $key => $val) : ?>
        <?php foreach ($users as $user) : ?>
        <tr>
          <!--こんな風に展開します-->
          <td><?php echo $user['id'] ?></td>
          <td><a href="/user/update/<?php echo $user['id'] ?>"><?php echo $user['name'] ?></a></td>
          <td><?php echo $user['email'] ?></td>
          <td><a href ="/user/delete/<?php echo $user['id'] ?>"onclick="return check()">削除</a></td>
          <td><?php echo $user['created'] ?></td>
          <td><?php echo $user['modified'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <script type="text/javascript">
        function check(){

	if(window.confirm('削除してよろしいですか？')){ 
		return true; 
	}
	else{ 
		window.alert('キャンセルされました');
		return false; 
	}

        }

    </script>
     <a href="/member/index">トップ</a>
  </body>
</html>