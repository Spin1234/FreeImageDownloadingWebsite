<?php

$con = mysqli_connect("sql301.epizy.com", "epiz_32611011", "LerNHMhIIU145uc", "epiz_32611011_uploads");

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $img = $_FILES['img'];
    $it = strtoupper($_POST['it']);
    $ic = strtoupper($_POST['ic']);
    $ta = mysqli_real_escape_string($con, $_POST['ta']);
    $date = $_POST['date'];
    $email = $_POST['email'];
    $imgname = $img['name'];
    $imgpath = $img['tmp_name'];
    $imgerror = $img['error'];

    if ($imgerror==0) {
        $destimg = 'upload/'.$imgname;
        move_uploaded_file($imgpath, $destimg);
        $insertquery = "insert into `info` values ('', '$firstName', '$lastName', '$destimg', '$it', '$ic', '$ta', '$date', '$email')";
        $query = mysqli_query($con, $insertquery);
        echo "<center><b>Image successfully uploaded!</b></center><br><img src='$destimg'<br>";
        echo "<center><button><a href='index.php'><b>Go Home</b></a></button></center>";
    }

?>