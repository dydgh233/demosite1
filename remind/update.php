<!--수정을 위한 화면 구성 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   
    $conn = new mysqli("localhost","remind", "remind","remind");

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM employee WHERE id=".$id;
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <h1>인사 정보 수정화면</h1>
    <form action="updateprocess.php" method="POST">
        <input  type="hidden" name="id" value="<?=$row['id']?>"/><br>
        <label>성명<input type="text" name="emp_name" value="<?=$row['emp_name']?>" readonly/></label><br>
        <label>사원번호<input type="text" name="emp_number"value="<?=$row['emp_number']?>" readonly/></label><br>
        <label>전화번호<input type="text" name="emp_phone"value="<?=$row['emp_phone']?>"/></label><br>
        <label>부서코드<input type="text" name="emp_deptcode"value="<?=$row['emp_deptcode']?>"/></label><br>
        <label>입사일<input type="text" name="emp_hiredate"value="<?=$row['emp_hiredate']?>"/readonly></label><br>
        <label>주소<input type="text" name="emp_address"value="<?=$row['emp_address']?>"/></label><br>
        <label>이메일<input type="text" name="emp_email"value="<?=$row['emp_email']?>"/></label><br>
        <input type="submit" value="저장">
        
        
        
        
        


    </form>
</body>
</html>