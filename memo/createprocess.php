
<!-- 
  파일명 : oo_user_regist_process.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  oo_user_registform.html 회원가입화면에서 입력된 값을 받아, validation 후
  users 테이블에 사용자 가입 데이터를 추가한다.
-->

<?php
  // db연결 준비
  // 출력용 메시지 등의 include 문제 때문에 
  // 연결준비는 여기에서 하지만
  // 실제 연결은 입력한 비밀번호와 확인용비밀번호가 일치할 때 진행
  require "../util/dbconfig.php";

  // 데이터베이스 작업 전, 회원가입화면으로 부터 값을 전달 받고
  $title = $_POST['title'];
  $contents = $_POST['contents'];
  $username = $_POST['users'];
  
  

  
      $stmt = $conn->prepare("INSERT INTO memo(title,contents,users) VALUES(?, ?,?)");
      $stmt->bind_param("sss", $title,$contents,$username);
      $stmt->execute();
    
  
  
  // 데이터베이스 연결 인터페이스 리소스를 반납한다.
  $conn->close();

  // 등록 과정 중 오류가 발생하였으면 앞서.. 오류 내용 메시지를 확인하고
  // 등록 화면으로 다시 돌아간다.
  if($regist_err) {
     header('Location: ./createform.html');
    
  }else { 
  // 그렇지 않으면
  // 프로세스 플로우를 인덱스 페이지로 돌려준다.
  header('Location:./list.php');
  
  }
?>