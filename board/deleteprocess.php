
<?php

require "../util/dbconfig.php";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :" . $conn->connect_error);
} else {
  if (DBG) echo outmsg(DBCONN_SUCCESS);
}

$id = $_GET['id'];

$sql = "DELETE FROM board WHERE id=" . $id;

if ($conn->query($sql) == TRUE) {
  echo outmsg(DELETE_SUCCESS);
} else {
  echo outmsg(DELETE_FAIL);
}

$conn->close();

header('Location: ./list.php');
?>