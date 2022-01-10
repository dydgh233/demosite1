

<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];
}

$title = $_POST['title'];
$contents = $_POST['contents'];
$users=$_POST['users'];



$sql = "SELECT contents FROM board WHERE title = '" . $title . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo outmsg(EXIST_USERNAME);
  $regist_err = TRUE;
} else {
  
  $stmt = $conn->prepare("INSERT INTO board(title,contents,users) VALUES(?,?,?)");
  $stmt->bind_param("sss", $title, $contents, $users);
  $stmt->execute();

}




$conn->close();

if ($regist_err) {
  header('Location: ./registform.html');
} else {

  header('Location:./list.php');
}
?>