<?php
// db연결 준비
require "../util/dbconfig.php";
$upload_path = './uploadfiles/';
// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];


$id = $_GET['id'];

$sql = "SELECT * FROM board WHERE id = " . $id;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_array();
  $title = $row['title'];
  $contents = $row['contents'];
  $registdate = $row['regtime'];
  $uploadfile = $row['uploadfile'];
} else {
  echo outmsg(INVALID_USER);
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>사용자 정보 수정</h1>
  <form action="updateprocess.php" method="POST">
    <input type="hidden" value="<?= $id ?>" name="id" />
    <label>제목 : </label><input type="text" name="title" value="<?= $title ?>" required /><br>
    <label>내용 : </label><input type="text" name="contents" value="<?= $contents ?>" required /><br>
    <label>날짜 : </label><input type="text" name="registdate" value="<?= $registdate ?>" readonly /><br>
    <label>첨부파일</label><input type="file" name="uploadfile" value="<?= $uploadfile?>"/>
    <br>
    <input type=submit value="저장">
  </form>
  <a href="list.php">목록보기</a>
</body>

</html>