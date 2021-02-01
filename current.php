<?php
    session_start();
    include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About the journal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
  </head>
  <body>
  <?php include 'upperNav.html';?>
  <?php include 'navBar.html';?>


    <div class="header_aboutUs">
      <div class="inner-header_aboutUs">
        <h1 class="text11_aboutUs">CURRENT</h1>
        <h1 class="text12_aboutUs">ISSUES</h1>
        <!-- <img class="line" src="" alt="LINE IMAGE">  -->
      </div>
      <div class="breadcrump_aboutUs">
        <ol>
          <li>
            <a class="home_aboutUs" href="#">
              <i class="fas fa-home"></i>
              Home
            </a>
          </li>
          <li class="active_aboutUs">
            / Current Issues
          </li>
        </ol>
      </div>
    </div>
    <div class="currentIssue">
    <?php
            $sql = "select * from mainvolume order by id desc";
            $query =mysqli_query($con,$sql);
            $first = mysqli_fetch_array($query);
            $volume = $first['volumeName'];
            $sql2 = "select * from `$volume` order by id desc";
            $query2 =mysqli_query($con,$sql2) or die("failed here");
            while($result = mysqli_fetch_array($query2)) {
                $pdf = "Uploads/".$result['pdf'];
                ?>
                <div class="vl">
                <a href="<?php echo $pdf; ?>" target = "_BLANK"><h3><?php echo $result['title'];   ?></h3></a>
                <p>Author : <?php echo $result['author'];   ?></p>
                </div>
                <?php
            }
            ?>
    </div>
    
    <?php include 'footBar.html';?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
           integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
           integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
   </script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
           integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
   </script>
  </body>
</html>
