<?php
// db연결 준비
require "../util/dbconfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
  <?php
   $id = $_GET['id']; // 댓글
   $board_id = $_GET['board_id'];//원글 
  ?>
    <h3>댓글</h3>
    <form action="../board_comment/update_reply.php?id= <?=$id?> <?=$board_id?>" method="POST">
      <input hidden type="text" name="board_id" value="<?=$id?>"/><br>
      <label>작성자: </label><input type="text" name="nickname" /><br>
      <label>내용: </label><input type="text" name="comment" rows="4" cols="50" /><br>
  
      <input type=submit value="저장">
    </form>
  </form>
</body>
</html>