<?php
$conn = new mysqli("localhost","remind","remind","remind");

$id= $_GET['id'];

$sql = "DELETE FROM employee WHERE id = ".$id;
$conn->query($sql);
$conn->close();

header('Location:./list.php');
?>