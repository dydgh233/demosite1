
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

$id = $_GET['id'];
$upload_path = './uploadfiles/';


$sql="SELECT * FROM board WHERE id = ".$id;
  $resultset = $conn->query($sql);
  $row = $resultset->fetch_assoc();
  $existingfile = $row['uploadfile'];
  if(isset($existingfile) && $existingfile != ""){
     unlink($upload_path.$existingfile); 
  }
 
$sql = "DELETE FROM board WHERE id=" . $id;

if ($conn->query($sql) == TRUE) {
  echo outmsg(DELETE_SUCCESS);
} else {
  echo outmsg(DELETE_FAIL);
}

$conn->close();


echo "<a href='../board/./list.php'>삭제되었습니다.</a>";
?>