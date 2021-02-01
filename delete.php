<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminCss/mainAdmin.css">
</head>
<body>
    <div class= "container container_main">
        <h1>Select the Volume You want to delete Record from</h1>
        <form action="delete.php" method = "post">
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
            <input type="submit" name ="submit" class="btn btn-success">
        </form>
        <br>
        <table class="table table-dark">
            <thead>
             <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
             </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_POST['submit'])) {
                    $volume = $_POST['volume'];
                    $sql = "select * from `$volume` order by id desc";
                    $query =mysqli_query($con,$sql);
                    while($result = mysqli_fetch_array($query)) {
                        $link = "deleteOperation.php?vol=".$volume."&title=".$result['title']."&author=".$result['author']."&pdf=".$result['pdf'];
                        ?>
                        <tr>
                        <td><p><?php echo $result['title'];?></p></td>
                        <td><p><?php echo $result['author'];?></p></td>
                        <td><a href="<?php echo $link; ?>" class="Del-but">Delete</a></td>
                        </tr>
                    <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

</body>
</html>