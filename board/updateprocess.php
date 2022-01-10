
<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];
}

$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$registdate = $_POST['registdate'];

echo outmsg($id);

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    echo outmsg(DBCONN_FAIL);
    die("연결실패 :" . $conn->connect_error);
} else {
    if (DBG) echo outmsg(DBCONN_SUCCESS);
}


$stmt = $conn->prepare("UPDATE board SET title = ?,contents = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $contents, $id);
$stmt->execute();

$conn->close();

header('Location:detailview.php?id=' . $id);
?>