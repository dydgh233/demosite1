
<?php
require "../util/dbconfig.php";

$sql = "DROP TABLE IF EXISTS board";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(DROPTBL_SUCCESS);
}

$sql = " CREATE TABLE `board`(
    `id` INT(6) NOT NULL AUTO_INCREMENT ,
    `users` VARCHAR(20)   COMMENT 'users' , 
    `title` VARCHAR(50) NOT NULL COMMENT 'memo title' ,
    `contents` TEXT NOT NULL COMMENT 'memo contents' ,
    `regtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'registration time' ,
    `lasttime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last time' ,
    PRIMARY KEY(`id`) 
    )
    ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci COMMENT = 'memo registration table';";

if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(CREATETBL_SUCCESS);
} else {
  echo outmsg(CREATETBL_FAIL);
}

$conn->close();

echo "<a href='../index.php'>Confirm and Return to back</a>";
?>