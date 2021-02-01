<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Volume</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminCss/mainAdmin.css">
</head>
<body>
    <div class= "container container_main">
        <h1>Select the Volume You want to delete Record from</h1>
        <form action="deleteVol.php" method = "post">
            <select name="volume" class="inputBox">
                <?php
                    $sql = "select * from mainvolume order by id desc";
                    $query = mysqli_query($con,$sql) or die('bad');
                    while($result = mysqli_fetch_array($query)) {
                        $title = $result['volumeName'];
                        ?>
                        <option><h6><?php echo $title; ?></h6></option>
                        <?php
                    }
                ?>
            </select>
            <br>
            <input type="submit" name ="submit" class="btn btn-success">
        </form>

        <?php
            if(isset($_POST['submit'])){
                $volume = $_POST['volume'];
                $sql = "select * from `$volume`";
                $query= mysqli_query($con,$sql) or die('bad request');
                while($result = mysqli_fetch_array($query)) {
                    $pdf = "Uploads/".$result['pdf'];
                    unlink($pdf);
                }
                
                $sql2 = "delete from mainvolume where volumeName='$volume'";
                $query3 = mysqli_query($con,$sql2) or die ('bad request 2');

                $sql3 = "DROP TABLE `$volume`";
                $query3 = mysqli_query($con,$sql3) or die ('bad request 3');
                header('location:adminpage.php');
            }
        ?>
    </div>
</body>
</html>