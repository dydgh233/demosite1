<?php

require "../util/dbconfig_remind2.php";

$c_id=$_GET['c_id'];

$sql="DELETE FROM car WHERE c_id=".$c_id;
$conn->query($sql);
$conn->close();

header('Location:list.php');

?>