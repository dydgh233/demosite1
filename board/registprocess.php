

<?php
// db연결 준비
require "../util/dbconfig.php";
// require "../util/utility.php";
$upload_path = './uploadfiles/';
// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];


$title = $_POST['title'];
$contents = $_POST['contents'];
$users=$_POST['users'];

if(is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
$filename = time()."_".$_FILES['uploadfile']['name'];
if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upload_path.$filename)){
  
  if(DBG) echo outmsg(UPLOAD_SUCCESS);
  
  $stmt = $conn->prepare("INSERT INTO board(users, title, contents, uploadfile) VALUES(?, ?, ?, ?)");
  $stmt->bind_param("ssss", $users, $title, $contents, $filename);
}else { 
  
  if(DBG) echo outmsg(UPLOAD_ERROR);   
}
}else {
  $stmt = $conn->prepare("INSERT INTO board(users, title, contents) VALUES(?, ?, ?)");
  $stmt->bind_param("sss", $users, $title, $contents);
}
$stmt->execute();
$stmt->close();
$conn->close();

echo outmsg(COMMIT_CODE);
  echo "<a href='./list.php'>메모 목록 페이지로</a>";
  
} else { // 로그인 하지 않은상황에서, 로그인이 필요 메시지 출력 후 인덱스 페이지로
  echo outmsg(LOGIN_NEED);
  echo "<a href='../index.php'>Confirm and Return to index.</a>";
}
?>