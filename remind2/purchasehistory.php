<?php
require "../util/dbconfig_remind2.php";





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles_detailview.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <?php
    

    $sql = "SELECT o.id, m.m_name, c.c_name , c.c_price, c.uploadfile, regtime
     from member m, car c ,tbl_order o
     where o.m_id = m.m_id 
     and o.c_id = c.c_id
     and m.m_adress= o.o_adress
     and o.o_cardnumber= m.m_cardnumber ";


    ?>
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="./purchasehistory.php">구매내역</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="./list.php">Home</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <section class="py-5">
                    <div class="container px-5">
                        <h1 class="fw-bolder fs-5 mb-4"><?= $row['m_name'] ?></h1>
                        <div class="card border-0 shadow rounded-3 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row gx-0">
                                    <div class="col-lg-6 col-xl-5 py-lg-5">
                                        <div class="p-4 p-md-5">

                                            <div class="h2 fw-bolder"><?= $row['c_name'] ?></div>
                                            <tr>
                                                <label for="email"><b>성함</b></label>
                                                <td><?= $row['m_name'] ?></td><br>
                                                
                                                
                                                <label for="email"><b>차종</b></label>
                                                <td><?= $row['c_name'] ?></td><br>
                                                
                                                <label for="email"><b>가격</b></label>
                                                <td><?= $row['c_price'] ?></td><br>

                                                <label for="email"><b>구매시간</b></label>
                                                <td><?= $row['regtime'] ?></td><br>
                                                </tr>
                                            
                                            </form>




                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-7">
                                        <div class="bg-featured-blog" style="background-image: url('../remind2/uploadfiles/<?= $row['uploadfile'] ?>')"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <?php


            }
        } else {
            echo "조건을 만족하는 데이터가 없습니다.";
        }
        $result->close();
        $conn->close();
        ?>

    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">중고차사이트 &copy; Your Website 2021</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts_detailview.js"></script>
</body>

</html>