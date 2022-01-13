<?php
require "../util/dbconfig.php";

    $id = $_GET['id']; // 댓글
    $board_id = $_GET['board_id'];//원글 
   $nickname = $_POST['nickname'];
   $comment = $_POST['comment'];

    $stmt = $conn->prepare("UPDATE board_comment SET nickname =?, comment =? WHERE board_id =?");
    $stmt->bind_param("sss", $nickname, $comment, $board_id);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<a href='../board/detailview.php?id= ".$id." & ".board_id=$id."'>댓글을달았습니다.</a>";
    

?>