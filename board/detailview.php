
<?php
require "../util/dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
  <h1>메모내용</h1>
  <br>
  <?php

  $id = $_GET['id'];

  $sql = "SELECT * FROM board WHERE id = " . $id;
  $resultset = $conn->query($sql);

  if ($resultset->num_rows > 0) {
    echo "<table><tr><th>번호</th><th>작성자</th><th>제목</th><th>Regist Date</th><th>수정</th><th>삭제</th></tr>";

    $row = $resultset->fetch_assoc();
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['users'] . "</td><td>" . $row['title'] . "</td><td>" . $row['regtime'] .
      "</td><td><a href='update.php?id=" . $row['id'] . "'>수정</a></td><td><a href='deleteprocess.php?id=" . $row['id'] . "'>삭제</a></td></tr>";
    echo "</table>";
  }
  echo "내용<div class='box1'>" . $row['contents'] . "</div>";
  ?>
  <br><br><br><br>
  <a href="./list.php">목록보기</a>
</body>

</html>