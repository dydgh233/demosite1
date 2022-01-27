<?php
$hostname = "localhost";
$username = "remind2";
$password = "remind2";
$dbname = "remind2";
$conn = new mysqli($hostname, $username, $password, $dbname);
if($conn->connect_error){
    die("데이터베이스연결에 문제가 있습니다." .$conn->connect_error);
}

$m_email = $_POST['m_email'];
$m_name = $_POST['m_name'];
$number = $_POST['number'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$m_cardname = $_POST['m_cardname'];
$m_cardnumber = $_POST['m_cardnumber'];
$m_id=$_POST['m_id'];
$m_password=$_POST['m_password'];




$stmt = $conn->prepare( "INSERT INTO member(m_name, adress, number, phone,m_email,m_cardname,m_cardnumber,m_id,m_password) VALUES (?,?,?,?,?,?,?,?,?)");

$stmt->bind_param("sssssssss", $m_name, $adress, $number, $phone,$m_email,$m_cardname,$m_cardnumber,$m_id , $m_password);

$stmt->execute();

$stmt->close();

$conn->close();

header('Location:./list.php');


?>