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

    $sql="SELECT * FROM test WHERE id=  ".$id;
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <H1>상세정보</H1>
    <table>
        <tr>
            <th>순서</th>
            <th>이름</th>
            <th>번호</th>
            <th>이메일</th>
        </tr>
        <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['test_name']?></td>
        <td><?=$row['test_number']?></td>
        <td><?=$row['test_email']?></td>

        </tr>


    </table>
    <a href="update.php?id=<?=$row['id']?>">수정</a>
    <a href="delete.php?id=<?=$row['id']?>">삭제</a>
    <a href="list.php">리스트</a>


</body>
</html>