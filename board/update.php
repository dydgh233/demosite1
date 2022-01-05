<?php

require '../util/dbconfig.php';


$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);


if ($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :" . $conn->connect_error);
} else {
  if (DBG) echo outmsg(DBCONN_SUCCESS);
}

$id = $_GET['id'];

$sql = "SELECT * FROM board WHERE id = " . $id;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_array();
  $title = $row['title'];
  $contents = $row['contents'];
  $registdate = $row['regtime'];
} else {
  echo outmsg(INVALID_USER);
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
    <br>
    <input type=submit value="저장">
  </form>
</body>

</html>