<?php

$conn = new mysqli("localhost", "remind", "remind", "remind");


$writer = $_POST['writer'];
$emp_id = $_POST['emp_id'];
$contents = $_POST['contents'];


$stmt= $conn->prepare("INSERT INTO comment(cmt_writer, emp_id, cmt_contents) VALUES(?,?,?)");
$stmt->bind_param("sss", $writer, $emp_id, $contents);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location:./detailview.php?id='.$emp_id);

?>