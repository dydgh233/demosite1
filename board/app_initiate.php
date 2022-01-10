
<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];
}

$sql = "DROP TABLE IF EXISTS board";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(DROPTBL_SUCCESS);
}

$sql = " CREATE TABLE `board`(
    `id` INT(6) NOT NULL AUTO_INCREMENT ,
    `users` VARCHAR(20)   COMMENT 'users' , 
    `title` VARCHAR(50) NOT NULL COMMENT 'board title' ,
    `hit` INT(100) COMMENT 'hit' ,
    `contents` TEXT NOT NULL COMMENT 'board contents' ,
    `regtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'registration time' ,
    `lasttime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last time' ,
    PRIMARY KEY(`id`) 
    )
    ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci COMMENT = ' registration table';";

if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(CREATETBL_SUCCESS);
} else {
  echo outmsg(CREATETBL_FAIL);
}

$conn->close();

echo "<a href='../index.php'>Confirm and Return to back</a>";
?>

