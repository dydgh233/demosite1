<?php
$hostname="localhost";
$username="remind2";
$password="remind2";
$dbname="remind2";

$conn = new mysqli($hostname,$username,$password,$dbname);

$id=$_POST['id'];
$test_name=$_POST['test_name'];
$test_number=$_POST['test_number'];
$test_email=$_POST['test_email'];

$stmt= $conn->prepare("UPDATE test SET test_name=?, test_number=?, test_email=? WHERE id=?");
$stmt->bind_param("ssss", $test_name, $test_number, $test_email, $id);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location:detailview.php?id='.$id);




?>