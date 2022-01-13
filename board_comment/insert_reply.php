<?php
require "../util/dbconfig.php";

   $board_id = $_POST['board_id'];
   $nickname = $_POST['nickname'];
   $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO board_comment (board_id, nickname, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",  $board_id, $nickname, $comment);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<a href='../board/detailview.php?id=".$board_id."'>댓글을달았습니다.</a>";
    

?>