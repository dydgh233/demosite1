<?php
 require_once '../util/dbconfig_remind2.php';




$o_name=$_POST['o_name'];
$o_number=$_POST['o_number'];
$o_adress=$_POST['o_adress'];
$o_email=$_POST['o_email'];
$cardname=$_POST['cardname'];
$cardnumber=$_POST['cardnumber'];

echo $o_name;


$stmt= $conn->prepare("INSERT INTO tbl_order(m_id, c_id, o_name, o_number, o_adress, o_email, cardname, cardnumber) VALUES (?, ?, ?,?,?,?,?,?)");
echo "after assign stmt<br>";
$stmt->bind_param("ssssssss", "10", "19", $o_name, $o_number, $o_adress, $o_email, $cardname, $cardnumber);
echo "after bind param<br>";

$stmt->execute();
echo "after execute<br>";
$stmt->close();
$conn->close();

// header('Location:purchasehistory.php');
?>