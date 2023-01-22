<?php
$con = mysqli_connect("sql301.epizy.com", "epiz_32611011", "LerNHMhIIU145uc", "epiz_32611011_uploads");

$ID=$_GET['id'];
$sql = "SELECT * FROM `info` where Id=$ID";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['Image Title'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-3">
        <div class="container mt-5">
            <h1><?php echo $row['Image Title'];?></h1>
            <p><?php echo $row['Image Category'];?></p>
            <small>Posted by <?php echo $row['First Name']. " ". $row['Last Name'];?> on <?php echo $row['Date'];?></small>
        </div>
        <div class="container mt-5">
            <img src="<?php echo $row['Image'];?>" class="img-fluid" style="height:16rem; width:16rem" alt="<?php echo $row['Image Title'];?>">
        </div>
        <div class="container mt-5">
        <button type="button" class="btn btn-success"><a href="<?php echo $row['Image'];?>" Download="<?php echo $row['Image Title'];?>"          style="text-decoration:none; color: white">Download Image HD</a></button>
        </div>
        <div class="container mt-5">
            <p><?php echo nl2br($row['Image Description']);?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>