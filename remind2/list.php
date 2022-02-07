<?php
require '../util/dbconfig_remind2.php';
require_once '../util/loginchk.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/head_style.css">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="./list.php">박용호사이트</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">



                    <li class="nav-item">

                        <div class="loginlink">



                            <?php
                            if (!$chk_login) {  // 로그인 상태가 아니라면
                            ?>
                                <a class="nav-link" aria-current="page" id='trglgnModal' display='block' style="width:auto;"><strong>로그인</strong></a>

                                <div id='lgnModal' class='modal'>

                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <form action="../remind2/login_process.php" method="POST" class="loginbox">
                                            <label for="username"><b>ID</b></label><input type="text" name="ID" placeholder="ID를 입력하세요." required />
                                            <label for="passwd"><b>Password </label><input type="password" name="password" placeholder=" password를 입력하세요." required />
                                            <button type=submit>로그인</button><br>
                                        </form>

                                    </div>

                                </div>

                            <?php
                            } else {
                                echo $_SESSION['m_id']; ?>
                                <button?><a href="./logout.php">logout</a></button>
                                <?php
                            }
                                ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button onclick="document.getElementById('id01').style.display='block'" class="nav-link" style="width:auto; ">회원가입</button>

                        <div id="id01" class="modal">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <form class="modal-content" action="/remind2/insert_process.php" method="POST">
                                <div class="container">
                                    <h1>회원가입</h1>
                                    <p>회원정보를 작성해주세요.</p>
                                    <hr>
                                    <label for="email"><b>ID</b></label>
                                    <input type="text" placeholder="ID" name="ID" required>
                                    <label for="email"><b>비밀번호</b></label>
                                    <input type="text" placeholder="password" name="password" required>
                                    <label for="email"><b>이메일</b></label>
                                    <input type="text" placeholder="이메일" name="m_email" required>

                                    <label for="psw"><b>이름</b></label>
                                    <input type="text" placeholder="이름" name="m_name" required>

                                    <label for="psw-repeat"><b>주소</b></label>
                                    <input type="text" placeholder="주소" name="m_adress" required>

                                    <label for="psw-repeat"><b>주민등록번호</b></label>
                                    <input type="text" placeholder="주민등록번호" name="m_number" required>

                                    <label for="psw-repeat"><b>폰번호</b></label>
                                    <input type="text" placeholder="핸드폰번호" name="m_phone" required>
                                    <label for="psw-repeat"><b>카드이름</b></label>
                                    <input type="text" placeholder="카드이름" name="m_cardname" required>
                                    <label for="psw-repeat"><b>카드번호</b></label>
                                    <input type="text" placeholder="카드번호" name="m_cardnumber" required>

                                    <div class="clearfix">
                                        <button type="submit" class="signupbtn">등록</button>
                                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">취소</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">차량등록내역</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="purchasehistory.php">구매내역</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="car_insert.php">차량등록</a></li>

                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <div class="slideshow-container">
                    <div class="mySlides1">
                        <img src="../remind2/uploadfiles/벤츠.jpg" style="width:100%" height="400px">
                    </div>

                    <div class="mySlides1">
                        <img src="../remind2/uploadfiles/아우디.jpg" style="width:100%" height="400px">
                    </div>

                    <div class="mySlides1">
                        <img src="../remind2/uploadfiles/세로벤츠.jpg" style="width:100%" height="400px">
                    </div>

                    <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                </div>

            </div>
        </div>
    </header>
    <!-- Section-->

    <?php
    //페이지
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 8;

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

    $sql = "SELECT * FROM member ";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    $m_id = $row['m_id'];
  }
    ?>



    <section class="py-5">


        <div class="container px-4 px-lg-5 mt-5">

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content">
                <?php
                while ($row = $resultset->fetch_array()) {
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./uploadfiles/<?= $row['uploadfile'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $row['c_name'] ?></h5>
                                    <!-- Product price-->
                                    <?= $row['c_price'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detailview.php?c_id=<?= $row['c_id'] ?>&m_id=<?=$m_id?>">상세보기</a></div>
                            </div>
                        </div>
                    </div>

                <?php

                }

                ?>

            </div>

        </div>


        </div>
        <?php
        $resultset->close();
        $result->close();
        ?>


        <div class="pagination">
            <a <?php if ($page_no > 1) {
                    echo "href='?page_no=$previous_page'";
                } ?>>❮</a>

            <a <?php if ($page_no < $total_no_of_pages) {
                    echo "href='?page_no=$next_page'";
                } ?>>❯</a>
        </div>

    </section>
</body>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">박용호 &copy; 중고차 Website 2021</p>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../js/scripts.js"></script>
<script src='../js/login.js'></script>
<script src='../js/head.js'></script>
</body>

</html>