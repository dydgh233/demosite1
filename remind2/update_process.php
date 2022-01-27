<?php
$hostname="localhost";
$username="remind2";
$password="remind2";
$dbname="remind2";

$conn = new mysqli($hostname,$username,$password,$dbname);

$id=$_POST['id'];
$c_name=$_POST['c_name'];
$size=$_POST['size'];
$c_date=$_POST['c_date'];
$energy=$_POST['energy'];
$price=$_POST['price'];
$model=$_POST['model'];

$stmt= $conn->prepare("UPDATE car SET c_name=?, size=?, c_date=? , energy =? ,price=? ,model=? WHERE id=?");
$stmt->bind_param("sssssss", $c_name, $size, $c_date, $energy, $price, $model, $id);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location:detailview.php?id='.$id);




?>