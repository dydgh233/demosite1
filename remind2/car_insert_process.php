Skip to content
Why GitHub? 
Team
Enterprise
Explore 
Marketplace
Pricing 
Search
Sign in
Sign up
dydgh233
/
demosite11
Public
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
demosite11/remind2/car_insert_process.php /
@dydgh233
dydgh233 Initial commit
Latest commit ff75f26 2 days ago
 History
 1 contributor
38 lines (28 sloc)  1.17 KB
   
<?php
require "../util/utility.php";
require "../util/dbconfig_remind2.php";


$upload_path = "./uploadfiles/";
$c_name = $_POST['c_name'];
$c_size = $_POST['c_size'];
$c_date = $_POST['c_date'];
$c_energy= $_POST['c_energy'];
$c_price = $_POST['c_price'];
$c_model = $_POST['c_model'];
if(is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
    $filename = time()."_".$_FILES['uploadfile']['name'];
    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $upload_path.$filename)){
      
      if(DBG) echo outmsg(UPLOAD_SUCCESS);
      
      $stmt = $conn->prepare( "INSERT INTO car(c_name, c_energy, c_size, c_date, c_price , c_model , uploadfile) VALUES (?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssss", $c_name, $c_energy, $c_size, $c_date, $c_price, $c_model, $filename);
    }else { 
      
      if(DBG) echo outmsg(UPLOAD_ERROR);   
    }
    }else {
        $stmt = $conn->prepare( "INSERT INTO car(c_name, c_energy, c_size, c_date, c_price , c_model) VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("ssssss", $c_name, $c_energy, $c_size, $c_date, $c_price, $c_model);
    }
    $stmt->execute();
    $stmt->close();
    $conn->close();

header('Location:./list.php');


?>
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Loading complete