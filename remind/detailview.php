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
$login_username = "댓글러";
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
    <hr>
    <!-- 댓글-->

    <form action="comment_process.php" method="POST">
    
    <input type="hidden" name ="writer" value="<?=$login_username?>"><br>    
    <input type="hidden" name ="emp_id" value="<?=$id?>"><br>    
    <input type="text" name="contents"><br>
        <input type="submit" value="저장">

    </form>
    <hr>
    <?php
    //코멘트 테이블에서 emp_id가 본 글(employess)의 id와 같은것만 검색
    $sql="SELECT * FROM comment WHERE emp_id=".$id;
    $resultset = $conn->query($sql);
    while($row = $resultset->fetch_assoc()){
        echo $row['cmt_writer']."&nbsp;&nbsp;&nbsp;.".$row['cmt_contents']."<br> ";
    }

    $result->close();
    $resultset->close();
    $conn->close();
    ?>
</body>
</html>