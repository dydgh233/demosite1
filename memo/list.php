<!-- 
  파일명 : oo_user_loginsuccess.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  oo_user_registform.html 회원가입화면에서 입력된 값을 받아, validation 후
  users 테이블에 사용자 가입 데이터를 추가한다.
-->
<?php
  // db연결 준비
  require "../util/dbconfig.php";

  // create connection
  $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

  // check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
  if($conn->connect_error) {
    echo outmsg(DBCONN_FAIL);
    die("연결실패 :".$conn->connect_error);
  }else {
    if(DBG) echo outmsg(DBCONN_SUCCESS);
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  
  <h1>메모장 목록</h1>
  <br><br>
  <?php
    $sql = "SELECT * FROM memo";
    $resultset = $conn->query($sql);

    if($resultset->num_rows > 0) {
     
      echo "<table><tr><th>id</th><th>제목</th></tr>";
     
      while( $row = $resultset->fetch_assoc() ) {
        
        echo "<tr><td>".$row['id']."</td><td>".$row['title']."</td><td><a href='detailview.php?id=".$row['id']."'>내용확인</a></tr>";
      }
      echo "</table>";
    }
    
  ?>
  <div class="box1">
  <a href="registform.html">new</a>
  </div>
  <div class="box2">
  <a href="../index.php">메인으로</a>
  </div>
</body>
</html>