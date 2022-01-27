<?php
    session_start();
    unset($_SESSION["m_id"]);
    
    setcookie("m_id", "");
    setcookie("password", "");
    header("Location: list.php");
?>