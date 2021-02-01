

//we are not using this page

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
            header('location:index.php');
            echo '<script>alert("wrong user id or password")</script>';
        }
    }
    else{
        echo "failed";
    }

?>