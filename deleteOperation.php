<?php
    session_start();
    include 'dbconnect.php';
    $volume = $_GET['vol'];
    $title = $_GET['title'];
    $author = $_GET['author'];
    $pdf = $_GET['pdf'];

    $sql = "select * from `$volume` where title = '$title' and author = '$author'";
    $query= mysqli_query($con,$sql) or die('bad request');
    $row = mysqli_num_rows($query);
    if($row == 1) {
        $sql2 = "delete from `$volume` where title = '$title' and author = '$author'";
        mysqli_query($con,$sql2) or die('bad request2');
        $fileDel = "Uploads/".$pdf;
        unlink($fileDel);
        header('location:adminpage.php');
    }
?>