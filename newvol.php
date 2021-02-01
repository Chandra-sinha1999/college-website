<?php
    session_start();
    include 'dbconnect.php';
    if(isset($_POST['submit'])) {
        $newVol = $_POST['volumeName'];
        $issue = $_POST['issue'];
        $year = $_POST['year'];
        $titleOfNewVol = "Volume - ";
        $titleOfNewVol .= ($newVol." ");
        $titleOfNewVol .= $issue;
        $sql = "CREATE TABLE IF NOT EXISTS `$titleOfNewVol` (id INT NOT NULL AUTO_INCREMENT,
        author VARCHAR(255),
        title VARCHAR(255),
        pdf VARCHAR(255),
        PRIMARY KEY(id)
        )
        ";
        $result =mysqli_query($con,$sql) or die('Bad create');
        $sql3 = "select * from mainvolume where volumeName = '$titleOfNewVol'";
        $result3 = mysqli_query($con,$sql3);
        $check = mysqli_num_rows($result3);
        if($check > 0) {
          header('location:adminpage.php');
        }
        else{
          $sql2 = "INSERT INTO `mainvolume`(`volumeName`,`year`) VALUES ('$titleOfNewVol','$year')";

          $result2 = mysqli_query($con,$sql2) or die('Bad add');
          header('location:adminpage.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new volume</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminCss/mainAdmin.css">
</head>
<body>
    <div class="container container_main">
        <h1>Enter details of new volume</h1>
        <form action="newvol.php" method="POST">
            <input type="text" placeholder="Volume Number" name="volumeName" autocomplete="off" class="inputBox" required>
            <br>
            <select name="issue" class="inputBox">
              <option>No-1</option>
              <option>No-2</option>
            </select>
            <br>
            <input type="text" placeholder = "year" name= "year" autocomplete="off" class="inputBox" required>
            <br>
            <input type="submit" name = "submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>
