<?php
require "../util/dbconfig_remind2.php";

$c_id=$_POST['c_id'];
$c_name=$_POST['c_name'];
$c_size=$_POST['c_size'];
$c_date=$_POST['c_date'];
$c_energy=$_POST['c_energy'];
$c_price=$_POST['c_price'];
$c_model=$_POST['c_model'];

$stmt= $conn->prepare("UPDATE car SET c_name=?, c_size=?, c_date=? , c_energy =?, c_price=?, c_model=? WHERE c_id=?");
$stmt->bind_param("sssssss", $c_name, $c_size, $c_date, $c_energy, $c_price, $c_model, $c_id);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location:detailview.php?c_id='.$c_id);




?>