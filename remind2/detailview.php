<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <?php
    $hostname="localhost";
    $username="remind2";
    $password="remind2";
    $dbname="remind2";

    $conn= new mysqli($hostname,$username,$password,$dbname);

    $id=$_GET['id'];

    $sql="SELECT * FROM car WHERE id=  ".$id;
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <H1><?=$row['c_name']?></H1>
    
    <img src="../remind2/uploadfiles/<?=$row['uploadfile']?>"width ="500px" height="500px">
    <table>
   
    <tr><th>번호</th><td><?=$row['id']?></td></tr>
    <tr><th>차종</th><td><?=$row['c_name']?></td></tr>
    <tr><th>크기</th><td><?=$row['size']?></td></tr>
    <tr><th>년도</th><td><?=$row['c_date']?></td></tr>
    <tr><th>연료</th><td><?=$row['energy']?></td></tr>
    <tr><th>가격</th><td><?=$row['price']?></td></tr>
    <tr> <th>회사</th><td><?=$row['model']?></td></tr>
        

       </table>


   

    <a href="buy.php?id=<?=$row['id']?>">구매</a>
    <a href="update.php?id=<?=$row['id']?>">수정</a>
    <a href="delete.php?id=<?=$row['id']?>">삭제</a>
    <a href="list.php">리스트</a>


</body>
</html>