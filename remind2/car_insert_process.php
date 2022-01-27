<?php
require "../util/utility.php";
$upload_path = "./uploadfiles";
$hostname = "localhost";
$username = "remind2";
$password = "remind2";
$dbname = "remind2";
$conn = new mysqli($hostname, $username, $password, $dbname);
if($conn->connect_error){
    die("데이터베이스연결에 문제가 있습니다." .$conn->connect_error);
}

$c_name = $_POST['c_name'];
$size = $_POST['size'];
$c_date = $_POST['c_date'];
$energy= $_POST['energy'];
$price = $_POST['price'];
$model = $_POST['model'];
if(is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
    $filename = time()."_".$_FILES['uploadfile']['name'];
    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upload_path.$filename)){
      
      if(DBG) echo outmsg(UPLOAD_SUCCESS);
      
      $stmt = $conn->prepare( "INSERT INTO car(c_name, energy, size, c_date, price , model , uploadfile) VALUES (?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssss", $c_name, $energy, $size, $c_date,$price, $model, $filename);
    }else { 
      
      if(DBG) echo outmsg(UPLOAD_ERROR);   
    }
    }else {
        $stmt = $conn->prepare( "INSERT INTO car(c_name, energy, size, c_date, price , model) VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("ssssss", $c_name, $energy, $size, $c_date,$price, $model);
    }
    $stmt->execute();
    $stmt->close();
    $conn->close();

header('Location:./list.php');


?>