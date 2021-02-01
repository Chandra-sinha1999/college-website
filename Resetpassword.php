<?php
    session_start();
    include 'dbconnect.php';
    if(!isset($_POST['submit']) and isset($_GET['email'])) {
        $_SESSION['email'] = $_GET['email'];
    }
    echo $_SESSION['email'];
    if(isset($_POST['submit'])) {
            $newpass = $_POST['new'];
            $confpass = $_POST['conf'];
            if($newpass === $confpass) {
            $to = $_SESSION['email'];
            $sql = "update details set pass='$newpass' where email='$to'";
            $query=mysqli_query($con,$sql);
            if(isset($query)) {
                echo '<script>alert("password updated")</script>';
            }
            else{
                echo "step2 pe fail";
            }
            }
        else{
            echo "nhi mila";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Reset your password:</h1>
        <div class="input-section">
            <form action="Resetpassword.php" method="POST">
                <input type="text" name="new" placeholder="New Password">
                <input type="text" name="conf" placeholder="confirm Password">
                <input type="submit" class="btn btn-success" name="submit">
            </form>
        </div>
    </div>
</body>
</html>