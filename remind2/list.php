<?php
require_once '../util/dbconfig_remind2.php';
require_once '../util/loginchk.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/remind_style.css">
    <link rel="stylesheet" href="../css/style4.css">
</head>

<body>
    <div class="tt1">
        <div class="t1">
            <h2>중고차사이트</h2>
        </div>

        <div class="t2">
            <?php
            $sql = "SELECT * FROM member";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($chk_login) {

            ?>
                <?= $row['m_name'] ?>님이 로그인했습니다.
            <?php } else {
            ?>
                <a href="insert.php">로그인</a>
            <?php
            }
            ?>
            <button?><a href="./logout.php">logout</a></button>
            <a href="car_insert.php">차량등록</a>
            <a href="delete.php">구매내역</a>
        </div>
    </div>

    <div class="search">
        <form action="search_result.php" method="GET">
            <select name="catgo">
                <option value="c_name">차종</option>
                <option value="c_date">년도</option>
            </select>
            <input type="text" name="search" size="40" required="required">
            <button class="btn btn-primary">검색</button>
        </form>
    </div>

    <?php
    //페이지
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 6;

    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;


    $sql = "SELECT COUNT(*) AS total_records FROM car";
    $resultset = $conn->query($sql);
    $result = mysqli_fetch_array($resultset);
    $total_records = $result['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;

    $sql = "SELECT * FROM car LIMIT " . $offset . ", " . $total_records_per_page . " ";
    $resultset = $conn->query($sql);

    ?>
    <div class="main">
        <?php
        
        while ($row = $resultset->fetch_assoc()) {
        ?>
            <tr>
                <td><a href="detailview.php?id=<?= $row['id'] ?>"><img src="./uploadfiles/<?= $row['uploadfile'] ?>" alt="<?= $row['uploadfile'] ?>" width="150
                    px" height="150px"></a></td>
            </tr>
        <?php
        }
        $resultset->close();
        ?>
    </div>
    <div class="pagination">
        <a <?php if ($page_no > 1) {
                echo "href='?page_no=$previous_page'";
            } ?>>❮</a>

        <a <?php if ($page_no < $total_no_of_pages) {
                echo "href='?page_no=$next_page'";
            } ?>>❯</a>
    </div>
</body>

</html>