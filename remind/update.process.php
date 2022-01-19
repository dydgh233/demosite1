<?php

$conn = new mysqli("localhost","remind","remind","remind");

$id=$_POST['id'];
$emp_deptcode=$_POST['emp_deptcode'];
$emp_phone=$_POST['emp_phone'];
$emp_address=$_POST['emp_address'];
$emp_email=$_POST['emp_email'];

$stmt=$conn->prepare("UPDATE employee SET emp_phone=?,emp_address=?,emp_deptcode =?,emp_email=? WHERE id=?");
$stmt->bind_param("ssiss",$emp_phone,$emp_address,$emp_deptcode,$emp_email,$id);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location:./detailview.php?id='.$id);
?>