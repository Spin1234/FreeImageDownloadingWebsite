<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Free Download and Upload Images</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Back</a>
  </div>
</nav>

<div class="container mt-5">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" id="myData">
<?php
$con4 = mysqli_connect("sql301.epizy.com", "epiz_32611011", "LerNHMhIIU145uc", "epiz_32611011_uploads");

    $search = strtoupper($_REQUEST['search']);
    $sql4 = "SELECT * FROM `info`";
  $result4 = mysqli_query($con4,$sql4);
  $num4 = mysqli_num_rows($result4);
  ?>
  <div class="container"><h1><b>Categories: <?php echo $search; ?></b></h1></div>
  <?php
  if ($num4>0) {
      while ($row4 = mysqli_fetch_assoc($result4)){
          if($search==$row4['Image Title'] || $search==$row4['Image Category']){
          ?>
          <div class="col" id="data">
      <div class="p-3 border bg-light">
        <a href="<?php echo $row4['Image'];?>"> 
        <img src="<?php echo $row4['Image'];?>" alt="<?php echo $row4['Image Title'];?>" class="w3-image" width="100%" height="auto">
      </a>
      <center><a href="<?php echo $row4['Image'];?>" download>Download</a></center>
    </div>
    </div>
          <?php
          }
      }
  }

?>
</div>
</div>

</body>
</html>