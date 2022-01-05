<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];
}
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
  <br><br><br><br>
  <div class="box2">
  <a href="../index.php">메인으로</a>
  </div>
  <?php
  $sql = "SELECT * FROM board";
  $resultset = $conn->query($sql);
  if ($resultset->num_rows > 0) {
    echo "<table><tr><th>번호</th><th>작성자</th><th>제목</th><th>등록일</th></tr>";
    while ($row = $resultset->fetch_assoc()) {
      echo "<tr><td>" . $row['id'] . "</td><td>" . $row['users'] . "</td><td><a href='detailview.php?id=" . $row['id'] . "'>" . $row['title'] . "</a><td>" . $row['regtime'] .
      "</td></tr>";
    }
    echo "</table>";
  }

  ?>
  <div class="box1">
    <a href="registform.html">new</a>
  </div>
 
</body>

</html>