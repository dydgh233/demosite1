<?php

$hostname="localhost";
$username="remind2";
$password="remind2";
$dbname="remind2";

$id=$_GET['id'];

$conn=new mysqli($hostname,$username,$password,$dbname);

$sql="DELETE FROM car WHERE id=".$id;
$conn->query($sql);
$conn->close();

header('Location:list.php');



?>