<?php
    session_start();
    include 'dbconnect.php';
    $newp = $_POST['new'];
    $tow = $_POST[$to]; 
    echo $tow;
    echo $newp;
?>