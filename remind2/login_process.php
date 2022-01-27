

<?php

session_start();
// db연결 준비
require_once "../util/dbconfig_remind2.php";

$m_id = $_POST['m_id'];
$m_password = $_POST['m_password'];

$userip = get_client_ip();

// 사용자 계정 존재 여부 확인을 위한 질의 구성
$stmt = $conn->prepare("SELECT * FROM member WHERE m_id = ? and m_password = ?");
$stmt->bind_param("ss", $m_id, $m_password);

$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);

if (!empty($row['m_id'])) {
  $_SESSION['m_id']=$row['m_id'];
  $conn->close();
  echo "<a href='../remind2/list.php'>홈페이지로</a>";
} else {
  echo outmsg(LOGIN_FAIL);
  $conn->close();
  echo "<a href='../remind2/list.php'>홈페이지로</a>";
}


?>