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

    $sql = "SELECT * FROM test WHERE id=".$id;
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();

    ?>
    <form action="update_process.php" method="POST">
    <label>순서</label><input type="hidden" name="id" value="<?=$row['id']?>"><br>
    <label>이름</label><input type="text" name="test_name" value="<?=$row['test_name']?>"><br>
    <label>번호</label><input type="text" name="test_number" value="<?=$row['test_number']?>"><br>
    <label>이메일</label><input type="text" name="test_email" value="<?=$row['test_email']?>"><br>

    <input type="submit" value="저장">

    </form>
</body>
</html>