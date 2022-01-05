
<?php
require "../util/dbconfig.php";

$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$registdate = $_POST['registdate'];

echo outmsg($id);

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    echo outmsg(DBCONN_FAIL);
    die("연결실패 :" . $conn->connect_error);
} else {
    if (DBG) echo outmsg(DBCONN_SUCCESS);
}

$stmt = $conn->prepare("UPDATE board SET title = ?,contents = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $contents, $id);
$stmt->execute();

$conn->close();

header('Location:detailview.php?id=' . $id);
?>