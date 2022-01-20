<?php
$hostname = "localhost";
$username = "remind2";
$password = "remind2";
$dbname = "remind2";
$conn = new mysqli($hostname, $username, $password, $dbname);
if($conn->connect_error){
    die("데이터베이스연결에 문제가 있습니다." .$conn->connect_error);
}

$test_name = $_POST['test_name'];
$test_number = $_POST['test_number'];
$test_email = $_POST['test_email'];

echo $test_name."/".$test_number."/".$test_email;

$stmt = $conn->prepare( "INSERT INTO test(test_name, test_number, test_email) VALUES (?,?,?)");

$stmt->bind_param("sss", $test_name, $test_number, $test_email);

$stmt->execute();

$stmt->close();

$conn->close();

header('Location:./list.php');


?>