<?php

$search = $_GET['search'];
$catagory = $_GET['catgo'];
$sql = ("SELECT COUNT(*) AS total_records FROM car WHERE ".$catagory." like '%".$search."%' ");
$resultset = $conn->query($sql);

$result = mysqli_fetch_array($resultset);
$total_records = $result['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);

$sql = "SELECT * FROM car WHERE ".$catagory." LIMIT ".$offset.", ".$total_records_per_page." like '%".$search."%' ";

$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['c_date'] . "</td><td>" . $row['c_name'] . "</td></tr>";
    }
    echo "</table>";
  }

  ?>