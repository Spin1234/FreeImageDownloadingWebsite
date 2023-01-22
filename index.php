<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="ocKjO72_ncTbJbg_HJHDd1jW44MiuM_4Fm5HVVQzNfg" />
    <!--<script src="https://cdn.tailwindcss.com"></script>-->
    <title>Free Download and Upload Images</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
  <a type="button" class="btn btn-success" href="UploadImg.php">Upload</a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Login.php">Check Uploads</a>
        </li>
      </ul> 
      <form class="d-flex" action="search.php" method="post">
         <input class="form-control me-2" type="text" name="search" placeholder="Search">
        <input class="btn btn-success" type="submit" value="Search">
      </form>
    </div>
  </div>
</nav>
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
  <?php
  $con = mysqli_connect("sql301.epizy.com", "epiz_32611011", "LerNHMhIIU145uc", "epiz_32611011_uploads");
  $sql1 = "SELECT * FROM `info`";
  $result1 = mysqli_query($con,$sql1);
  $num = mysqli_num_rows($result1);
  
  if ($num>0) {
    //while ($row = mysqli_fetch_assoc($result1)) {
        $row1 = mysqli_fetch_assoc($result1);
  ?>  
  
  <div class="carousel-item active">
      <img src="<?php echo $row1['Image'];?>" alt="img" class="d-block" style="width:100%; height: 30rem">
  </div>
      
  <?php
    //}
    $row1 = mysqli_fetch_assoc($result1);
    ?>
     <div class="carousel-item">
      <img src="<?php echo $row1['Image'];?>" alt="img" class="d-block" style="width:100%; height: 30rem">
  </div>
  <?php
    $row1 = mysqli_fetch_assoc($result1);
  ?>
   <div class="carousel-item">
      <img src="<?php echo $row1['Image'];?>" alt="img" class="d-block" style="width:100%; height: 30rem">
  </div>
  <?php
  }
  ?>
</div>
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="container">
<div class="container px-0 py-4">
<div class="pp-category-filter">
    <div class="row">
      <div class="col-sm-12">
      <?php
          $conn = mysqli_connect("sql301.epizy.com", "epiz_32611011", "LerNHMhIIU145uc", "epiz_32611011_uploads");
          if($conn === false){
            die("ERROR: Could not connect. "
            . mysqli_connect_error());
          }
          $sql = "SELECT DISTINCT `Image Category` FROM `info`";
          $result = mysqli_query($conn,$sql);
          $num1 = mysqli_num_rows($result);
          if ($num1>0) {
            while ($row2 = mysqli_fetch_assoc($result)) {
              ?>
            <a class="btn btn-success pp-filter-button mt-3" href="search.php?search=<?php echo $row2['Image Category'];?>" data-filter="All"><?php echo $row2['Image Category'];?></a>
            <!--<a class="btn btn-success pp-filter-button">
            <form action="search.php" method="post">
            <input type="submit" name="search" value="<?php echo $row2['Image Category'];?>">
            </form></a>-->
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>

<!--<div class="w3-content w3-padding-large w3-margin-top" id="portfolio"> -->

  <!-- Images (Portfolio) -->
  <div class="container mt-5">
  <div class="row">
      <?php
$con1 = mysqli_connect("sql301.epizy.com", "epiz_32611011", "LerNHMhIIU145uc", "epiz_32611011_uploads");
$sql2 = "SELECT * FROM `info`";
$result2 = mysqli_query($con1,$sql2);
$num2 = mysqli_num_rows($result2);
$results_per_page = 20;
$number_of_rows = $num2;
$number_of_pages = ceil($number_of_rows / $results_per_page);
if (!isset($_GET['page']) || $_GET['page']<=0) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$sql = "SELECT * FROM `info` LIMIT " . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

if ($num2 > 0) {
 while ($row3 = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-sm-3 mt-3">
    <a href="MoreInfo.php?id=<?php echo $row3['Id'];?>">
    <img src="<?php echo $row3['Image'];?>" class="img-thumbnail" style="height: 16rem; width: 100%" alt="<?php echo $row3['Image'];?>">
    </a>
    </div>

  <?php
  }
}
?>
</div>
</div>
<div class="container mt-5"> <h3 class="container mt-3">Pages </h3>
<ul class="pagination">
<?php
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<li class="page-item">'.'<a class="page-link" href="index.php?page=' . $page . '">' . $page . '</a> '.'</li>';
}
?>
</ul>
</div>
  <!-- Contact -->
 <footer>
  <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="contact">
    <p>Powered by <a href="#" target="_blank" class="w3-hover-text-green">FreeImages By Sayak Pal</a></p>
  </div>

 </footer>
<!-- End page content -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>