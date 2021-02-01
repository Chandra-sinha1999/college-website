<?php
    session_start();
    include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Issues</title>
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
        <!-- <h1 class="text11_aboutUs">ALL</h1> -->
        <h1 class="text12_aboutUs">ISSUES</h1>
        <!-- <img class="line" src="" alt="LINE IMAGE">  -->
      </div>
      <div class="breadcrump_aboutUs">
        <ol>
          <li>
            <a class="home_aboutUs" href="home.html">
              <i class="fa fa-home"></i>
              Home
            </a>
          </li>
          <li class="active_aboutUs">
            / Issues
          </li>
        </ol>
      </div>
    </div>

    
    <div id="accordion" class="issue_container">
    <?php
          $sql = "select * from mainvolume order by id desc";
          $query = mysqli_query($con,$sql) or die('bad');
          $id = 0;
          while($result = mysqli_fetch_array($query)) {
            $id_link = "id_".$id;
            $heading_link = "heading_".$id;
            $link = "view.php?table=".$result['volumeName'];
            $title = $result['volumeName']."    ".$result['year'];
    ?>
  <div class="card">
    <div class="card-header" id="<?php echo $heading_link; ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="<?php echo "#".$id_link; ?>" aria-expanded="true" aria-controls="<?php echo $id_link; ?>">
          <?php echo $title; ?>
        </button>
      </h5>
    </div>
    <div id="<?php echo $id_link; ?>" class="collapse" aria-labelledby="<?php echo $heading_link; ?>" data-parent="#accordion">
      <div class="card-body">
        <?php
          $volume = $result['volumeName'];
          $sql2 = "select * from `$volume` order by id";
          $query2 =mysqli_query($con,$sql2);
          while($result2 = mysqli_fetch_array($query2)) {
              $pdf = "Uploads/".$result2['pdf'];
              ?>
              <div class="vl">
                <h5><a href="<?php echo $pdf; ?>" target = "_BLANK" style="margin-left: 3%; color:darkred;"><?php echo $result2['title'];   ?></a></h5>
                <p style="margin-left: 3%; color:gray;">Author:<?php echo $result2['author'];   ?></p>
              </div>

              <?php
          }
        ?>
      </div>
    </div>
  </div>
  <?php
      $id += 1;
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
