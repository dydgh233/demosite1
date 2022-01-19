<?php
$hostname = "localhost";
$username = "remind";
$password = "remind";
$dbname = "remind";
$conn = new mysqli($hostname, $username, $password, $dbname);
if($conn->connect_error){
    die("데이터베이스연결에 문제가 있습니다." .$conn->connect_error);
}


$emp_name = $_POST['emp_name'];
$emp_number = $_POST['emp_number'];
$emp_phone = $_POST['emp_phone'];
$emp_deptcode = $_POST['emp_deptcode'];
$emp_address = $_POST['emp_address'];
$emp_email = $_POST['emp_email'];


$stmt = $conn->prepare( "INSERT INTO employee(emp_name,emp_number,emp_phone,
emp_deptcode,emp_address,emp_email) VALUES (?,?,?,?,?,?)");

$stmt->bind_param("sssiss", $emp_name, $emp_number, $emp_phone,
$emp_deptcode, $emp_address, $emp_email);


$stmt->execute();
$stmt->close();
$conn->close();

header('Location:./list.php');
?>