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
   require_once '../util/dbconfig_remind2.php';

    $sql="SELECT o.id, m.m_id, m.m_name, c.c_name , c.price 
	from member m, car c ,tbl_order o
	where o.m_id = m.id 
	and o.c_id = c.id
	and m.adress= o.o_adress
	and o.cardnumber= m.m_cardnumber ";
	
    $resultset = $conn->query($sql);
    if($resultset->num_rows > 0) {
    while ($row = $resultset->fetch_assoc()) {
    ?>
        <tr>
            <td><?=$row['m_name']?></td>
            <td><?=$row['c_name']?></td>
            <td><?=$row['c_price']?></td>
        </tr>

    <?php
    $resultset->close();
    }
} else {
    echo "조건을 만족하는 데이터가 없습니다.";
}
    
    $conn->close();
    ?>
    
</body>
</html>