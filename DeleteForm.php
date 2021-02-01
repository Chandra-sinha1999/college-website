<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="deleteAdmin.css">
</head>
<body>
    <div class="del_head">
        <h1>Choose what to Delete</h1>
    </div>
    <div class="delete_Main">
    <div class="row">
        <div class="col-sm">
            <div class="box_del">
                <h1>Delete entire Volume</h1>
                <a href="deleteVol.php" class="del_sub">Submit</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="box_del">
                <h1>Delete a Record</h1>
                <a href="delete.php" class="del_sub">Submit</a>
            </div>
        </div>
    </div>
    </div>
</body>
</html>