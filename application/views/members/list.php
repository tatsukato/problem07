<html>
  <head>
    <title>社員一覧画面</title>
  </head>
  <body>
    <h1>社員一覧画面</h1>
    <a href="http://localhost/problem07/member/add">新規登録</a>
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
          <td><a href="http://localhost/problem07/member/update/<?php echo $member['id'] ?>"><?php echo $member['first_name'] ?><?php echo $member['last_name'] ?></a></td>
          <td><?php echo $member['age'] ?></td>
          <td><?php echo $member['home'] ?></td>
          <td><a href ="http://localhost/problem07/member/delete/<?php echo $member['id'] ?>"onclick="return check()">削除</a></td>
          <td><?php echo $member['created'] ?>2</td>
          <td><?php echo $member['modified'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <script type="text/javascript">
        function check(){

	if(window.confirm('削除してよろしいですか？')){ // 確認ダイアログを表示
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止
	}

        }

    </script>
  </body>
</html>