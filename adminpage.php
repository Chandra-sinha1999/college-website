<?php
    session_start();
    include 'dbconnect.php';
    if(!isset($_SESSION['user'])) {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminSection.css">
</head>
<body>
    
    <div class="heading">
        <h1>Hello <?php echo $_SESSION['user']?></h1>
    </div>
    <div class="row">
        <div class=col-sm>
            <div class="box">
                <h3>Add new admin</h3>
                <a href="addnew.php" class= "btn btn-info">Click here</a>
            </div>
            <div class="box">
                <h3>Add new volume</h3>
                <a href="newvol.php" class= "btn btn-info">Click here</a>
            </div>
            <div class="boxl">
                <h3>Upload new pdf</h3>
                <a href="uploadPdf.php" class= "btn btn-info">Click here</a>
            </div>
        </div>
        <div class= col-sm>
        <img src="images/adminlogo.png">
        </div>
        <div class= col-sm>
            <div class="box">
                <h3>All issues</h3>
                <a href="allIssue.php" class= "btn btn-info">Click here</a>
            </div>
            <div class="boxl">
                <h3>Delete a record</h3>
                <a href="DeleteForm.php" class= "btn btn-info">Click here</a>
            </div>
        </div>
    </div>
    <div class="logout">
        <a href="logout.php" class = "btn btn-danger">Logout</a>
    </div>
</body>
</html>