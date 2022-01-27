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

    $sql = "SELECT * FROM car WHERE id=".$id;
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();

    ?>
    <form action="update_process.php" method="POST">
    <label>번호</label><input type="hidden" name="id" value="<?=$row['id']?>"><br>
    <label>차종</label><input type="text" name="c_name" value="<?=$row['c_name']?>"><br>
    <label>크기</label><input type="text" name="size" value="<?=$row['size']?>"><br>
    <label>년도</label><input type="text" name="c_date" value="<?=$row['c_date']?>"><br>
    <label>연료</label><input type="text" name="energy" value="<?=$row['energy']?>"><br>
    <label>가격</label><input type="text" name="price" value="<?=$row['price']?>"><br>
    <label>회사</label><input type="text" name="model" value="<?=$row['model']?>"><br>

    <input type="submit" value="저장">

    </form>
</body>
</html>