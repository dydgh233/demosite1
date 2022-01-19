<!--입력을 위한 화면 구성 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>인사 정보 입력화면</h1>
    <form action="insertprocess.php" method="POST">
        <label>성명<input type="text" name="emp_name"/></label><br>
        <label>사원번호<input type="text" name="emp_number"/></label><br>
        <label>전화번호<input type="text" name="emp_phone"/></label><br>
        <label>부서코드<input type="text" name="emp_deptcode"/></label><br>
        <label>주소<input type="text" name="emp_address"/></label><br>
        <label>이메일<input type="text" name="emp_email"/></label><br>
        <input type="submit" value="저장">
        
        
        
        
        


    </form>
</body>
</html>