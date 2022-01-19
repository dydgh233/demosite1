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
    $conn = new mysqli("localhost", "remind", "remind", "remind");

    $id = $_GET['id'];

    $sql = "SELECT * FROM employee WHERE id = ".$id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<h1>개인정보 상세페이지</h1>
<table>
    <tr>
        <td><?=$row['emp_name']?></td>
        <td><?=$row['emp_number']?></td>
        <td><?=$row['emp_phone']?></td>
        <td><?=$row['emp_hiredate']?></td>
        <td><?=$row['emp_deptcode']?></td>
        <td><?=$row['emp_address']?></td>
        <td><?=$row['emp_email']?></td>
    </tr>
</table>
    
    <a href="update.php?id=<?=$id?>">수정</a>
    <a href="delete_process.php?id=<?=$id?>">삭제</a>
    <a href="list.php">목록으로</a>
</body>
</html>