
<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
$upload_path = './uploadfiles/';  
if($chk_login) {
  $username = $_SESSION['username'];


$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$registdate = $_POST['registdate'];
$uploadfile = $_POST['uploadfile'];

echo outmsg($id);

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    echo outmsg(DBCONN_FAIL);
    die("연결실패 :" . $conn->connect_error);
} else {
    if (DBG) echo outmsg(DBCONN_SUCCESS);
}


  $filename = $_FILES['uploadfile']['name'];
  
  $filename = time()."_".$_FILES['uploadfile']['name'];
    
  if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upload_path.$filename)){
   
    $sql="SELECT * FROM board WHERE id = ".$id;
    $resultset = $conn->query($sql);
    $row = $resultset->fetch_assoc();
    $existingfile = $row['uploadfile'];
    if(isset($existingfile) && $existingfile != ""){
       unlink($upload_path.$existingfile); 
    }

    
    $stmt = $conn->prepare("UPDATE board SET title = ?, contents = ?, uploadfile = ? WHERE id = ?" );
    $stmt->bind_param("ssss", $title, $contents, $filename, $id);
    $stmt->execute();

$conn->close();
  }


echo "<a href='../board/detailview.php?id=".$id."&board_id'>수정하였습니다.</a>";
}
?>
<a href="../board/detailview.php?id=<?=$id?>"></a>