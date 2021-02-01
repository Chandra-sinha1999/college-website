<?php
    session_start();
    include 'dbconnect.php';
    if(isset($_POST['submit'])) {
        $temp_name =$_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        move_uploaded_file($temp_name,"Uploads/".$name);

        $authorName = $_POST['author'];
        $title = $_POST['title'];
        $volName = $_POST['volume'];
        echo $volName;
        $sql = "INSERT INTO `$volName`(`author`,`title`,`pdf`) VALUES ('$authorName','$title','$name')";

        //fire query
        mysqli_query($con,$sql) or die('Bad Upload');
        header('location:adminpage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminCss/mainAdmin.css">
</head>
<body>
    <div class = "container container_main">
        <h1>Enter details of new pdf to be uploaded</h1>
        <form action="uploadPdf.php" method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="Author name" name="author" autocomplete="off" size="50" class="inputBox" required>
            <br>
            <input type="text" placeholder="Title of journal" name = "title" autocomplete="off" size="50" class="inputBox" required>
            <br>
            <!-- <input type="text" placeholder = "Volume name" name = "volume" required> -->
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
            <input type="file" name="file" class="inputBox">
            <br>
            <input type="submit" name ="submit" class="btn btn-success">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
