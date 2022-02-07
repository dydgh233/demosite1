<?php
 require_once '../util/dbconfig_remind2.php';


$m_id=$_POST['m_id'];
$c_id=$_POST['c_id'];


$o_name=$_POST['o_name'];
$o_number=$_POST['o_number'];
$o_adress=$_POST['o_adress'];
$o_email=$_POST['o_email'];
$o_cardname=$_POST['o_cardname'];
$o_cardnumber=$_POST['o_cardnumber'];
$regtime=$_POST['regtime'];




$stmt = $conn->prepare( "INSERT INTO tbl_order(m_id, c_id, o_name, o_number, o_adress, o_email, o_cardname, o_cardnumber, regtime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("iisssssss", $m_id, $c_id, $o_name, $o_number, $o_adress, $o_email, $o_cardname, $o_cardnumber, $regtime);


// $stmt = $conn->prepare( "INSERT INTO tbl_order( o_name, o_number, o_adress, o_email, o_cardname, o_cardnumber) VALUES ( ?, ?, ?, ?, ?, ?)");
// echo "after assign stmt<br>";
// $stmt->bind_param("ssssss", $o_name, $o_number, $o_adress, $o_email, $o_cardname, $o_cardnumber);
// echo "after bind param<br>";

$stmt->execute();

$stmt->close();
$conn->close();

header('Location:purchasehistory.php');
?>