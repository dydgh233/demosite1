<?php
require "../util/dbconfig.php";
   $id = $_GET['id']; // 댓글
   $board_id = $_GET['board_id'];//원글 

   $sql = "DELETE FROM board_comment WHERE id=" . $id;
   $conn->query($sql);
   $conn->close();
   echo "<a href='../board/detailview.php?id=".$board_id."'>삭제되었습니다. 상세보기로 돌아갑니다.</a>";
    

?>