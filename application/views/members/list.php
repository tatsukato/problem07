<html>
  <head>
    <title></title>
  </head>
  <body>
    <?php foreach($members as $member): ?>
    
      <?php echo "{$member['id']} {$member['last_name']} {$member['first_name']} {$member['age']} {$member['home']}<br>" ?>
    
    <?php endforeach; ?>
  </body>
</html>