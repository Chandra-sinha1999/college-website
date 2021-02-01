<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current</title>
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
        <h1 class="text11_aboutUs">ALL</h1>
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
            $volume = $_GET['table'];
            $sql = "select * from `$volume` order by id desc";
            $query =mysqli_query($con,$sql);
            while($result = mysqli_fetch_array($query)) {
                $pdf = "Uploads/".$result['pdf'];
                ?>
                <div class="vl">
                <a href="<?php echo $pdf; ?>" target = "_BLANK"><h1><?php echo $result['title'];   ?></h1></a>
                <h4>Author:<?php echo $result['author'];   ?></h4>
                </div>

                <?php
            }
        ?>
    </div>

    <?php include 'footBar.html';?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
