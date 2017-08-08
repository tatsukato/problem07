<html>
  <head>
    <title>社員一覧画面</title>
  </head>
  <body>
    <h1>社員一覧画面</h1>
    <a href="/member/add">新規登録</a>
    <table border>
      <thead>
        <tr>
          <th>ID</th>
          <th>氏名</th>
          <th>出身</th>
          <th>コメント</th>
          <th>削除</th>
          <th>登録日時</th>
          <th>更新日時</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($members as $member) : ?>
        <tr>
          <td><?php echo $member['id'] ?></td>
          <td><a href="/member/update/<?php echo $member['id'] ?>"><?php echo $member['first_name'] ?><?php echo $member['last_name'] ?>(<?php echo $member['age'] ?>)</a></td>
          <td><?php echo $member['home'] ?></td>
          <td><a href ="/comment/index/<?php echo $member['id'] ?>">一覧</a></td>
          <td><a href ="/member/delete/<?php echo $member['id'] ?>"onclick="return check()">削除</a></td>
          <td><?php echo $member['created'] ?></td>
          <td><?php echo $member['modified'] ?></td>
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
     <a href="/user/index">ユーザー一覧</a>/<a href="/login/logout">ログアウト</a>
  </body>
 
</html>