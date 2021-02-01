<?php
    session_start();
    include 'dbconnect.php';
    if(isset($_POST['submit'])) {
        $to_email = $_POST['email'];
        $sql = "select * from details where email='$to_email'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_num_rows($query);
        if($row == 1) {
            //$userData = mysqli_fetch_array($query);
            //$s_no = $userData['s_no'];
            $subject = "Reset your Password";
            $body = "Click here to change your Password 
            http://localhost/loginPage/Resetpassword.php?email=$to_email" ;
            $headers = "From: cpsinha1999@gmail.com";
            if (mail($to_email, $subject, $body, $headers)) {
                echo '<script>alert("mail sent please check mail")</script>';
                header('location:index.php');
            } 
            else {
                echo '<script>alert("email sending failed")</script>';
            }
        }
        else{
            echo '<script>alert("Email id not registerd")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Enter your email here</h1>
        <div class="input-section">
            <form action="forgotPassword.php" method="POST">
                <input type="text" name="email" placeholder="Enter email id to recive password">
                <input type="submit" class="btn btn-success" name="submit">
            </form>
        </div>
    </div>
 </body>
</html>