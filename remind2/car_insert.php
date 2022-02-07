<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>차량등록</h1>
    <form action="car_insert_process.php" method="POST" enctype="multipart/form-data">
    <label>차종</label><input type="text" name="c_name"/><br>
    <label>크기</label><input type="text" name="c_size"/><br>
    <label>년도</label><input type="text" name="c_date"/><br>  
    <label>연료</label><input type="text" name="c_energy"/><br>  
    <label>가격</label><input type="text" name="c_price"/><br>  
    <label>회사</label><input type="text" name="c_model"/><br> 
    <input type="file" name="uploadfile"/><br> 
    
    <input type="submit" value="저장">
    </form>
</body>
</html>