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

    $sql="SELECT * FROM test";
    $resultset=$conn->query($sql);

    ?>
    <h2>리스트</h2>
    <table>
        <tr>
            <th>순서</th>
            <th>이름</th>
            <th>번호</th>
            <th>이메일</th>
        </tr>
        <?php
        while($row = $resultset->fetch_assoc()){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><a href="detailview.php?id=<?=$row['id']?>"><?=$row['test_name']?></a></td>
            <td><?=$row['test_number']?></td>
            <td><?=$row['test_email']?></td>
        </tr>



        <?php    
        }
        ?>
    <a href="insert.php">새계정만들기</a>



    </table>

</body>
</html>