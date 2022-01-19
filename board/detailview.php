<?php
// db연결 준비
require "../util/dbconfig.php";

$upload_path = './uploadfiles/';
// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if ($chk_login) {
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
    <h1>게시판</h1>
    <br>
  <?php

  $id = $_GET['id'];
  $hit = $_GET['id'];
  $sql = "SELECT * FROM board WHERE id = " . $id;
  $resultset = $conn->query($sql);

  if ($resultset->num_rows > 0) {
    echo "<table><tr><th>번호</th><th>작성자</th><th>제목</th><th>Regist Date</th><th>수정</th><th>삭제</th><th>첨부파일</th></tr>";

    $row = $resultset->fetch_assoc();
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['users'] . "</td><td>" . $row['title'] . "</td><td>" . $row['regtime'] .
      "</td><td><a href='update.php?id=" . $row['id'] . "'>수정</a></td><td><a href='deleteprocess.php?id=" . $row['id'] . "'>삭제</a></td>
      <tb></tb></tr>";
    echo "</table>";
  }
  echo "내용<div class='box1'>" . $row['contents'] . "</div>";

  $sql = "UPDATE board SET hit=hit+1 WHERE id = " . $id;
  $conn->query($sql);
}
  ?>
  <img src='<?= $upload_path . $row['uploadfile'] ?>.' width='200px' height='auto'>
  <br><br><br><br>
  <a href="./list.php">목록보기</a>

  <h3>댓글</h3>
  <form action="../board_comment/insert_reply.php" method="POST">
    <input  type="hidden" name="board_id" value="<?=$id?>"/><br>
    <label>작성자: </label><input type="text" name="nickname" /><br>
    <label>내용: </label><input type="text" name="comment" rows="4" cols="50" /><br>

    <input type=submit value="저장">
  </form>
  <h3>댓글창</h3>
  <?php

  
  
  $sql = "SELECT * FROM board_comment WHERE board_id = " . $id;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table><tr><th>작성자</th><th>내용</th></tr>";

    while ($row = $result->fetch_assoc()){
    echo "<tr><td>" . $row['nickname'] . "</td><td>" . $row['comment'] . "</td></td>
    <td><a href='../board_comment/updateform_reply.php?id=" . $row['id'] . "&board_id=$id'>수정</a></td>
    <td><a href='../board_comment/delete_reply.php?id=" . $row['id'] ."&board_id=$id' >삭제</a></td><br></tr>";
    echo "</table>";}
  }
 
?>

  </body>

  </html>