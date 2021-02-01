<?php
    session_start();
    include 'dbconnect.php';
    
    if(isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email= $_POST['email'];

        $sql = "INSERT INTO `details` (`user`, `pass`, `email`, `date`) VALUES ('$username', '$password','$email', current_timestamp())";
        mysqli_query($con,$sql);
        echo '<script>alert("admin added")</script>';
        header('location:adminpage.php');
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminCss/mainAdmin.css">
</head>
<body>


<div class="container container_main">
        <h1>Enter details of new admin</h1>
        <div class="input-section">
        <form action="addnew.php" method="POST">
        <input type="text" name="username" placeholder="new admin username" class="inputBox" autocomplete="off" required>
        <br>
        <input type="text" name="password" placeholder="new admin password"  class="inputBox" autocomplete="off" required>
        <br>
        <input type="text" name="email" placeholder="new admin email"  class="inputBox" autocomplete="off" required>
        <br>
        <input type="submit" name="submit" class="btn btn-success">
    </form>
        </div>
    </div>
</body>
</html>