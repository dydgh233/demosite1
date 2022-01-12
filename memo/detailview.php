<!-- 
  파일명 : user_detailview.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  id를 GET방식으로 넘겨받아, 해당 id 레코드 정보를 검색,
  화면에 상세 정보를 뿌려준다.
-->
<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];

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

  $sql = "SELECT * FROM memo WHERE id = " . $id;
  $resultset = $conn->query($sql);

  if ($resultset->num_rows > 0) {
    echo "<table><tr><th>번호</th><th>작성자</th><th>제목</th><th>Regist Date</th><th>수정</th><th>삭제</th></tr>";

    $row = $resultset->fetch_assoc();
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['users'] . "</td><td>" . $row['title'] . "</td><td>" . $row['regtime'] .
     "</td><td><a href='update.php?id=" . $row['id'] . "'>수정</a></td><td><a href='deleteprocess.php?id=" . $row['id'] . "'>삭제</a></td></tr>";
    echo "</table>";
  }
  
 
    
  echo"내용<div class='box1'>".$row['contents']."</div>";
  
}
  ?>

  <br><br><br><br>
  
  <a href="./list.php">목록보기</a>
</body>

</html>