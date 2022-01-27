<?php
// login process 에서 세션을 시작함
if (!empty($row['m_id'])) {
  $_SESSION['user']=$row['m_id'];
  $conn->close();
 
} else {
 
  $conn->close();

}



// 편의상 유틸에 따로 만듬
  session_start();
  if(isset($_SESSION['user'])) {
    $chk_login = TRUE;
  }else { 
    $chk_login = FALSE;
  }



//로그인표시가 필요할때 씀
if($chk_login) {
$user = $_SESSION['m_id'];
}