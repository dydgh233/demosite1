

<?php

require "../util/dbconfig.php";

$title = $_POST['title'];
$contents = $_POST['contents'];


$sql = "SELECT contents FROM board WHERE title = '" . $title . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo outmsg(EXIST_USERNAME);
  $regist_err = TRUE;
} else {
  $stmt = $conn->prepare("INSERT INTO board(title,contents) VALUES(?, ?)");
  $stmt->bind_param("ss", $title, $contents);
  $stmt->execute();
}



$conn->close();

if ($regist_err) {
  header('Location: ./registform.html');
} else {

  header('Location:./list.php');
}
?>