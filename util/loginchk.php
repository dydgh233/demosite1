<?php
  session_start();
  if(isset($_SESSION['m_id'])) {
    $chk_login = TRUE;
  }else { 
    $chk_login = FALSE;
  }
?>