<?php 
    session_start();
    session_unset();
    session_destroy();
    header("location:login.php");
    ob_end_flush();
    include 'index.php';
    exit();

?>