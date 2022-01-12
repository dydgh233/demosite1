<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];


  
//수정할 레코드의 id값을 받아온다.
  $id=$_GET['id'];
//해당 id로 데이터를 검색하는 질의문 구성
  $sql= "SELECT * FROM memo WHERE id = ".$id ;
//해당 질의문 가져오기
  $result = $conn->query($sql);
//결과셋을 한개의 행으로 처리하고, 필요로하는 각 컬럼을 얻어온다.
  if($result->num_rows>0){
      $row = $result->fetch_array();
      $title=$row['title'];
      $contents=$row['contents'];
      $registdate = $row['regtime'];
  }else{
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
    <input  type="hidden" value="<?=$id?>"name="id"/>
    <label>제목 : </label><input type="text" name="title" value="<?=$title?>" required /><br>
    <label>내용 : </label><input type="text" name="contents"value="<?=$contents?>"  required /><br>
    <label>날짜 : </label><input type="text" name="registdate" value="<?=$registdate?>" readonly /><br>
    <br>
    <input type=submit value="저장">
  </form>
</body>
</html>