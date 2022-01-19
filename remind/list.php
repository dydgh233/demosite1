<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
</head>

<body>
    <?php




    // 데이터베이스 연결하고... 
    // 테이블 조회 후 결과를 resultset에 보관.
    $conn = new mysqli("localhost", "remind", "remind", "remind");

    //페이지
    $records_per_page = 5;
    // 처음 page_no 없이 list할 때는 page_no기본값을 1로하고
    // page_no를 GET으로 받아올 수 있으면 받아온 값을 page_no로 대입
    if (isset($_GET['page_no']) && $_GET['page_no'] != '') {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $offset = ($page_no - 1) * $records_per_page;
    $previouse_page = $page_no - 1;
    $next_page = $page_no + 1;

    $sql = "SELECT COUNT(*) AS total_records FROM employee";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $total_records = $row['total_records'];
    $total_no_of_pages = ceil($total_records / $records_per_page);
    $page_range_size = 5;
    if (($page_no % $page_range_size) != 0) {
        $start_page = floor($page_no / $page_range_size) * $page_range_size + 1;
    } else {
        $start_page = floor($page_no / $page_range_size) * $page_range_size + 1 - $page_range_size;
    }
    $end_page = $start_page + ($page_range_size - 1);

    if ($end_page > $total_no_of_pages) {
        $end_page = $total_no_of_pages;
    }

    //$sql = "SELECT * FROM employee LIMIT 10, 10";
    $sql = "SELECT * FROM employee LIMIT " . $offset . ", " . $records_per_page;
    $resultset = $conn->query($sql);
    ?>
    <h1>인사정보 리스트</h1>

    <table>
        <tr>
            <th>No.</th>
            <th>성명</th>
            <th>사원번호</th>
            <th>전화번호</th>
            <th>입사일</th>
            <th>부서코드</th>
            <th>주소</th>
            <th>이메일</th>
        </tr>
        <?php
        while ($row = $resultset->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><a href="detailview.php?id=<?= $row['id'] ?>"><?= $row['emp_name'] ?></a></td>
                <td><?= $row['emp_number'] ?></td>
                <td><?= $row['emp_phone'] ?></td>
                <td><?= $row['emp_hiredate'] ?></td>
                <td><?= $row['emp_deptcode'] ?></td>
                <td><?= $row['emp_address'] ?></td>
                <td><?= $row['emp_email'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php

    echo "current page :$page_no/$total_no_of_pages<br>";
    if ($page_no > 1) {
        echo "<a href='list.php?page_no=$start_page'>First</a>&nbsp;&nbsp;&nbsp;";
    }
    if ($page_no > 1) {
        echo "<a href='list.php?page_no=$previouse_page'>Previous</a>&nbsp;&nbsp;&nbsp;";
    }
    for ($count = $start_page; $count <= $end_page; $count++) {
        echo "<a href='list.php?page_no=$count'>$count</a>&nbsp;&nbsp;&nbsp;";
    }

    if ($page_no < $total_no_of_pages) {
        echo "&nbsp;&nbsp;&nbsp;<a href = list.php?page_no=$next_page>Next</a>";
    }

    if ($page_no < $total_no_of_pages) {
        echo "&nbsp;&nbsp;&nbsp;<a href = list.php?page_no=$total_no_of_pages>Last</a>";
    }
    ?>

    <br>
    <a href="insert.php">NEW</a>
    <?php
    $resultset->close();
    $conn->close();
    ?>
</body>

</html>