<?php

require "../util/dbconfig.php";

require_once '../util/loginchk.php';
if($chk_login) {
  $username = $_SESSION['username'];



if(isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

// 2. 페이지당 보여줄 리스트 갯수값을 정한다.
$total_records_per_page =10;

// 3. OFFSET을 계산하고 앞/뒤 페이지 등의 변수를 설정한다.
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;

// 4. 전체 페이지 수를 계산한다.
$sql = "SELECT COUNT(*) AS total_records FROM board";
$resultset = $conn->query($sql);
$result = mysqli_fetch_array($resultset);
$total_records = $result['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;

  
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style3.css">
</head>

<body>
<h6><?=$username?>님</h6>
  <h1>게시판</h1>
  <br><br><br><br>
  <div class="box3">
  <?php
 $sql = "SELECT * FROM board LIMIT ".$offset.", ".$total_records_per_page." ";
 $resultset = $conn->query($sql);

  if ($resultset->num_rows > 0) {
    echo "<table><tr><th>번호</th><th>작성자</th><th>제목</th><th>등록일</th><th>조회수</th></tr>";
    while ($row = $resultset->fetch_assoc()) {
      echo "<tr><td>" . $row['id'] . "</td><td>" . $row['users'] . "</td><td><a href='detailview.php?id=" . $row['id'] . "'>" . $row['title'] . "</a><td>" . $row['regtime'] .
      "</td><td>" . $row['hit'] . "</td></tr>";
    }
    echo "</table>";
  }

  ?>
  </div>
  
   <ul class="pagination">
  <?php 
  // 한 pagination 에서 몇 페이지를 표현할 것인지를 반영하여 처리하기
  // 2021-01-06 18시경 작업시 $page_per_line 변수를 
  // $page_range_size로 변경함.
  $page_range_size = 10;  // 한라인에 표시할 페이지 수, 예: 10
  $start_page = floor($page_no / $page_range_size)*$page_range_size + 1;
  $end_page = $start_page + ($page_range_size - 1); // 끝 페이지, 예: 20
  
  if($end_page > $total_no_of_pages) {  // 계산된 $end_page가 전체 페이지수 보다 크면
    $end_page = $total_no_of_pages; // $end_page = $total_no_pages가 되어야 한다.
  }

  // 현재페이지는 전체페이지 중 몇번째 페이지인지 출력...
  echo "page ". $page_no . " of " .$total_no_of_pages."<br><br>";

  if($page_no > 1){
  echo "<li><a href='?page_no=1'>First Page</a></li>";
  } ?>
      
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){
  echo "href='?page_no=$previous_page'";
  } ?>>Previous</a>
  </li>
<?php

	// for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
	for ($counter = $start_page; $counter <= $end_page; $counter++){
	if ($counter == $page_no) {
	echo "<li class='active'><a>$counter</a></li>";	
	        }else{
        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
?>

  <li <?php if($page_no >= $total_no_of_pages){
  echo "class='disabled'";
  } ?>>
  <a <?php if($page_no < $total_no_of_pages) {
  echo "href='?page_no=$next_page'";
  } ?>>Next</a>
  </li>

  <?php if($page_no < $total_no_of_pages){
  echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
  } ?>
  </ul>
  <?php // 여기까지 pagination을 위해 추가 부분
  //=================================================
}
  ?>
  
  <div class="box1">
    <a href="registform.html">new</a>
  </div>
  <div class="box2">
  <a href="../index.php">메인으로</a>
  </div>
  
  <form action="search_result.php" method="GET">
    <select name="catgo">
      <option value="title">제목</option>
      <option value="users">작성자</option>
    </select>
    <input type="text" name="search" size="40" required="required">
    <button class="btn btn-primary">검색</button>
  </form>


</body>

</html>