<html>
  <head>
      <title>コメント投稿</title>
  </head>
  <body>
   <h1>コメント投稿</h1>
   <?php echo form_open('comment/post_submit'); ?>
    <p>タイトル：<input type="text" name="title" /><p>
    <p>コメント：<input type="text" name="comment" /><p>
    <input type ="submit" value="投稿">
   </form>
  </body>
</html>