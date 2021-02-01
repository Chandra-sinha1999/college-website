<?php 
    session_start();
    include 'dbconnect.php';

    if(isset($_POST['submit'])) {

        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from details where user = '$username' and pass = '$password'";
        $query = mysqli_query($con,$sql);

        $row = mysqli_num_rows($query);
        if($row == 1) {
            $_SESSION['user'] = $username;
            header('location:adminpage.php');
        }
        else{
            echo '<script>alert("invalid username or password")</script>';
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Page</title>

    <!--  GOOGLE fONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,900&display=swap" rel="stylesheet">
    <!--CSS STYLE SHEET-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="mishraChange.css">

    <!--  FONT AWESOME-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!--BOOTSTRAP SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>

<form action="index.php" method="POST">

    <div class="container">
        <h1>WELCOME TO ADMIN LOGIN</h1>

        <div class="login">
            <div class="imgcontainer">
                <img src="images/copyright.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="user" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required>
                <input type="submit" class="btn btn-success button-submit" name="submit">

                <!-- <button name ="submit" type="submit">Login</button> -->
                <!-- <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="forgotPassword.php">password?</a></span>
            </div>

        </div>
</form>


</body>
</html>

<!-- INSERT INTO `details` (`s_no`, `user`, `pass`, `email`, `date`) VALUES ('1', 'admin1', 'admin1', 'chandra.17bit1057@abes.ac.in', current_timestamp()); -->