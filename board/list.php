<?php

require "../util/dbconfig.php";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :" . $conn->connect_error);
} else {
  if (DBG) echo outmsg(DBCONN_SUCCESS);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>

<body>

  <h1>게시판</h1>
  <br><br>
  <?php
  $sql = "SELECT * FROM board";
  $resultset = $conn->query($sql);

  if ($resultset->num_rows > 0) {

    echo "<table><tr><th>id</th><th>제목</th></tr>";

    while ($row = $resultset->fetch_assoc()) {

      echo "<tr><td>" . $row['id'] . "</td><td>" . $row['title'] . "</td><td><a href='detailview.php?id=" . $row['id'] . "'>내용확인</a></tr>";
    }
    echo "</table>";
  }

  ?>
  <div class="box1">
    <a href="registform.html">new</a>
  </div>
  <div class="box2">
  <a href="../index.php">메인으로</a>
  </div>
</body>

</html>