<?php
require "../util/dbconfig_remind2.php";

$m_email = $_POST['m_email'];
$m_name = $_POST['m_name'];
$m_number = $_POST['m_number'];
$m_phone = $_POST['m_phone'];
$m_adress = $_POST['m_adress'];
$m_cardname = $_POST['m_cardname'];
$m_cardnumber = $_POST['m_cardnumber'];
$ID=$_POST['ID'];
$password=$_POST['password'];




$stmt = $conn->prepare( "INSERT INTO member(m_name, m_adress, m_number, m_phone, m_email, m_cardname, m_cardnumber, ID ,password) VALUES (?,?,?,?,?,?,?,?,?)");

$stmt->bind_param("sssssssss", $m_name, $m_adress, $m_number, $m_phone, $m_email, $m_cardname, $m_cardnumber, $ID, $password);

$stmt->execute();

$stmt->close();

$conn->close();

header('Location:./list.php');


?>